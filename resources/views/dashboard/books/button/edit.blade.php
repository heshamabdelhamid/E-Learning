@if(admin()->hasPermissionTo('update_book'))


<a href="{{url_dash('books/'.$id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

@else

@endif
