<?php

namespace App\DataTables;

use App\Book;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
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
            ->addColumn('edit', 'dashboard.books.button.edit')
            ->addColumn('delete', 'dashboard.books.button.delete');    }


//------------------------------------------------------------------
    public function query()
        {
            $admin = Book::with('category')->select();

            return $this->applyScopes($admin);
        }

//------------------------------------------------------------------
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
            Column::make('title')->title(trans('dashb.title')),
            Column::make('category.name')->title(trans('dashb.category')),
            Column::make('available')->title(trans('dashb.available')),
            Column::make('updated_at')->title(trans('dashb.tb_updated')),
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
