<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        
        <div class="col-xl-2 col-md-6 mb-4">
        <a href="#" onclick="showOR()" class="badge element">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-center">

                        <div class="col-xl-12 mr-2 mb-2">
                            <i class="fas fa-bezier-curve fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-xl-12 mr-2 mt-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Create OCF </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-2 col-md-6 mb-4">
            <a href="<?php echo base_url()?>MRF/create" class="badge element">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-center">

                        <div class="col-xl-12 mr-2 mb-2">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-xl-12 mr-2 mt-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Create MRF </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showOR(){
        $.ajax({
                url: "",
                type: "",
                dataType: "",
                success: function(data) {
                    let tableHtml = "<table class='table table-sm table-bordered small'>";
                     tableHtml += "<thead><tr><th>No</th><th>Approver Role</th><th>Approver</th><th>Status</th><th>Last Update</th></thead>";
                     tableHtml += "<tbody>";
                     data.forEach(row => {
                       tableHtml += `<tr><td></td><td></td><td></td><td></td><td></td></tr>`;
                     });
                     tableHtml += "</tbody></table>";

                     Swal.fire({
                       title: 'MRF Approval Progress',
                       html: tableHtml,
                       width : 1000,
                       showCloseButton: true,
                     })
                }
            });
    }
</script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url()?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url()?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url()?>assets/js/demo/chart-pie-demo.js"></script>
<script src="<?php echo base_url()?>assets/js/demo/chart-bar-demo.js"></script>