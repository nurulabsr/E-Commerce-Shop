<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
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
                $editBtn = "<a href='".route('vendor.products.edit', $query->id)."' class='btn btn-info btn-sm ml-1' style=' color:#ffff;'> <i class='fa-regular fa-pen-to-square'></i>Edit</a>";
                $dltBtn = "<a href='".route('vendor.products.destroy', $query->id)."' class='btn btn-warning btn-sm ml-1 delete-item'><i class='fa-solid fa-trash'></i>Delete</a>";
                $moreBtn = '
                <div class="btn-group ml-2" style="width:50px;">
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                  <span style=" color:#ffff;"> <i class="fas fa-cog"></i> More </span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="'.route('vendor.image-gallery.index',['product' => $query->id]).'"><i class="fas fa-images pr-2"></i> Image Gallery</a></li>
                    <li><a class="dropdown-item" href="'.route('vendor.products-variant.index', ['product' => $query->id]).'"><i class="fad fa-box pr-2"></i> Product Variant</a></li>
                  </ul>
                </div>';
                return $editBtn.$dltBtn.$moreBtn;
            })

            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('product_vendor_id', Auth::user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproduct-table')
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
            Column::make('product_thumnail_img'),
            Column::make('product_quantity'),

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
        return 'VendorProduct_' . date('YmdHis');
    }
}
