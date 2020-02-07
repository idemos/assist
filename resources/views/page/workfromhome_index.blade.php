@extends('layouts.index')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <button class="btn btn-block btn-success" onClick="document.location.href='{{ route('workfromhome.create') }}';">Create New Request</button>
            <hr>
            <div id="gridContainer_workfromhome"></div>
        </div>
    </div>
@endsection






@section('footer_script')
    <script src="{{ asset('js/datagrid.workfromhome.js') }}"></script>

    <script>
    var data = {
        url_list: "{{ route('workfromhome.index') }}",
        url_delete: "{{ route('workfromhome.destroy',':id') }}"
    }

    $(function(){
        $("#gridContainer_workfromhome").dxDataGrid('instance').option('dataSource', data.url_list);
    });
    </script>
@endsection