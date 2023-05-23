<?php

namespace App\DataTables;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', '')
//                function ($client){
//                return '<button class="btn btn-success modal-actions" value="edit/'.$client->id.'">Edit</button> '.
//                        '<button class="btn btn-danger modal-actions" value="delete/'.$client->id.'">DeleteCarWashService</button>';
////                return '<a class="btn btn-success action-button" href="clients/edit/'.$client->id.'">Edit</a>
////                        <a class="btn btn-danger action-button" href="clients/delete/'.$client->id.'">DeleteCarWashService</a>';
//            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Client $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Client $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('clients-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
//                    ->dom('Bfrtip')
                    ->orderBy(1)
//                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'mobile_phone',
            'created_at',
            'updated_at',
//            'edit',
            Column::computed('< a >')
                ->exportable(false)
                ->printable(false)
//                ->width(200)
//                ->data('<button>id</button>')
//                ->content('<button type="button" class="btn btn-success modal-actions" value="edit/">Edit</button> ')
                ->content('<button type="button" class="btn btn-success modal-actions" value="edit/">Edit</button> ')
//                ->content(function ($client):string{
//                    return 'asd';
//                })
                ->addClass('text-center modal-actions'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Clients_' . date('YmdHis');
    }
}
