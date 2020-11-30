@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done !!! </strong>{{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                </div>
                <form action="{{ route('store') }}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="task" class="">
                            Add Task
                        </label>
                        <input id="task" name ="task" type="text" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Add New Task</button>
                    </div>
                </form>
            </div>
            <h4 class="p-4">Pending Tasks</h4>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Task Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($tasks as $task)
                <tr>
                    <td>
                        <li><a>{{$task->task_name }}</a></li>
                    </td>
                    <td>
                        {{ ($task->created_at)->format("d-M-y h:i:s") }}
                    </td>
                    <td>
                        <a href="{{ route("complete", $task->id ) }}" class="btn btn-info ml-2">Completed</a>
                        <a href="{{ route("delete" , $task->id ) }}" class="btn btn-danger ml-2">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="d-flex justify-content-center">
                {{ $tasks->links() }}
            </div>
            <h4 class="p-4">Completed Tasks</h4>

                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Task Name</th>
                            <th>Date Completed</th>
                        </tr>
                    </thead>
                    @foreach ($completedTask as $c_task)
                    <tr>
                        <td>
                            <li><a>{{$c_task->task_name }}</a></li>
                        </td>
                        <td>
                            {{ ($c_task->updated_at)->format("d-M-y h:i:s") }}
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {{ $completedTask->links() }}
                </div>
        </div>
    </div>
</div>
@endsection