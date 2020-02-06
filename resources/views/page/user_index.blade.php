@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                        <div id="gridContainer_user"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="{{ asset('js/datagrid.user.js') }}"></script>

<script>
$(function(){
    $("#gridContainer_user").dxDataGrid('instance').option('dataSource', "{{ url('user_index') }}");
});
</script>
@endsection
