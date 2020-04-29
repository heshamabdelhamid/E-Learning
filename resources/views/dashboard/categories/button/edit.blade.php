@if(admin()->hasPermissionTo('update_category'))


	@if($name != 'undefined‏')

	<a href="{{url_dash('categories/'.$id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

	@endif

@endif

