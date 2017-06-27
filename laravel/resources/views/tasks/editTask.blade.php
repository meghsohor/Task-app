@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    @if (count($task) > 0)
                    <!-- Edit Task Form -->
                    <form action="{{ url('task/update/'."$task->id")}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            </div>
                        </div>

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-desc" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="task-desc" class="form-control">
                                    {{ $task->description }}
                                </textarea>
                            </div>
                        </div>

                        <!-- Edit Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Edit Task
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif   
                </div>
            </div>
            
        </div>
    </div>
@endsection
