<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    // Function to define the DataTable structure
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        // Create a new EloquentDataTable instance, set row ID to 'id'
        return (new EloquentDataTable($query))->setRowId('id')
        ->editColumn('status', function ($user) {
            return ucfirst($user->status); // Use ucfirst to capitalize the first letter of 'status'
        })
        ->editColumn('last_login', function ($user) {
            return $user->last_login ? date('Y-m-d H:i:s', strtotime($user->last_login)) : ''; // Use ucfirst to capitalize the first letter of 'status'
        })
        ->editColumn('role_id', function ($user) {
            return $user->role->name; // Get the name of the role associated with the user
        })->addColumn('action', 'user.action'); // Add a column for actions using the 'user.action' view
    }

    // Function to set the initial query for the DataTable
    public function query(User $model): QueryBuilder
    {
        // Use Eloquent's newQuery method to get a new query builder instance
        $query = $model->newQuery()->with('role'); // Eager load the 'role' relationship

        // Check if deleted items should be included
        if (request()->input('show_deleted')) {
            $query = $query->onlyTrashed(); // Include only soft deleted items
        } else {
            $query = $query->withoutTrashed(); // Exclude soft deleted items
        }

        // Exclude the first user based on ID
       // $firstUserId = User::orderBy('id')->value('id'); // Get the ID of the first user
        $firstUserId = 0; // Get the ID of the first user
        $query->where('id', '!=', $firstUserId); // Exclude the user with the first ID

        return $query;
    }

    // Function to define the HTML structure of the DataTable
    public function html(): HtmlBuilder
    {
        return $this->builder()->setTableId('users-table') // Set the table ID to 'users-table'
        ->columns($this->getColumns()) // Set columns using the getColumns function
        ->minifiedAjax() // Enable minified AJAX for faster loading
        ->orderBy(1) // Order the table by the first column
        ->selectStyleSingle() // Enable single row selection style
        ->responsive(true) // Enable responsive extension
        ->buttons([ // Add various DataTable buttons
            Button::make('add'),
            Button::make('excel'),
            Button::make('csv'),
//            Button::make('pdf'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload'),
        ]);
    }

    // Function to define the columns of the DataTable
    public function getColumns(): array
    {
        return [
            Column::make('id'), // Column for 'id'
            Column::make('name'), // Column for 'name'
            Column::make('email'), // Column for 'email'
            Column::make('role_id'), // Column for 'role_id'
            Column::make('status'), // Column for 'status'
            Column::make('last_login'), // Column for 'created_at'
            Column::make('created_at'), // Column for 'created_at'
            Column::make('updated_at'), // Column for 'updated_at'
            Column::make('deleted_at'), // Column for 'deleted_at'
            Column::computed('action') // Column for actions
            ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    // Function to set the filename for export operations
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis'); // Filename with 'Users_' prefix and timestamp
    }
}
