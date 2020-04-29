@if(admin()->hasPermissionTo('update_reservation'))


<a href="{{url_dash('reservations/'.$id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

@else

@endif
