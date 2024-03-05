<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerProductsDataTable extends DataTable
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
            $moreBtn = '
            <div class="btn-group ml-2">
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden"><i class="fa-solid fa-gear"></i></span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="'.route('admin.products-image-gallery.index',['product' => $query->id]).'"><i class="fas fa-images pr-2"></i> Image Gallery</a></li>
                <li><a class="dropdown-item" href="'.route('admin.product-variant.index', ['product' => $query->id]).'"><i class="fad fa-box pr-2"></i> Product Variant</a></li>
                </ul>
                </div>';
                return $editBtn.$dltBtn.$moreBtn;
            })
            ->addColumn('is_product_approved', function($query){
                $pendingSelected = $query->is_product_approved == 0 ? 'selected' : '';
                $approvedSelected = $query->is_product_approved == 0 ? 'selected' : '';
                return '<select class="form-control form-select-sm is_pending" data-id="'.$query->id.'" aria-label="Default select example">' .
                    '<option '.$approvedSelected.' value="1" style="font-weight:bold;color:green;">Approved</option>' .
                    '<option ' . $pendingSelected . ' value="0" style="font-weight:bold; font-style:italic;color:red;">Pending</option>' .
                    '</select>';
            })
            ->rawColumns(['is_product_approved', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('is_product_approved', 1)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellerproducts-table')
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
            Column::make('product_quantity'),
            Column::make('product_price'),
            Column::make('is_product_approved'),
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
        return 'SellerProducts_' . date('YmdHis');
    }
}
