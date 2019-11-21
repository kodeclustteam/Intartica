</div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Intartica 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Do you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">NO</button>
          <a class="btn btn-primary" href="<?php echo base_url('superadmin/login/logout') ?>">YES</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('vendor/chart.js/Chart.min.js') ?>"></script>
  <script src="<?php echo base_url('vendor/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin.min.js') ?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
  <script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
  <script src="<?php echo base_url('js/demo/chart-bar-demo.js') ?>"></script>
  <script src="<?php echo base_url('js/demo/chart-pie-demo.js') ?>"></script>

  <!-- fast select multiple select plugin -->
  <script src="<?php echo base_url('dist/fastselect.standalone.js') ?>"></script>
  <script>
    $('.multipleSelect').fastselect();
  </script>
  <!-- implement add more functionality -->
  <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           var add_more = '<div class="row" id="row'+i+'"><div class="col-sm-6"><div class="form-group"><label for="image">Upload Photo :</label><input type="file" class="form-control" name="image[]" required></div></div><div class="col-sm-5"><div class="form-group"><label for="photo_type">Photo Type :</label><select name="photo_type[]" class="form-control" required><option value="" selected disabled>Select Photo Type</option><option value="kitchen">Kitchen</option><option value="bedroom">Bedroom</option><option value="dinning-room">Dinning Room</option><option value="living-room">Living Room</option><option value="bathroom">Bathroom</option></select></div></div><div class="col-sm-1"><label for="add"></label><button type="button" id="'+i+'" class="btn btn-danger btn-lg btn_remove">X</button></div></div>';
            if(i <= 15)
              $('#append_more').after(add_more);
            else
              alert('You can not add more than 15 images');

      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
 });  
 </script>
</body>

</html>