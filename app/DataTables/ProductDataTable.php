<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
                $editBtn = "<a href='".route('admin.products.edit', $query->id)."' class='btn btn-primary btn-sm'><i class='fa-regular fa-pen-to-square'></i>Edit</a>";
                $dltBtn = "<a href='".route('admin.products.destroy', $query->id)."' class='btn btn-warning btn-sm ml-2 delete-item'><i class='fa-solid fa-trash'></i>Delete</a>";
                return $editBtn.$dltBtn;
            })
            ->addColumn('product_thumnail_img', function($query){
                return "<img width='40px' src='".asset($query->product_thumnail_img)."'></img>";
            })
            
            ->addColumn('product_type', function($query){
               switch ($query->product_type) {
                case 'top_product':
                    return '<i class="badge badge-success">Top Product</i>';
                    break;
                case 'best_product':
                     return '<i class="badge badge-success">Best Product</i>';
                     break;
                case 'new_product':
                return '<i class="badge badge-warning">New Product</i>';
                break;
                default:
                    # code...
                    break;
               }
            })
            ->rawColumns(['action', 'product_thumnail_img'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
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
            Column::make('product_thumnail_img')->title('Product Image'),
            Column::make('product_quantity'),
            Column::make('product_price'),
            Column::make('product_short_description'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(180)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
