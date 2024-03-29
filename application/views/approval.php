        
        <!-- Card Body -->
        <div class="card-body">
        		<div>               
        			
        		</div>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Approval MRF</h6>
                        </div>
                        <div class="card-body">
                            <div class="py-2">
                            </div>
                            <div class="table-responsive px-2">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table class="table table-bordered table-sm nowrap" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No Urut</th> 
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Type ID</th>
                                            <th class="text-center">Approver Role</th>
                                            <th class="text-center">Approver ID</th>
                                            <th class="text-center">Approver Order</th>
                                            <th class="text-center">Approver Pers ID</th>
                                            <th class="text-center">ID Approval</th>
                                            <th class="text-center">Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                        $nourut = 1;
                                        foreach ($rows as $row) { 
                                        ?>
                                            <td><?= $nourut++; ?></td>
                                            <td><?=  $row->status ?></td>
                                            <td><?= $row->type?></td>
                                            <td><?= $row->type_id?></td>
                                            <td><?= $row->approver_role?></td>
                                            <td><?= $row->approver_id?></td>
                                            <td><?= $row->approver_order ?></td>
                                            <td><?= $row->approver_persID ?></td>
                                            <td><?= $row->id?></td>
                                            <td><?= $row->comments?></td>
                                        </tr>
                                        <?php
                                    }?>                            
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

      var aprMrftable = $('#dataTable').DataTable({
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
            { "targets": 1, visible: true}, //status
            { "targets": 2, visible: true}, //subject
            { "targets": 3, visible: true}, //type
            { "targets": 4, visible: true}, //code OCF
            { "targets": 5, visible: false}, //position title
            { "targets": 6 ,visible: false}, //headcount
            { "targets": 7 ,visible:false}, //direct supervisor
            { "targets": 8 ,visible:false}, //direct supervisor
            { "targets": 9 ,visible:false}, //direct supervisor
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
            {
                extend: 'collection',
                text: 'View',
                buttons: [
                    {
                        text: 'View',
                        action: function ( e, dt, node, config ) {
                            //dt.column( -2 ).visible( ! dt.column( -2 ).visible() );
                            var rows = aprMrftable.rows( { selected: true } ).data().toArray();
                            //console.log( rows ); // array of selected rows (each row is an array of data)
                            var ids = rows.map(function(x) {
                                return x[8];
                            });
                            var type = rows.map(function(x) {
                                return x[3];
                            });
                            showApprove(type,ids)
                        }
                    },
                   
                    
                    ]
            }
        ],
        dom: 'Bfrtip',
    });
      });
    
</script>

<script type="text/javascript">
    function viewProgress(type,id){
        $.ajax({
                url: "<?php echo base_url()?>TAD/"+type+"/getProgress/"+id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let tableHtml = "<table class='table table-sm table-bordered small'>";
                     tableHtml += "<thead><tr><th>No</th><th>Approver Role</th><th>Approver</th><th>Status</th><th>Last Update</th></thead>";
                     tableHtml += "<tbody>";
                     data.forEach(row => {
                       tableHtml += `<tr><td>${row.approver_order}</td><td>${row.approver_role}</td><td>${row.employee.Position}  - ${row.employee.Name}</td><td>${row.status}</td><td>${row.updated_at}</td></tr>`;
                     });
                     tableHtml += "</tbody></table>";

                     Swal.fire({
                       title: 'OCF Approval Progress',
                       html: tableHtml,
                       width : 1000,
                       showCloseButton: true,
                     })
                }
            });
    }

    function showApprove(id) {
        $.ajax({
                url: "<?php echo base_url()?>MRF/viewApprove/"+id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                            var id = $(this).data('id');
                             for (var key in data) {
                                if (data[key].mrf_code == id) {
                                console.log(data[key])    
                                 break;
                               }
                             }
                     Swal.fire({
                       title: 'Approval MRF',
                       showDenyButton: true,
                       showCancelButton: true,
                       confirmButtonText: 'Approve',
                       denyButtonText: 'Reject',
                       customClass: {
                         actions: 'my-actions',
                         cancelButton: 'order-1 right-gap',
                         confirmButton: 'order-2 btn-success',
                         denyButton: 'order-3',

                       },
                       html: 
                            '<div class="card my-3 text-left">'+
                                '<div class="card-body row mt-4">'+
                                    '<div class="col-md-12 col-xl-12 mt-4 mb-2">'+
                                        '<h5>Requestor Data</h5>'+
                                        '<hr>'+
                                    '</div>'+
                                    '<div class="col-md-12 col-xl-12">'+
                                        `<label class="float-right">Date : </label>`+
                                    '</div>'+
                                    '<!-- Row 1 -->'+
                                    '<div class="col-md-12 col-xl-12 row">'+
                                        '<div class="col-md-5 col-xl-2">No MRF</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-9">${data.MRFData.mrf_code}</div>`+
                                    '</div>'+
                                    '<div class="col-md-12 col-xl-12 row">'+
                                        '<div class="col-md-5 col-xl-2">Type MRF</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-9">${data.MRFData.mrf_type}</div>`+
                                    '</div>'+
                                    '<!-- Row 2 -->'+
                                    '<div class="col-md-12 col-xl-12 row">'+
                                        '<div class="col-md-5 col-xl-2">Subsidiaries</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-9" id="rvSubs"></div>`+
                                    '</div>'+
                                    '<!-- Row 3 -->'+
                                    '<div class="col-md-12 col-xl-12 row">'+
                                        '<div class="col-md-5 col-xl-2">Creator</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-9" id="rvCreator"></div>`+
                                    '</div>'+
                                    '<!-- Row 4 -->'+
                                    '<div class="col-md-12 col-xl-12 row">'+
                                        '<div class="col-md-5 col-xl-2">Job Position</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-9" id="rvCrPos"></div>`+
                                    '</div>'+
                                    '<div class="col-xl-6 mb-4"></div>'+
                                    '<!-- Separator -->'+
                                    '<div class="col-md-12 col-xl-12 mt-4 mb-2">'+
                                        '<h5>Position Data</h5>'+
                                        '<hr>'+
                                    '</div>'+
                                    '<!-- Row 1 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Position Title</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvTitle">${data.MRFData.PosTitle}</div>`+
                                    '</div>'+
                                    '<div class="col-xl-6 mb-4"></div>'+
                                    '<!-- Row 2 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Division</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDiv"></div>`+
                                    '</div>'+
                                    '<!-- Row 3 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Departemen</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDept"></div>`+
                                    '</div>'+
                                    '<div class="col-xl-12 mb-4"></div>'+
                                    '<!-- Row 4 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Direct Report</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDirPos"></div>`+
                                    '</div>'+
                                    '<div class="col-xl-6 mb-4"></div>'+
                                    '<!-- Row 5 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Division</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDiv"></div>`+
                                    '</div>'+
                                     '<!-- Row 6 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Department</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDept"></div>`+
                                    '</div>'+
                                    '<div class="col-xl-6 mb-4"></div>'+
                                    '<!-- Separator -->'+
                                    '<div class="col-md-12 col-xl-12 mt-4 mb-2">'+
                                        '<h5>MRF Contract Detail</h5>'+
                                        '<hr>'+
                                    '</div>'+
                                    '<!-- Row 1 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Start Date</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDept">${data.MRFData.start_date}</div>`+
                                    '</div>'+
                                    '<!-- Row 2 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">End Date</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDept">${data.MRFData.end_date}</div>`+
                                    '</div>'+
                                    '<!-- Row 3 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Durasi</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvDept">${data.MRFData.start_date} -> ${data.MRFData.end_date}</div>`+
                                    '</div>'+
                                    '<div class="col-xl-6 mb-4"></div>'+
                                    '<!-- Row 4 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Location</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvWL">${data.MRFData.PersArea_ID}</div>`+
                                    '</div>'+
                                    '<!-- Row 5 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Work Schedule</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="newWS">${data.MRFData.Work_Schedule}</div>`+
                                    '</div>'+
                                    '<!-- Row 6 -->'+
                                    '<div class="col-md-6 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Budget Type</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="RvCost">${data.MRFData.CostType}</div>`+
                                    '</div>'+
                                    '<!-- Row 5 -->'+
                                    '<div class="col-md-5 col-xl-6 row">'+
                                        '<div class="col-md-5 col-xl-4">Cost Center</div>'+
                                        '<div class="col-md-1 col-xl-1">:</div>'+
                                        `<div class="col-md-6 col-xl-7" id="rvCost">${data.MRFData.CostCenter}</div>`+
                                    '</div>'+
                                    '<div class="col-xl-6 mb-4"></div>'+
                                    '<!-- Separator -->'+
                                    '<div class="col-md-12 col-xl-12 mt-4 mb-2">'+
                                        '<h5>Brief Justification</h5>'+
                                        '<hr>'+
                                    '</div>'+
                                    '<!-- Row 1 -->'+
                                    '<div class="col-md-12 col-xl-12 row">'+
                                        `<div class="col-md-12 col-xl-12 text-justify" id="rvJus">${data.MRFData.justification}</div>`+
                                    '</div>'+
                                    '<div class="col-xl-6"></div>'+
                                    
                                '</div>'+
                            '</div>'+
                            '</div>'+
                            '<div class="col-xl-12 text-left py-4">'+
                                '<label>Comments</label>'+
                                '<input type="text" id="comments" class="form-control" placeholder="Reason for Reject">'+
                            '</div>',
                        width : 1200,
                        preConfirm: () => {
                          return [
                            document.getElementById('comments').value
                          ]
                        },
                     }).then((result) => {
                       if (result.isConfirmed) {
                         Swal.fire('Approved!', '', 'success')
                       } else if (result.isDenied) {
                         Swal.fire('Rejected!', '', 'info')
                       }
                     })
                }

            });
    }
                
</script>

<script src="https://cdn.datatables.net/filters/1.6.5/js/dataTables.filters.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
</head>
<script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>