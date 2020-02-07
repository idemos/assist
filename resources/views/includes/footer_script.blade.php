<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr/event.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr/supplemental.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cldrjs/0.4.4/cldr/unresolved.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/message.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/number.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/currency.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/globalize/1.1.1/globalize/date.min.js"></script>

<script src="https://cdn3.devexpress.com/jslib/19.2.5/js/dx.all.js"></script>
<script src="https://cdn3.devexpress.com/jslib/19.2.5/js/localization/dx.messages.it.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script>
$(document).on('click','.btn-delete',function(event){
	event.preventDefault();
	
	var url_delete = data.url_delete.replace(':id', $(this).data('id'));
	var csrf = $('meta[name="csrf-token"]').attr('content');

	console.log(csrf);
	
	$.ajax({ 
		type: "DELETE", 
		url: url_delete, 
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success: function(result) {
			console.log(result);
			location.reload();
			/*
			if(result.msg){
				$(this).parents('tr').hide();
				location.reload();
			}
			*/
		}
	});
});
</script>