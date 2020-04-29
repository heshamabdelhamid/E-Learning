<?php

namespace App\DataTables;

use App\Reservation;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReservationsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'dashboard.reservations.button.edit')
            ->addColumn('delete', 'dashboard.reservations.button.delete');    }

    /**
     * Get query source of dataTable.
     *
     * @param \Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
        {
            $admin = Reservation::with(['student','book'])->select();

            return $this->applyScopes($admin);
        }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('categories-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    )
                    ->language(datatableLang());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id')->title("#")
                              ->exportable(false)
                              ->printable(false),
            Column::make('status')->title(trans('dashb.status')),
            Column::make('student.full_name')->title(trans('dashb.name')),
            Column::make('book.title')->title(trans('dashb.title')),
            Column::make('evaluation')->title(trans('dashb.evaluation')),
            Column::make('created_at')->title(trans('dashb.tb_updated')),
            Column::computed('edit')
                  ->title(trans('dashb.tb_edit'))
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::computed('delete')
                  ->title(trans('dashb.tb_delete'))
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Categories_' . date('YmdHis');
    }
}
