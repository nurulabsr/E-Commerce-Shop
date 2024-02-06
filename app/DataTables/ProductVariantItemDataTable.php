<?php

namespace App\DataTables;

use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductVariantItemDataTable extends DataTable
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
                $editBtn = "<a href='".route('admin.product-variant-items.edit', [$query->id, 'product' => request()->product, 'variant' => request()->variant])."' class='btn btn-info btn-sm ml-2'><i class='fa-regular fa-pen-to-square'></i>Edit</a>";
                $dltBtn = "<a href='".route('admin.product-variant-items.destroy', $query->id)."' class='btn btn-warning btn-sm ml-2 delete-item'><i class='fa-solid fa-trash'></i>Delete</a>";
                return $editBtn.$dltBtn;
            })
            ->addColumn('product_variant_item_status', function($query){
                if($query->product_variant_item_status==1){
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
           ->addColumn('product_variant_item_is_default', function($query){
             if($query->product_variant_item_is_default == 0){
                return' <i class="badge badge-pill badge-warning">No</i>';
             }else{
                return '<i class="badge badge-pill badge-success">Default</i>';
             }
           })
           ->addColumn('product_variant_item_product_variant_id', function ($query) {
            return $query->productVariant->product_variant_name;
            })
        
            ->rawColumns(['action', 'product_variant_item_status', 'product_variant_item_is_default', 'product_variant_item_product_variant_id'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariantItem $model): QueryBuilder
    {
        return $model->where('product_variant_item_product_variant_id', request()->variant)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productvariantitem-table')
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
            Column::make('product_variant_item_name'),
            Column::make('product_variant_item_price')->title("Price($)"),
            Column::make('product_variant_item_is_default'),
            Column::make('product_variant_item_status'),
            Column::make('product_variant_item_product_variant_id')->title('Product Variant ID'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVariantItem_' . date('YmdHis');
    }
}
