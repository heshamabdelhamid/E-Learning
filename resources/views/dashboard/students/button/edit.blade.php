@if(admin()->hasPermissionTo('update_students'))
<a href="{{url_dash('students/'.$id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
@else

@endif