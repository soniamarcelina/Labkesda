    <!--script src="Scripts/orgchart.js" type="text/javascript"></script-->
    <script src="<?= base_url()?>assets/js/orgchart.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript">
        
        //draw orgchart
        function org(id) {
            
            var Headcount= -1;
            orgchart = new OrgChart('chart');
            // Utility.CubeBg = '#777';
            Utility.ImageDimen = {
                width: 35,
                height: 40
            };
            data = {
                'id' : id,
            }
            $.ajax({
                url: "<?php echo base_url()?>orgChart/getByChief",
                type: "post",
                dataType: "json",
                data : data,
                success: function(data) {
                    
                    data.forEach(row => {
                        console.log(row.ID_Position_Atasan)
                        orgchart.Push(new Cube(row.ID_Position, row.ID_Pos_Chief, {
                            n: "1",
                            c: 'black',
                            b: '#FFFFFF',
                            i: {
                                src: '<?php echo base_url()?>assets/img/id_card/Endro-Hartanto-2.jpeg',
                                text: ['Endro Hartanto', 'Direktur Utama']
                            },
                            m: Headcount+' Directs' 

                        }));
                    });

                    Utility.ImageDimen = {
                        width: 35,
                        height: 40
                    };

                    orgchart.Push(new Cube(30166663, 0, {
                        n: "1",
                        c: 'black',
                        b: '#FFFFFF',
                        i: {
                            src: '<?php echo base_url()?>assets/img/id_card/Endro-Hartanto-2.jpeg',
                            text: ['Endro Hartanto', 'Direktur Utama']
                        },
                        m: Headcount+' Directs' 

                    }));
                    orgchart.Draw();
                }
            });
            
            orgchart.NodeClick = function (id) {
                Swal.fire({
                    title: 'Organization Detail',
                    html: 'Clicked: '+id,
                    width : 500,
                    showCloseButton: true,
                })
            };
            orgchart.NodeSearch = function (id) {
                // alert('search:' + id);
                org(id)
            };
        }

        function addOrg(id){
            org(id)
        }

    </script>
        <div class="card-body">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                </div>
                <div class="card-body">
                    <div style="overflow: scroll;">
                        <select id="department" class="form-control w-25">
                            <option value="HCBP">HCBP</option>
                        </select>
                        <canvas id="chart" />
                          
                        
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
        var id = '<?= $id ?>'
        var rows = JSON.parse('<?= $rows ?>')
        org(0)
        
    </script>