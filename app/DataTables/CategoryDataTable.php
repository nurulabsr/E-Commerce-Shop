<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
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
                $editBtn = '<a href="'.route("admin.category.edit", $query->id).'" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>Edit</a>';
                $deleteBtn='<a href="'.route("admin.category.destroy", $query->id).'" class="btn btn-warning btn-sm ml-2 delete-item"><i class="fa-solid fa-trash"></i>Delete</a>';
                return $editBtn.$deleteBtn;
            })
            ->addColumn('category_icon', function($query){
               return $icon = '<i style="font-size:30px;" class="'.$query->category_icon.'"></i>';
            })
            // ->addColumn('category_status', function($query){
            //     $activeStatus = '<i class="badge badge-info">Active<i/>';
            //     $inactivStatus = '<i class="badge badge-warning">In Active</i>';
            //     if($query->category_status==1){
            //     return $activeStatus;
            //     } elseif($query->category_status==0){
            //         return $inactivStatus;
            //     } else{
            //         return '<i class="badge badge-danger">Out of Control</i>';
            //     }
            // })
            ->addColumn('category_status', function($query){
                 if($query->category_status==1){
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
            ->rawColumns(['category_icon', 'action', 'category_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
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
            Column::make('category_name'),
            Column::make('category_slug'),
            Column::make('category_icon'),
            Column::make('category_status')->width(160), 
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(160)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
