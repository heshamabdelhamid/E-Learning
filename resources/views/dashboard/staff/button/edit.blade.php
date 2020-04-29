@if(admin()->hasPermissionTo('update_staff'))
<a href="{{url_dash('staff/'.$id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
@else

@endif