@extends('main')

@section('content')
    <div class="content-wrapper kanban">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Task Manager</h1>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Task Manager</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content pb-3">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline card-tabs">

                        <form method="post" action="{{ route('task.update', $task) }}" >
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                        name="title" required value="{{$task->title}}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="task_status_id" id="task_status_id" class="form-control" required>
                                        @foreach ($statuses as $status)
                                            <option {{ $task->task_status_id == $status->id ? 'selected' : '' }} value="{{ $status->id  }}">
                                                {{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Textarea</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="content" required>{{$task->content}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
