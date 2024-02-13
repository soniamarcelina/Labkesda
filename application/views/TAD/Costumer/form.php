<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemeriksaan Sampel Kesehatan Masyarakat</h1>
    </div>
<div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Pemeriksaan</h6>
                    </div>

                    <div class="card-body">
                    <form method="post" action="<?php echo base_url().'TAD/Costumer/insert'; ?>">
                          <div class="container px-0">
                            <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab1">1. Form</a>
                              </li>
                             
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab2" id="link-tab2">2. Review</a>
                              </li>
                            </ul>

                            <div class="tab-content">
                              <div class="tab-pane fade show active" id="tab1">
                                <div class="row">
                                   <!-- Position Section -->
                                    <div class="col-md-12 col-xl-12">
                                        <div class="card my-3">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" class="form-control form-control-bot-border" name="id" hidden>
                                                <label>NIK</label>
                                                <input type="text" class="form-control form-control-bot-border" name="nik" >
                                                <label>Nama</label>
                                                <input type="text" class="form-control form-control-bot-border" name="nama" >
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control form-control-bot-border" name="tgl_lahir" >
                                                <label>Umur</label>
                                                <input type="text" class="form-control form-control-bot-border" name="umur" >
                                                <label>Alamat</label>
                                                <textarea class="form-control required" style="height: 75px" name="alamat" placeholder="Enter Address" required=""></textarea>
                                               
                                            </div>
                                        </div>
                                        <h6>Harap tandai Pemeriksaan yang diinginkan</h6>
                                    </div> 
                                    <div class="col-md-12 col-xl-6">
                                        <div class="card my-3">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Hematologi</h6>
                                            </div>
                                            <div class="row justify-content-md-right text-sm-left" style="margin: 10px;">
                                              <div class="col-md-12">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hematologi[]" value="HB" checked>
                                                <label class="form-check-label">HB</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox"  name="hematologi[]" value="Angka Entronsit" checked>
                                                <label class="form-check-label">Angka Entronsit</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hematologi[]" value="Angka Lekosit" checked>
                                                <label class="form-check-label">Angka Lekosit</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hematologi[]" value="Angka Trombosit" checked>
                                                <label class="form-check-label">Angka Trombosit</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hematologi[]" value="Hematrokit" checked>
                                                <label class="form-check-label">Hematrokit</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hematologi[]" value="Golongan Darah" checked>
                                                <label class="form-check-label">Golongan Darah</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <input type="text" class="form-control form-control-bot-border" name="hematologi[]">
                                                </div>
                                               </div>
                                        </div>
                                       </div>
                                    </div>
                                
                                    <div class="col-md-12 col-xl-6">
                                        <div class="card my-3">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Urinalisa</h6>
                                            </div>
                                            <div class="row justify-content-md-right text-sm-left" style="margin: 10px;">
                                              <div class="col-md-12">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="urinalisa[]" value="Makroskopis" checked>
                                                <label class="form-check-label">Makroskopis</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox"  name="urinalisa[]" value="Protein" checked>
                                                <label class="form-check-label">Protein</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="urinalisa[]" value="PH" checked>
                                                <label class="form-check-label">PH</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="urinalisa[]" value="Reduksi" checked>
                                                <label class="form-check-label">Reduksi</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="urinalisa[]" value="Urine Lengkap" checked>
                                                <label class="form-check-label">Urine Lengkap</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="urinalisa[]" value="Tes Kehamilan" checked>
                                                <label class="form-check-label">Tes Kehamilan</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="" checked>
                                                <input type="text" class="form-control form-control-bot-border" name="Urinalisa[]">
                                                </div>
                                               </div>
                                        </div>
                                       </div>
                                    </div>
                                

                                 <div class="col-md-12 col-xl-6">
                                        <div class="card my-3">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">SPUTUM</h6>
                                            </div>
                                            <div class="row justify-content-md-right text-sm-left" style="margin: 10px;">
                                              <div class="col-md-12">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sputum[]" value="Pemeriksaan TB" checked>
                                                <label class="form-check-label">Pemeriksaan TB</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked7" checked>
                                                <input type="text" class="form-control form-control-bot-border" name="">
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked7" checked>
                                                <input type="text" class="form-control form-control-bot-border" name="">
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked7" checked>
                                                <input type="text" class="form-control form-control-bot-border" name="">
                                                </div>
                                               </div>
                                        </div>
                                       </div>
                                    </div>
                                
                                <div class="col-md-12 col-xl-6">
                                    <div class="card my-3">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Kimia Darah</h6>
                                            </div>
                                            <div class="row justify-content-md-right text-sm-left" style="margin: 10px;">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="kimia[]" value="Gula Darah Puasa" checked>
                                                <label class="form-check-label">Gula Darah Puasa</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox"  name="kimia[]" value="Gula Darah 2 JPP" checked>
                                                <label class="form-check-label">Gula Darah 2 JPP</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="kimia[]" value="Gula Darah Acak" checked>
                                                <label class="form-check-label">Gula Darah Acak</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="kimia[]" value="Kolesterol Tetap" checked>
                                                <label class="form-check-label">Kolesterol Tetap</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="kimia[]" value="Asam Urat" checked>
                                                <label class="form-check-label">Asam Urat</label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="kimia[]" value="Trigliselida" checked>
                                                <label class="form-check-label">Trigliselida</label>
                                                </div>
                                               </div>
                                            </div>
                                        
                                        </div>
                                        <input class="btn btn-success" type="submit" name="simpan" value="Submit">
                                    </div>
                                </div>
                              </div>
                              
                              
                        <!--Review Section -->
                              <div class="tab-pane fade" id="tab2">
                              <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="card my-3">
                                            <div class="card-body row mt-4" id="review">
                                                <div class="col-md-12 col-xl-12 text-center mb-4">
                                                    <h5>Form Pemeriksaan Sampel</h5>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-xl-12">
                                                    <label class="float-right">Date : <?= date('d F Y') ?></label>
                                                </div>
                                                <div class="col-md-12 col-xl-12 mt-4 mb-2">
                                                    <h6>Data Pribadi</h6>
                                                    <hr>
                                                </div>
                                                <!-- Row 2 -->
                                                <div class="col-md-6 col-xl-6 row">
                                                    <div class="col-md-5 col-xl-4">NIK</div>
                                                    <div class="col-md-1 col-xl-1">:</div>
                                                    <div class="col-md-6 col-xl-7" id="rvNO"></div>
                                                </div>
                                                <div class="col-md-6 col-xl-6 row"></div>
                                                <!-- Row 3 -->
                                                <div class="col-md-6 col-xl-6 row">
                                                    <div class="col-md-5 col-xl-4">Personnel Name</div>
                                                    <div class="col-md-1 col-xl-1">:</div>
                                                    <div class="col-md-6 col-xl-7" id="rvName"></div>
                                                </div>
                                                <div class="col-md-6 col-xl-6 row"></div>
                                                <!-- Row 1 -->
                                                <div class="col-md-6 col-xl-6 row">
                                                    <div class="col-md-5 col-xl-4">Tanggal Lahir</div>
                                                    <div class="col-md-1 col-xl-1">:</div>
                                                    <div class="col-md-6 col-xl-7" id="rvTitle"></div>
                                                </div>
                                                <div class="col-md-6 col-xl-6 row"></div>
                                                <!-- Row 1 -->
                                                <div class="col-md-6 col-xl-6 row">
                                                    <div class="col-md-5 col-xl-4">Umur</div>
                                                    <div class="col-md-1 col-xl-1">:</div>
                                                    <div class="col-md-6 col-xl-7" id="rvDiv"></div>
                                                </div>
                                                <!-- Row 1 -->
                                                 <!-- Row 1 -->
                                                 <div class="col-md-6 col-xl-6 row">
                                                    <div class="col-md-5 col-xl-4">Alamat</div>
                                                    <div class="col-md-1 col-xl-1">:</div>
                                                    <div class="col-md-6 col-xl-7" id="rvDiv"></div>
                                                </div>
                                                <div class="col-md-6 col-xl-6 row"></div>
                                            
                                                <!-- Separator -->
                                                <div class="col-md-12 col-xl-12 mt-4 mb-2">
                                                    <h6>Jenis Pemeriksaan</h6>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-xl-12 mt-4 mb-2">
                                                    <h6>Hematologi</h6>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-xl-12 row">
                                                    <div class="col-md-12 col-xl-12">
                                                        <table class="table table-sm table-bordered" id="checklist-table-body">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w-25">No</th>
                                                                    <th>Hematology</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="checklist-table-body">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-12 mt-4 mb-2">
                                                    <h6>Kimia Darah</h6>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-xl-12 row">
                                                    <div class="col-md-12 col-xl-12">
                                                        <table class="table table-sm table-bordered" id="checklist-table-body">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w-25">No</th>
                                                                    <th>Kimia Darah</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="checklist-table-body">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-12 mt-4 mb-2">
                                                    <h6>Urinalisa</h6>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-xl-12 row">
                                                    <div class="col-md-12 col-xl-12">
                                                        <table class="table table-sm table-bordered" id="checklist-table-body">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w-25">No</th>
                                                                    <th>Urinalisa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="checklist-table-body">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xl-12 mt-4 mb-2">
                                                    <h6>Sputum</h6>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12 col-xl-12 row">
                                                    <div class="col-md-12 col-xl-12">
                                                        <table class="table table-sm table-bordered" id="checklist-table-body">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w-25">No</th>
                                                                    <th>Sputum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="checklist-table-body">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- Row 1 -->
                                                <div class="col-xl-6"></div>
                                                <br>

                                            </div>
                                        </div>
                                                <div class="col-xl-12 text-center">
                                                    <a href="#" id="printBtn" class="btn btn-primary"> PRINT </a>
                                                </div>
                                </div> 
                              </div>
                            </div>
                          </div>

                        </form>
                    </div>
                </div>
        </div>
<script type="text/javascript">

    $(".submitBtn").click(function() {
        if (checkInputs()) {
            var data = {
                'id' : $('[name="id"]').val(),
                'nama' : $('[name="nama"]').val(),
                'nik' : $('[name="nik"]').val(),
                'tgl_lahir' : $('[name="tgl_lahir"]').val(),
                'umur' : $('[name="umur"]').val(),
                'alamat' : $('[name="alamat"]').val(),
                'checklist' : $('[name="item[]"]:checked').map(function() {
                    return $(this).val();
                }).get(),
        };
            var checklistTableBody = $("#checklist-table-body");
            checklistTableBody.empty(); 

            data.checklist.forEach(function(item, index) {
                var row = $("<tr>");
                row.append($("<td>").text(index + 1));
                row.append($("<td>").text(item));
                checklistTableBody.append(row);
            });
        
        $.ajax({
                url: "<?php echo base_url()?>TAD/Costumer/submit",
                type: "POST",
                dataType: "json",
                data: data,
                success: function(data) {
                    n = JSON.stringify(data)
                    o = JSON.parse(n)
                    if (o.status == 2) {
                        Swal.fire({
                          title: 'Update Status',
                          html: o.msg,
                          showCloseButton: true,
                        });
                    }else{
                        Swal.fire({
                          title: 'Update Status',
                          html: o.msg,
                          showCloseButton: true,
                        });
                        window.location.href = '<?php echo base_url()?>TAD/Costumer/create'; 
                    }
                    
                }
            });
        }else{
           Swal.fire({
             title: 'Submit Error',
             html: 'Some Data Requireed Before Submit OCF',
             showCloseButton: true,
           }); 
        }
    });

    //Check Review
    $("#link-tab2").click(function() {
        if (checkInputs()) {
            //console.log('test')
            var data = {
                'id' : $('[name="id"]').val(),
                'nama' : $('[name="nama"]').val(),
                'nik' : $('[name="nik"]').val(),
                'tgl_lahir' : $('[name="tgl_lahir"]').val(),
                'umur' : $('[name="umur"]').val(),
                'alamat' : $('[name="alamat"]').val(),
                'checklist' : $('[name="hematologi[]"]:checked').map(function() {
                    return $(this).val();
                }).get(),
                'checklist' : $('[name="kimia[]"]:checked').map(function() {
                    return $(this).val();
                }).get(),
                'checklist' : $('[name="sputum[]"]:checked').map(function() {
                    return $(this).val();
                }).get(),
                'checklist' : $('[name="urinalisa[]"]:checked').map(function() {
                    return $(this).val();
                }).get(),
            };
            
            var checklistTableBody = $("#checklist-table-body");
            checklistTableBody.empty(); 

            data.checklist.forEach(function(item, index) {
                var row = $("<tr>");
                row.append($("<td>").text(index + 1));
                row.append($("<td>").text(item));
                checklistTableBody.append(row);
            });

            $('#rvNO').text($('[name="MRF_No"]').val())
            $('#rvName').text($('[name="persName"]').val())
            $('#rvTitle').text($('[name="posTitle"]').val())

            $('#rvDiv').text($('[name="posDiv"]').val())
            $('#rvDept').text($('[name="posDept"]').val())
            $('#rvType').text($('[name="type"]').val())
            $('#rvStart').text($('[name="mrfstart"]').val())
            $('#rvEnd').text($('[name="mrfend"]').val())

            $('#rvAOno').text($('[name="ao_code"]').val())
            $('#rvCrName').text($('[name="ctrName"]').val())
            $('#rvAstart').text($('[name="ctrStart"]').val())
            $('#rvAend').text($('[name="ctrEnd"]').val())
            $('#termType').text($('[name="termtype"]').val())
            $('#termReason').text($('[name="termReason"]').val())
            $('#termDate').text($('[name="termDate"]').val())
            $('#checkID').text($('[name="item[]"]').val())
            
            function differenceInMonths(date1, date,) {
              const monthDiff = date1.getMonth() - date2.getMonth();
              const yearDiff = date1.getYear() - date2.getYear();

              return monthDiff + yearDiff * 12;
            }

            // June 5, 2022
            const date1 = new Date($('[name="ctrEnd"]').val());

            // March 17, 2021
            const date2 = new Date($('[name="ctrStart"]').val());

            const difference = differenceInMonths(date1, date2);

           $('#rvADur').text(difference+ ' Months');

        }else{
            
            alert('Some Required Fields are not filled!');
        }
    });

</script>

<script>
     function generatePDF() {
        // Membuat objek jsPDF
        var doc = new jsPDF();

        // Mengambil elemen dengan ID "review" (elemen yang ingin di-export)
        var element = document.getElementById("export");

        // Menggunakan html2canvas untuk menggambar elemen ke PDF
        html2canvas(element, {
            onclone: function (clonedDoc) {
                // Hilangkan elemen tombol "Print" dari PDF
                clonedDoc.getElementById("printBtn").style.display = "none";
                clonedDoc.getElementById("submitBtn").style.display = "none";
            }
        }).then(function (canvas) {
             // Mengatur gaya font, ukuran font, warna teks, dan membuat teks menjadi bold
            doc.setFont("helvetica"); // Ganti dengan jenis font yang Anda inginkan
            doc.setFontSize(12); // Ganti dengan ukuran font yang Anda inginkan
            doc.setTextColor(255, 0, 0); // Warna teks dalam format RGB (merah)

            // Membuat teks menjadi bold
            doc.setFontStyle("bold");
            // Menambahkan gambar dari canvas ke dokumen PDF
            doc.addImage(canvas, "PNG", 8, 8, 200, 0);

            // Simpan atau tampilkan dokumen PDF
            doc.save("Pemeriksaan.pdf");
        });
    }
    document.querySelector('#printBtn').addEventListener('click', function() {
        generatePDF();
    });


</script>