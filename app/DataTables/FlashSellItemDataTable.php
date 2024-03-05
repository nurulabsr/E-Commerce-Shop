<?php

namespace App\DataTables;

use App\Models\FlashSellItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FlashSellItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $editBtn = "<a href='".route('admin.product-variant.edit', $query->id)."' class='btn btn-info btn-sm ml-2'><i class='fa-regular fa-pen-to-square'></i>Edit</a>";
                $dltBtn = "<a href='".route('admin.flashsell.destroy', $query->id)."' class='btn btn-warning btn-sm ml-2 delete-item'><i class='fa-solid fa-trash'></i>Delete</a>";
                return $editBtn.$dltBtn;
            })
            ->addColumn('product_name', function($query){
                return $query->products->product_name;
            })
            ->addColumn('status', function($query){
                if($query->status==1){
                   $toggleBtn = '<label>
                   <input type="checkbox" checked name="custom-switch-checkbox" class="custom-switch-input status" data-id="'.$query->id.'">
                   <span class="custom-switch-indicator"> </span>
                  </label>';
               return $toggleBtn;
                } else{
                   $toggleBtn = '<label>
                   <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input status" data-id="'.$query->id.'">
                   <span class="custom-switch-indicator"> </span>
                 </label>';
                 return $toggleBtn;
                }
           })
            ->addColumn('show_at_home_page', function($query){
                $yes = $query->show_at_home_page == 0 ? 'selected' : '';
                $no = $query->show_at_home_page == 1 ? 'selected' : '';
                return '<select class="form-control form-select-sm is_pending" data-id="'.$query->id.'" aria-label="Default select example">' .
                    '<option '.$yes.' value="1" style="font-weight:bold;color:green;">Yes</option>' .
                    '<option ' . $no . ' value="0" style="font-weight:bold; font-style:italic;color:red;">No</option>' .
                    '</select>';
            })
     

            ->rawColumns(['product_name', 'action', 'status', 'show_at_home_page'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(FlashSellItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('flashsellitem-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
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
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('product_name'),
            Column::make('status'),
            Column::make('show_at_home_page'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(260)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'FlashSellItem_' . date('YmdHis');
    }
}
