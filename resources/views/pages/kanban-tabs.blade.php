<div class="container-fluid h-100">
    @foreach ($statuses as $status)
        <div class="card card-row {{ $status->bg_color }}">
            <div class="card-header">
                <h3 class="card-title">
                    {{ $status->status }}
                </h3>
            </div>
            <div class="card-body" style="overflow:scroll; height:700px;">
                @foreach ($status->tasks as $task)
                    <div class="card {{ $status->bg_color }} card-outline" >
                        <div class="card-header">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <div class="card-tools">
                                <a href="#"
                                    class="btn btn-tool btn-link">#{{ $task->id }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $task->content }}
                            </p>
                            <img src="{{ asset('uploads/task-image/' . $task->image) }}"
                                alt="" style="width: 30%">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

