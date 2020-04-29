@if(admin()->hasPermissionTo('delete_category'))

@if($name != 'undefined‏')

<a href="#"   data-id="{!! $id !!}" data-action="categories" data-name="{!! $name !!}" class="ButtonDelete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>

@endif


@endif