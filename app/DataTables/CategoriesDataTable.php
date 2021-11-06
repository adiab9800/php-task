<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoriesDataTable extends DataTable
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
            ->editColumn('is_active',function(Category $model){
                $form =  "<form action=".route('categories.status',['category'=>$model,'status'=>!$model->is_active]) ." method='POST'>";
                $form .= "<input type='hidden' name='_method' value='post'>";
                $form .= "<input type='hidden' name='_token' value=".csrf_token().">";
                if($model->is_active)
                    $form.="<button class='btn btn-info' type='submit'>Active</button>";            
                else
                    $form.="<button class='btn btn-danger' type='submit'>Inactive</button>  " ;
                $form.="</form>";
                return $form;
            })->addColumn('edit',function(Category $model){
                return "<a class='btn btn-success' href='".route('categories.edit',$model)."'>edit</a>";
            })
            ->addColumn('delete',function(Category $model){
                $form  =  "<form action=".route('categories.destroy',$model) ." method='POST'>";
                $form .= "<input type='hidden' name='_method' value='post'>";
                $form .= "<input type='hidden' name='_token' value=".csrf_token().">";
                $form .= "<button class='btn btn-danger' type='submit'>Delete</button>";
                $form .= "</form>";
                return $form;
            })
            ->rawColumns(['is_active','edit','delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
    {
        return $model->newQuery();
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
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('created_at'),
            Column::make('is_active')->orderable(false)->searchable(false),
            Column::make('edit')->orderable(false)->searchable(false),
            Column::make('delete')->orderable(false)->searchable(false)
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
