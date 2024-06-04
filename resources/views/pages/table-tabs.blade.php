<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="text-center">
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->content }}</td>
                        <td><img src="{{ asset('uploads/task-image/' . $task->image) }}" alt="" width="5%">
                        </td>
                        <td>
                            <span class="right badge badge-primary">{{ $task->TaskStatus->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                {{-- <button class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal">Add
                                    Subtask</button> --}}
                                <a class="btn btn-default btn-sm " href="{{route('task.edit', $task)}}">Update Task</a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#exampleModal" id="deleteTaskBtn" data-id="{{$task->id}}">Delete Task</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    
</div>
{{ $tasks->links() }}
