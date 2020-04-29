@if(admin()->hasPermissionTo('delete_admin'))

<a href="#"   data-id="{!! $id!!}" data-action="admins" data-name="{!! $name !!}" class="ButtonDelete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>

@else

@endif