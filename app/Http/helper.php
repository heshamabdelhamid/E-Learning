<?php


	function datatableLang(){
		return [
             "sEmptyTable"=>     trans("dashb.sEmptyTable"),
             "sInfo"=>           trans("dashb.sInfo"),
             "sInfoEmpty"=>      trans('dashb.login'),
             "sInfoFiltered"=>   trans("dashb.sInfoFiltered"),
             "sInfoPostFix"=>    "",
             "sInfoThousands"=>      ".",
             "sLengthMenu"=>     trans("dashb.sLengthMenu"),
             "sLoadingRecords"=>     trans("dashb.sLoadingRecords"),
             "sProcessing"=>     trans("dashb.sLoadingRecords"),
             "sSearch"=>         trans("dashb.sSearch"),
             "sZeroRecords"=>    trans("dashb.sZeroRecords"),
             "oPaginate"=> [
                 "sFirst"=>      trans("dashb.sFirst"),
                 "sPrevious"=>   trans("dashb.sPrevious"),
                 "sNext"=>       trans("dashb.sNext"),
                 "sLast"=>       trans("dashb.sLast")
             ],
             "oAria"=> [
                 "sSortAscending"=>  ": aktivieren, um Spalte aufsteigend zu sortieren",
                 "sSortDescending"=> ": aktivieren, um Spalte absteigend zu sortieren"
             ]
		];
	}



function url_dash($url){

    return url('admin/'.$url);
}



    function checkImage($para = null){

        if($para == null){

           return 'image|mimes:jpeg,jpg,png,gif|max:10000';
        }else{

            return 'image|mimes:'.$para;
        }

    }


function uploade(){

    return new App\Http\Controllers\ImgUploade;
}


 function settings(){

    return  \App\Setting::orderBy("id","desc")->first();
 }


function admin(){

     return auth()->guard('admin')->user();
}


function categories(){

            return \App\Category::where("id","!=",1)->get();

}


 function checkLike($book_id){

     return \App\BookLikes::where('book_id',$book_id)->where('student_id', auth()->user()->id)->first();
 }



?>