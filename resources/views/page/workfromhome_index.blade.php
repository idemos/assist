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
        url_update: "{{ route('workfromhome_update') }}",
        url_delete: "{{ route('workfromhome.destroy',':id') }}"
    }

    $(function(){
        $("#gridContainer_workfromhome").dxDataGrid('instance').option('dataSource', data.url_list);
    });

    @if(@auth()->user()->type == 1)
        $(document).on('click', '.btn-pending', function(e){
            /*
            var result = DevExpress.ui.dialog.confirm("Are you sure?", "Confirm undo");  
            result.done(function(dialogResult) {  
                //debugger;  
                if (dialogResult) {  
                    console.log(dialogResult);
                    //origClick.apply(arguments);  
                }else{

                }
            });
            */

            id = $(this).data('id');

            var encodedMessage = DevExpress.utils.string.encodeHtml("What do you want to do?");
            var myDialog = DevExpress.ui.dialog.custom({
                title: "Admin: chose..",
                messageHtml: encodedMessage,
                buttons: [{
                    text: "Refuse",
                    onClick: function(e) {
                        return { buttonText: '2' }
                    }
                },{
                    text: "Accept",
                    onClick: function(e) {
                        return { buttonText: '1' }
                    }
                }]
            });

            myDialog.show().done(function(dialogResult) {
                var status = (dialogResult.buttonText);

                var datas = {
                    id: id,
                    status: status
                };

                var url_update = data.url_update;
                //var url_update = url_update.replace(':id', id);
                
                $.ajax({ 
                    type: "get", 
                    url: url_update, 
                    cache: false,
                    data: (datas),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        top.location.href = data.url_list;
                    }
                });
            });

        });
    @endif
    </script>
@endsection