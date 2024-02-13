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
                url: "<?php echo base_url()?>TAD/orgChange/getGL/2",
                type: "post",
                dataType: "json",
                data : data,
                success: function(data) {
                    data.forEach(row => {
                        Headcount = Headcount+row.Headcount;
                        var leaf = false
                        if (row.Headcount == 0) {
                            leaf = true
                        }else{
                            row.Headcount = (parseInt(row.Headcount)-1)
                        }
                        orgchart.Push(new Cube(row.ID_Position, row.ID_Pos_Chief, {
                            n: "1",
                            c: row.color,
                            b: '#FFFFFF',
                            i: {
                                src: '<?php echo base_url()?>assets/img/id_card/'+row.photo,
                                text: [row.Name, row.Position]
                            },
                            m: row.Headcount+' Directs',
                            l: leaf
                        }));
                        if (row.Child.length > 0) {

                            row.Child.forEach(r => {
                                orgchart.Push(new Cube(r.ID_Position, r.ID_Position_Atasan, {
                                    n: "1",
                                    c: r.color,
                                    b: '#FFFFFF',
                                    i: {
                                        src: '<?php echo base_url()?>assets/img/id_card/'+row.photo,
                                        text: [r.Name, r.Position]
                                    },
                                    m: r.Headcount+' Directs',
                                    l: leaf
                                }));
                            });   
                        }

                        
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
                            src: '<?php echo base_url()?>assets/img/id_card/',
                            text: ['Rudi Anandia', 'Direktur Utama']
                        },
                        m: Headcount+' Formation \n' 

                    }));
                    orgchart.Push(new Cube(114000056, 30284770, {
                            n: "1",
                            c: "black",
                            b: '#FFFDDD',
                            i: {
                                src: '<?php echo base_url()?>assets/img/id_card/',
                                text: ["Galang Garuda Merdeka", "Associate XXX"]
                            },
                            m: '0 Directs',
                            l: false
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