<?php

namespace App\Http\Livewire\TypeCar;

use App\Models\TypeCar;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class TypeCarTable extends PowerGridComponent
{
    use ActionButton;

    public $createLivewireComponent = 'type-car';

    public $type_name;
    public $lead_time;

    public bool $showErrorBag = true;

    protected array $rules = [
        'type_name.*' => ['required', 'min:2', 'max:255'],
        'lead_time.*' => ['required'],
    ];

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();
        TypeCar::query()->find($id)->update([
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
            Header::make()
                ->includeViewOnBottom('components.button-create')->showSearchInput(),

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
    * @return Builder<\App\Models\TypeCar>
    */
    public function datasource(): Builder
    {
        return TypeCar::query();
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
            ->addColumn('created_at_formatted', fn (TypeCar $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (TypeCar $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, modal-actions...
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
                ->makeInputRange()
                ->sortable(),

            Column::make('type name', 'type_name')
                ->searchable()
                ->makeInputText('type_name')
                ->sortable()
                ->editOnClick(),

            Column::make('lead time', 'lead_time')
                ->searchable()
                ->makeInputText('lead_time')
                ->sortable()
                ->editOnClick(),

            Column::make('CREATED AT','created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('UPDATED AT', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid TypeCar Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
       return [

           Button::make('Delete', 'Delete')
               ->class('btn btn-danger')
               ->openModal('type-car.actions.delete-type-car', ['id_type_car' => 'id']),
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
     * PowerGrid TypeCar Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($type-car) => $type-car->id === 1)
                ->hide(),
        ];
    }
    */
}
