@extends('layouts.index')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <button class="btn btn-block btn-success" onClick="document.location.href='{{ route('task.create') }}';">Create New Task</button>
            <hr>
            <div id="gridContainer_task"></div>
        </div>
    </div>
@endsection






@section('footer_script')
    <script src="{{ asset('js/datagrid.task.js') }}"></script>

    <script>
    var data = {
        url_list: "{{ route('task.index') }}",
        url_edit: "{{ route('task.edit',':id') }}",
        url_delete: "{{ route('task.destroy',':id') }}"
    }

    $(function(){
        $("#gridContainer_task").dxDataGrid('instance').option('dataSource', data.url_list);
    });
    </script>
@endsection