<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductVariantDataTable extends DataTable
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
                $dltBtn = "<a href='".route('admin.product-variant.destroy', $query->id)."' class='btn btn-warning btn-sm ml-2 delete-item'><i class='fa-solid fa-trash'></i>Delete</a>";
                $manageBtn = "<a href='".route('admin.product-variant-items.index', ['product' => request()->product, 'variant' => $query->id])."' class='btn btn-primary btn-sm ml-2'><i class='fas fa-tasks pr-2'></i>Manage Product Variant</a>";
                return $editBtn.$dltBtn.$manageBtn;
            })
            ->addColumn('product_variant_status', function($query){
                if($query->product_variant_status==1){
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
            ->rawColumns(['action', 'product_variant_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model
            ->where('product_id', request()->product)
            ->where('product_variant_vendor_id', auth()->id())
            ->newQuery();
    }
    
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productvariant-table')
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
            Column::make('product_variant_name'),
            Column::make('product_variant_status'),
            Column::make('product_id'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(400)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVariant_' . date('YmdHis');
    }
}
