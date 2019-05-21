@extends('layouts.main')

@section('title', 'Edit Tasks')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1>Edit Task</h1>
            {{ Form::open(['route' => ['task.destroy', $task->id], 'method' =>'DELETE']) }}
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            {{ Form::close() }}
            {!! Form::model($task, ['route' => ['task.update',$task->id],'method' => 'PUT']) !!}

            @component('components.taskForm')
                
            @endcomponent

            
            {!! Form::close() !!}
        </div>
    </div>

@endsection()