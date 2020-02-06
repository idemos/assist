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
$(function(){
    $("#gridContainer_user").dxDataGrid('instance').option('dataSource', "{{ route('user.index') }}");
});
</script>
@endsection
