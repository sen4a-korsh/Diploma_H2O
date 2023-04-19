<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ClientTable extends PowerGridComponent
{
    use ActionButton;

    public $first_name;
    public $last_name;
    public $mobile_phone;


    public bool $showErrorBag = true;

    protected array $rules = [
        'first_name.*' => ['required', 'min:2'],
        'last_name.*' => ['required', 'min:2'],
        'mobile_phone.*' => ['required', 'integer'],
    ];


    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();
        Client::query()->find($id)->update([
            $field => $value,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Client>
    */
    public function datasource(): Builder
    {
        return Client::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('first_name')
            ->addColumn('name_lower', fn (Client $model) => strtolower(e($model->name)))
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', fn (Client $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('first name', 'first_name')
                ->searchable()
                ->makeInputText('first_name')
                ->sortable()
                ->editOnClick(true),

            Column::make('last name', 'last_name')
                ->searchable()
                ->makeInputText('last_name')
                ->sortable()
                ->editOnClick(true),

            Column::make('mobile phone', 'mobile_phone')
                ->searchable()
                ->makeInputText('mobile_phone')
                ->sortable()
                ->editOnClick(true),


            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->makeInputDatePicker()
                ->searchable()
        ];
    }
//    'id',
//            'first_name',
//            'last_name',
//            'mobile_phone',
//            'created_at',
//            'updated_at',
    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Client Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
       return [
//           Button::make('edit', 'Edit')
////               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
//               ->class('btn btn-primary')
//               ->route('', ['client' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('btn btn-danger')
               ->route('client.destroy', ['client' => 'id'])
               ->method('delete')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Client Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($client) => $client->id === 1)
                ->hide(),
        ];
    }
    */
}
