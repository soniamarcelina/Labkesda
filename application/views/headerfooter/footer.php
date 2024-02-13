					
					</div>	
						
                        </div>
                        <!-- /.container-fluid -->
        
                    </div>
                    <!-- End of Main Content -->
        
                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; sonmrcl </span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->
        
                </div>
                <!-- End of Content Wrapper -->
        
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                                <a class="btn btn-primary" href="<?php echo base_url()?>auth/logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Page Wrapper -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a> 
            
            <script type="text/javascript">
                function checkInputs() {
                  const requiredInputs = document.querySelectorAll('.required');
        
                  let allInputsFilled = true;
                  requiredInputs.forEach(inputElement => {
                    const inputValue = inputElement.value.trim(); // Remove leading/trailing white spaces
        
                    if (inputValue === '') {
                      allInputsFilled = false;
                      // Optionally, you can add a visual indication that the input is required and empty
                      inputElement.style.border = '2px solid red';
                    } else {
                      // Optionally, you can remove the visual indication when the input is filled
                      inputElement.style.border = '';
                    }
                  });
        
                  if (allInputsFilled) {
                    //alert('All required inputs are filled.');
                    return true;
                    // You can proceed with form submission or other actions here
                  } else {
                    //alert('Some required inputs are empty.');
                    return false;
                    // You can prevent form submission or take other actions here
                  }
                }
        
                function formatNumber(x) {
                    // format number 1000000 to 1,234,567
                    //return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            </script>
            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        
            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
        </body>
        
            <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/Datatables2/datatables.min.js?>"></script>
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/Datatables2/datatables.min.css"/> 
        </html>