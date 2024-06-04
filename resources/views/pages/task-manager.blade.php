@extends('main')

@section('pageLinks')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

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

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-table-tab" data-toggle="pill"
                                        href="#custom-tabs-table" role="tab" aria-controls="custom-tabs-table"
                                        aria-selected="false">Table</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="custom-tabs-kanban-tab" data-toggle="pill"
                                        href="#custom-tabs-kanban" role="tab" aria-controls="custom-tabs-kanban"
                                        aria-selected="true">Board</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-table" role="tabpanel"
                                    aria-labelledby="custom-tabs-table-tab">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#createTask">Create
                                        Task</button>
                                    <br>
                                    <br>
                                    @include('pages.table-tabs')

                                </div>
                                <div class="tab-pane fade " id="custom-tabs-kanban" role="tabpanel"
                                    aria-labelledby="custom-tabs-kanban-tab">
                                    @include('pages.kanban-tabs')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </section>
    </div>

    @include('pages.modals')
@endsection

@section('pageScripts')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        if ($("ul#error-message").length > 0) {
            console.log($("ul#error-message"));
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Error Message',
                body: 'Please check the modal for the error message'
            })
        };

        $("#deleteTaskBtn").click(function() {
            let taskContent = $(this).attr('data-id');
            $("#formDeleteTask").attr("action", `/delete-task/${taskContent}`)
            
        });
    </script>
@endsection
