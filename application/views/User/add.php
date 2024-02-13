<div class="col-lg-12">

    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?php echo $title?></h6>
            
        </div>
        
        <div class="card-body">
            <form method="post" action="<?php echo base_url()."user/insert"; ?>">
              <table class="table table-add">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input class="form-control" required type="text" name="username" placeholder="Masukkan Username"></td>
                </tr><br>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input class="form-control" type="password" name="password" placeholder="Password"></td>
                </tr><br>
                <tr>
                    <td>ID Position</td>
                    <td>:</td>
                    <td>
                        <input class="form-control" type="text" list="positions" name="idPos">
                        <datalist id="positions">
                          <?php foreach ($positions as $pos): ?>
                              <option value="<?= $pos->ID_Position; ?>"><?= $pos->Position; ?></p>
                          <?php endforeach; ?>
                        </datalist>
                    </td>
                </tr><br>
                 <tr>
                    <td>Level</td>
                    <td>:</td>
                    <td><select class="form-control" name="level">
                            <option value="admin">Admin</option>
                            <option value="officer">Officer</option>
                            <option value="user">User</option>
                        </select>
                    </td>
                </tr><br>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input class="btn btn-success" type="submit" name="simpan" value="submit"></td>
                </tr>
                 </table>
            </form>
        </div>
    </div>
</div>
   