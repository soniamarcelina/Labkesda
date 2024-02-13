<div class="col-lg-12">

    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?php echo $title?></h6>
            
        </div>
        
        <div class="card-body">
    <table class="table table-add">
        <form method="post" action="<?php echo base_url()."Grade/update/$id"; ?>">
            <tr>
                <td>ID Grade</td>
                <td><input class="form-control" type="id" name="id" placeholder="id" value="<?php echo $id ?>" readonly></td>
            </tr>
            <tr>
                <td>Nomenklatur</td>
                
                <td><input class="form-control" type="text" name="nomenklatur"  value="<?php echo $data_grade->nomenklatur?>"></td>
            </tr>
            <tr>
                <td>Kompetensi</td>
                
                <td><input class="form-control" type="text" name="kompetensi" value="<?php echo $data_grade->kompetensi?>"></td>
            </tr>
            <tr>
                <td>Work Experience</td>
                
                <td><input class="form-control" type="number" name="WorkExp"  value="<?php echo $data_grade->WorkExp?>"></td>
            </tr>
            <tr>
                <td>Minimal Salary</td>
                
                <td><input class="form-control" type="number" name="MinSalary"  value="<?php echo $data_grade->MinSalary?>"></td>
            </tr>
            <tr>
                <td>Midle Salary</td>
                
                <td><input class="form-control" type="text" name="MidSalary" value="<?php echo $data_grade->MidSalary?>"></td>
            </tr>
            <tr>
                <td>Maximal Salary</td>
                
                <td><input class="form-control" type="number" name="MaxSalary" value="<?php echo $data_grade->MaxSalary?>"></td>
            </tr>
            <tr>
                <td>Minimal Education</td>
                
                <td><select class="form-control form-control-bot-border" name="MinEdu" value="<?php echo $data_grade->MinEdu?>">
                    <option value="SLTA">SLTA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </tr>
             
            <tr>
                 <td colspan="2" style="text-align: center;"><input class="btn btn-warning" type="submit" name="Simpan" value="Submit"></td>
            </tr>
        </form>
    </table>
</div>
</div>
</div>
   