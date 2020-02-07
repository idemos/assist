@extends('layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <button class="btn btn-block btn-success" onClick="document.location.href='{{ route('user.create') }}';">Create New User</button>
            <hr>
            <div id="gridContainer_user"></div>
        </div>
    </div>
@endsection

@section('footer_script')
<script src="{{ asset('js/datagrid.user.js') }}"></script>

<script>
var data = {
    url_list: "{{ route('user.index') }}",
    url_edit: "{{ route('user.edit',':id') }}",
    url_delete: "{{ route('user.destroy',':id') }}"
}

$(function(){
    $("#gridContainer_user").dxDataGrid('instance').option('dataSource', data.url_list);
});
</script>
@endsection
