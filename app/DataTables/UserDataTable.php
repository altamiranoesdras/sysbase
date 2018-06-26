<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '17%','printable' => false])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
//                'responsive'   => true,
                'language' => ['url' => asset('plugins/DataTables/Spanish.json')],
                'buttons' => [
                    ['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> Crear'],
                    ['extend' => 'export', 'text' => '<i class="fa fa-download"></i> Exportar'],
                    ['extend' => 'reload', 'text' => '<i class="fa fa-refresh"></i> Recargar'],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> Imprimir'],
                    ['extend' => 'reset', 'text' => '<i class="fa fa-undo"></i> Reiniciar'],
                    //'colvis',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'username',
            'name',
            'email',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatable_' . time();
    }
}