        
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        </div>
        <!-- Card Body -->
        <div class="card-body">
        		<div>
        			
        			
        			<style type="text/css">
        	            .table {
        	              text-align: center;
        	              vertical-align: middle;
        	            }

        	            .table th{
        	              text-align: center;
        	              vertical-align: middle;
        	            }

        	            .table td{
        	              text-align: center;
        	              vertical-align: middle;
        	            }

        	            .table>thead>tr>th,.table>tbody>tr>th,.table>tfoot>tr>th,.table>thead>tr>td,.table>tbody>tr>td,.table>tfoot>tr>td{
        	            vertical-align:middle;

        	            }
        	        </style>
        	                        
        			
        		</div>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Users</h6>

                        </div>
                        <div class="card-body">
                            <div class="py-2">
                                <a href="<?php echo base_url() ?>user/add">
                                    <button  class="btn btn-success">
                                        Add User
                                    </button>
                                </a>
                            </div>
                            <div class="table-responsive px-2">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Urut</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Nopek</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $nourut = 1;
                                        foreach ($rows as $row) { ?>
                                        <tr>
                                            <td><?= $nourut++; ?></td>
                                            <td><?= $row->username; ?></td>
                                            <td><?= ($row->level == 'admin') ? 'Admin' : $this->user_model->getByIdJoinPos($row->u_id)->row()->Name; ?></td>
                                            <td><?= $row->PositionID; ?></td>
                                            <td><?= $row->level; ?></td>
                                            <td>
                                               <a class="btn btn-warning" href="<?php echo base_url() ?>user/edit/<?php echo $row->u_id; ?>">Edit</a>
                                                <a  class="btn btn-danger" href="<?php echo base_url() ?>user/delete/<?php echo $row->u_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                            </td>
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
      $('#dataTable').DataTable({
        ordering : true,
        autoWidth : false,
        select: {
              style: 'single' // Enable multi-row selection (can also use 'single')
        },
      });
    });
</script>

<script src="https://cdn.datatables.net/filters/1.6.5/js/dataTables.filters.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
</head>
<script src="<?php echo base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>