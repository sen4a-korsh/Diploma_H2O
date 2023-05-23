<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\TypeCar;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class OrderTable extends PowerGridComponent
{
    use ActionButton;

    public $createLivewireComponent = 'order';

    public $client_id;
    public $type_car_id;
    public $order_status_id;

    public bool $showErrorBag = true;

    protected array $rules = [
        'client_id.*' => ['required', 'integer', 'exists:clients,id'],
        'type_car_id.*' => ['required', 'integer'],
        'order_status_id.*' => ['required', 'integer'],
    ];

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();
        Order::query()->find($id)->update([
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
    * @return Builder<\App\Models\Order>
    */
    public function datasource(): Builder
    {
        return Order::query()
            ->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
            ->join('type_cars', 'orders.type_car_id', '=', 'type_cars.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->select('orders.*', 'order_statuses.status_name as status_name',
                'type_cars.type_name as type_car_name',
                'clients.first_name as clients_first_name', 'clients.last_name as clients_last_name');
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
            ->addColumn('created_at_formatted', fn (Order $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Order $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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

            Column::make('Client id', 'client_id')
                ->searchable()
                ->makeInputText('client_id')
                ->sortable()
                ->editOnClick(),

            Column::make('Type car id', 'type_car_id')
                ->searchable()
                ->makeInputText('type_car_id')
                ->sortable()
                ->editOnClick(),

            Column::make('Type Car', 'type_car_name')
                ->searchable()
                ->makeInputText('type_car_name')
                ->sortable()
                ->makeInputSelect(TypeCar::all(), 'type_name', 'type_cars.id'),

            Column::make('Order status id', 'order_status_id')
                ->searchable()
                ->makeInputText('order_status_id')
                ->sortable()
                ->editOnClick(),

            Column::make('status name', 'status_name')
                ->searchable()
                ->makeInputText('status_name')
                ->sortable()
                ->makeInputSelect(OrderStatus::all(), 'status_name', 'order_statuses.id'),

            Column::make('Date time', 'date_time')
                ->searchable()
                ->makeInputText('date_time')
                ->sortable()
                ->makeInputDatePicker(),

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
     * PowerGrid Order Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
       return [

           Button::make('Delete', 'Delete')
               ->class('btn btn-danger')
               ->openModal('order.actions.delete-order', ['id_order' => 'id']),
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
     * PowerGrid Order Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($order) => $order->id === 1)
                ->hide(),
        ];
    }
    */
}
