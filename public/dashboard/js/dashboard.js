$(function(){





$(document).on("click",".ButtonDelete",function(e){ 
   e.preventDefault();
    var id = $(this).data('id');
    var action = $(this).data('action');
    var name = $(this).data('name');
     $("#modelDelete form").attr("action",action + "/" + id);
     $("#modelDelete .modal-body span").text(name);
    $("#modelDelete").modal("show");
});



     $("#imgInp").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.blah').attr('src', e.target.result);
                $(".showIm").removeClass('d-none');
            }

            reader.readAsDataURL(this.files[0]);
        }else{
               $(".showIm").addClass('d-none');

        }

     });  


});