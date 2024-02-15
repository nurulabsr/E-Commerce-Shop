<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerApprovedProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerApprovedProductsDataTable extends DataTable
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
             case 'featured_product':
                 return '<i class="badge badge-warning">Featured Product</i>';
                 break;
             default:
                 return '<i class="badge badge-dark">No Product Avaiable</i>';
                 break;
            }
         })
         ->addColumn('is_product_approved', function($query){
            if($query->is_product_approved == 0){
               return '<i class="badge badge-danger">Pending</i>';
            }
         })

         
         ->addColumn('approve', function($query) {
            $pendingSelected = $query->is_product_approved == 0 ? 'selected' : '';
            return '<select class="form-control form-select-sm is_approve" data-id="'.$query->id.'" aria-label="Default select example">' .
                '<option value="1" style="font-weight:bold;color:green;">Approved</option>' .
                '<option ' . $pendingSelected . ' value="0" style="font-weight:bold; font-style:italic;color:red;">Pending</option>' .
                '</select>';
        })
        ->addColumn('product_status', function($query){
            if($query->product_status==1){
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

       ->rawColumns(['action', 'product_type', 'is_product_approved', 'approve', 'product_status'])
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
                    ->setTableId('sellerapprovedproducts-table')
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
            Column::make('product_video_link'),
            Column::make('product_type'),
            Column::make('is_product_approved'), 
            Column::make('approve'),
            Column::make('product_status'),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerApprovedProducts_' . date('YmdHis');
    }
}
