   <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>جميع الحقوق محفوظة لمعهد الدلتا العالي</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{trans('dashb.logoutMessage')}}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">{{trans('dashb.cancel')}}</button>
          <a class="btn btn-danger" href="{{route('admin.logout')}}">{{trans('dashb.logout')}}</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('dashboard')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('dashboard')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('dashboard')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('dashboard')}}/js/sb-admin-2.min.js"></script>



<!-- ------------------------------------------------------------------------------ -->

  <script src="{{asset('dashboard')}}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('dashboard')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>


  <script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('dashboard')}}/js/demo/datatables-demo.js"></script>


<!-- ------------------------------------------------------------------------------ -->




  <script src="{{asset('dashboard')}}/js/dashboard.js"></script>
<script type="text/javascript" src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>

  <!-- Page level plugins -->


@yield('js')
@stack('scripts')

<script type="text/javascript">
  $(function(){

   $(".buttons-create").addClass("btn btn-primary").removeClass("dt-button");
   $(".buttons-export").addClass("btn btn-secondary").removeClass("dt-button");
   $(".buttons-print").addClass("btn btn-success").removeClass("dt-button");
   $(".buttons-reset").addClass("btn btn-danger").removeClass("dt-button");
   $(".buttons-reload").addClass("btn btn-dark").removeClass("dt-button");


   $(".dt-buttons a").css({"marginRight" : "10px"});
   $(".dt-buttons").css({"marginBottom" : "10px"});


   $(".dataTables_filter input").css({"borderRadius" : "5px","outline" : 0});



var create = `<i class='fa fa-plus'></i>`;
var export_b = `<i class='fa fa-download'></i>`;
var print_b = `<i class='fa fa-print'></i>`;
var reset = `<i class='fa fa-undo'></i>`;
var reload = `<i class='fa fa-refresh'></i>`;

   $(".buttons-create span").html(create + " {{trans('dashb.create_btn')}}");
   $(".buttons-export span").html(export_b + " {{trans('dashb.export_btn')}}");
   $(".buttons-print span").html(print_b + " {{trans('dashb.print_btn')}}");
   $(".buttons-reset span").html(reset + " {{trans('dashb.reset_btn')}}");
   $(".buttons-reload span").html(reload + " {{trans('dashb.reload_btn')}}");
 });
</script>

</body>

</html>
