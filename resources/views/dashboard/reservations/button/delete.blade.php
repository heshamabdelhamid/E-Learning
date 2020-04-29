@if(admin()->hasPermissionTo('delete_reservation'))


<a href="#"   data-id="{!! $id!!}" data-action="reservations" data-name="{{trans('dashb.reservation')}}" class="ButtonDelete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>

@else

@endif
