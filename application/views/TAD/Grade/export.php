
        <!-- Card Body -->
        <div class="card-body">
        		<div>               
        			
        		</div>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Grade</h6>
                        </div>
                        <div class="card-body">
                            <div class="p-2">
                              <a href="#" data-toggle="modal" data-target="#import-grade">
                                <button  class="btn btn-primary">
                                  <i class="fa fa-file-import"></i> Import Data
                                </button>
                              </a>
                            </div>
                            <div class="table-responsive px-2">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table class="table table-bordered table-sm nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No Urut</th>
                                            <th class="text-center">ID Grade</th>
                                            <th class="text-center">Nomenklatur</th>
                                            <th class="text-center">Kompetensi</th>
                                            <th class="text-center">Work Experience</th>
                                            <th class="text-center">Minimal Degree</th>
                                            <th class="text-center">Minimal Salary</th>
                                            <th class="text-center">Middle Salary</th>
                                            <th class="text-center">Maximal Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><</td>
                                        </tr>
                                                             
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="import-grade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="text-bold">Import Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="<?php echo base_url().'TAD/Grade/import'; ?>">
      <div class="modal-body">
      <label>Upload File</label>
        <div class="custom-file">
        <input type="file" name="file_excel" value="Choose File" class="btn btn-secondary">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="import" class="btn btn-primary" >Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<style type="text/css">
    .my-actions { margin: 0 2em; }
    .order-1 { order: 1; }
    .order-2 { order: 2; }
    .order-3 { order: 3; }

    .right-gap {
      margin-right: auto;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {

      var gradetable = $('#dataTable').DataTable({
        scrollX:true,
        ordering : true,
        autoWidth : true,
        fixedColumns: {
            left: 2,
        },
        columnDefs: [
            {
                className: 'select-checkbox',
                targets: 0
            },
            { "targets": 1, visible: true}, //id
            { "targets": 2, visible: true}, //nomenklatur
            { "targets": 3, visible: true}, //kompetensi
            { "targets": 4, visible: true}, //workexp
            { "targets": 5, visible: false}, //minedu
            { "targets": 6 ,visible: false}, //minsal
            { "targets": 7 ,visible:false}, //midsal
            { "targets": 8, visible: true}, //maxsal
          ],
        select: {
              style: 'single' // Enable multi-row selection (can also use 'single')
        },
        buttons: [ 
            {
                extend: 'colvis',
                collectionLayout: 'fixed columns',
                collectionTitle: 'Column visibility control'
            },
            'excel',
        ],
        dom: 'Bfrtip',
    });
     // Inisialisasi fitur drag and drop pada baris tabel
     $('#dataTable tbody').sortable({
        helper: 'clone',
        axis: 'y',
        update: function (event, ui) {
          var newDataOrder = $(this).sortable('toArray', { attribute: 'data-id' });

          // Kirim data urutan baru ke server
          $.ajax({
            url: 'TAD/Grade/handleDagAndDrop',
            type: 'POST',
            data: { newDataOrder: newDataOrder },
            success: function (response) {
              console.log(response);
            },
            error: function (error) {
              console.log(error);
            }
          });
        }
      }).disableSelection();
    });
     
    
</script>        
        

<script src="https://cdn.datatables.net/filters/1.6.5/js/dataTables.filters.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
</head>
<script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>