@if(admin()->hasPermissionTo('delete_book'))


<a href="#"   data-id="{!! $id!!}" data-action="books" data-name="{!! $title !!}" class="ButtonDelete btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>

@else

@endif
