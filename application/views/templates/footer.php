       <!-- Footer -->
       <footer class="sticky-footer bg-white">
           <div class="container my-auto">
               <div class="copyright text-center my-auto">
                   <span>Copyright &copy; Gas Medis Rumah Sakit Akademik UGM <?= date('Y'); ?> </span>
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
                       <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                       <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </button>
                   </div>
                   <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                   <div class="modal-footer">
                       <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                       <a class="btn btn-primary" href="<?= base_url('auth/signout') ?>">Logout</a>
                   </div>
               </div>
           </div>
       </div>

       <!-- Bootstrap core JavaScript-->
       <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery-3.5.1.js"></script>
       <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.js"></script>
       <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

       <!-- Core plugin JavaScript-->
       <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

       <!-- Custom scripts for all pages-->
       <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

       <script>
           function showPreview(event) {
               if (event.target.files.length > 0) {
                   var src = URL.createObjectURL(event.target.files[0]);
                   var preview = document.getElementById("imgPreview");
                   preview.src = src;
                   preview.style.display = "block";

               }
           }

           $(function newMenu() {
               $('.addNewMenuModal').on('click', function() {
                   $('#formModalLabel').html('ADD NEW MENU');
                   $('.modal-footer button[type=submit]').html('Add Menu');
                   $('.modal-body form').attr('action', "<?= base_url('menu') ?>")

               });
           });

           $(function editMenu() {

               $('.editMenuModal').on('click', function() {
                   var menuid = $(this).data('menuid');
                   var menuname = $(this).data('menuname');

                   $('#formModalLabel').html('EDIT MENU');
                   $('.modal-footer button[type=submit]').html('Edit Menu ');
                   $('.modal-body form').attr('action', "<?= base_url('menu/editMenu') ?>")
                   $('.modal-footer button[type=submit]').attr('onclick', 'return confirm("ARE YOU SURE TO EDIT MENU?")');
                   $('.menuid').attr('value', menuid);
                   $('.menuname').attr('value', menuname);

               })
           });

           document.getElementById("iconinput").addEventListener("input", iconPreview);

           function iconPreview(event) {
               var iconval = document.getElementById('iconinput').value;
               $('#iconpreview').removeClass();
               $('#iconpreview').addClass(iconval);
           }

           $('.form-check-input').on('click', function() {
               const menuId = $(this).data('menu');
               const roleId = $(this).data('userroleid');
               $.ajax({
                   url: "<?= base_url('admin/changeaccess'); ?>",
                   type: 'post',
                   data: {
                       roleId: roleId,
                       menuId: menuId
                   },

                   success: function() {
                       document.location.href = "<?= base_url('admin/roleAccsess/') ?>" + roleId;
                   }
               });
           });
       </script>

       </body>

       </html>