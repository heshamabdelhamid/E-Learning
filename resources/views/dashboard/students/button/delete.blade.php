@if(admin()->hasPermissionTo('delete_students'))

<a href="#"   data-id="{!! $id!!}" data-action="students" data-name="{!! $full_name !!}" class="ButtonDelete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>

@else

@endif