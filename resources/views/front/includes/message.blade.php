@if(Session::has('message'))
<script type="text/javascript">
	swal("{{Session::get('message')}}","Press ok to hide message","success");
</script>
@endif
