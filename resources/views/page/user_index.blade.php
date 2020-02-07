@extends('layouts.index')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div id="gridContainer_user"></div>
        </div>
    </div>
@endsection

@section('footer_script')
<script src="{{ asset('js/datagrid.user.js') }}"></script>

<script>
var data = {
    url_list: "{{ route('user.index') }}",
    url_edit: "{{ route('user.edit',':id') }}"
}

$(function(){
    $("#gridContainer_user").dxDataGrid('instance').option('dataSource', data.url_list);
});
</script>
@endsection
