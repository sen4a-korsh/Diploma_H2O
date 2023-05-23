<?php

namespace App\Http\Livewire\CarWashService;

use App\Models\CarWashService;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class CarWashServiceTable extends PowerGridComponent
{
    use ActionButton;

    public $createLivewireComponent  = 'car-wash-service';

    public $name;
    public $price;

    public bool $showErrorBag = true;

    protected array $rules = [
        'name.*' => ['required', 'min:2', 'max:255'],
        'price.*' => ['required', 'numeric'],
    ];

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();
        CarWashService::query()->find($id)->update([
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
//            Exportable::make('export')
//                ->striped()
//                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),

            Header::make()
                ->includeViewOnBottom('components.button-create')->showSearchInput(),

//            Header::make()->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

//    public function header(): array
//    {
//        return [
//            Button::add('bulk-sold-out')
//                ->caption(__('Mark as Sold-out'))
//                ->class('cursor-pointer block bg-indigo-500 text-white')
////                ->emit('bulkSoldOutEvent', [])
//        ];
//    }


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
    * @return Builder<\App\Models\CarWashService>
    */
    public function datasource(): Builder
    {
        return CarWashService::query();
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
            ->addColumn('id');
//            ->addColumn('created_at_formatted', fn (CarWashService $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
//            ->addColumn('updated_at_formatted', fn (CarWashService $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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

            Column::make('name', 'name')
                ->searchable()
                ->makeInputText('name')
                ->sortable()
                ->editOnClick(),

            Column::make('price', 'price')
                ->searchable()
                ->makeInputText('price')
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
     * PowerGrid CarWashService Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
       return [

           Button::make('Delete', 'Delete')
               ->class('btn btn-danger')
               ->openModal('car-wash-service.actions.delete-car-wash-service', ['id_car_wash_service' => 'id']),

//           Button::make('edit', 'Edit')
//               ->class('btn btn-primary')
//               ->openModal('car-wash-service.modal-actions.edit', ['id_car_wash_service' => 'id']),

           //               ->route('', ['car-wash-service' => 'id'])
//           ->dispatch(),
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! не удаляй, бро
//           Button::add('edit')
//               ->bladeComponent('button-edit', ['id' => 'id'])



//
//           Button::make('destroy', 'DeleteCarWashService')
//               ->class('btn btn-danger')
//               ->route('car-wash-service.destroy', ['car_wash_service' => 'id'])
//               ->target('_self')
//               ->id('delete')
//               ->method('delete'),

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
     * PowerGrid CarWashService Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
       return [
//
//            Rule::button('edit')
//                ->when(true)
//                ->setAttribute('data-bs-toggle', 'modal')
//                ->setAttribute('data-bs-target', '#exampleModal'),


           //Hide button edit for ID 1
//            Rule::button('edit')
//                ->when(fn($car-wash-service) => $car-wash-service->id === 1)
//                ->hide(),
        ];
    }

}
