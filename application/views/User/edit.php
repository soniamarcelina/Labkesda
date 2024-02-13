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
        <form method="post" action="<?php echo base_url()."user/edit_pw/$id"; ?>">
            
            <tr>
                <td>User ID</td>
                <td><input class="form-control" type="id" name="id" placeholder="id" value="<?php echo $id ?>" readonly></td>
            </tr>
            <tr>
                <td>Username</td>
                
                <td><input class="form-control" type="text" name="username" placeholder="Old Password" value="<?php echo $data_user->username?>"></td>
            </tr>
            <tr>
                <td>Full Name</td>
                
                <td><input class="form-control" type="text" name="nama" placeholder="Old Password" value="<?php echo $data_user->nama?>"></td>
            </tr>
            <tr>
                <td>Old Password</td>
                
                <td><input class="form-control" type="password" name="old_pw" placeholder="Old Password" value="" <?php if ($this->session->userdata('level') == 'admin'){echo 'disabled';}?>></td>
            </tr>
            <tr>
                <td>New Password</td>
                
                <td><input class="form-control" type="password" name="new_pw" placeholder="New Password" value=""></textarea></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                
                <td><input class="form-control" type="password" name="con_pw" placeholder="Confirm Password" value=""></textarea></td>
            </tr>
             <tr>
                <td>Level</td>
                
                <td><select name="level" class="form-control">
                        <option value="admin" <?php if ($data_user->level == 'admin'){ echo 'selected';}?>>Admin</option>
                        <option value="officer" <?php if ($data_user->level == 'officer'){ echo 'selected';}?>>Officer</option>
                        <option value="client" <?php if ($data_user->level == 'client'){ echo 'selected';}?>>Client</option>
                    </select>

                </td>
            </tr><br>
            <tr>
                
                <td colspan="2" style="text-align: center;"><input class="btn btn-warning" type="submit" name="simpan" value="Submit"></td>
            </tr>
        </form>
    </table>
</div>
</div>
</div>
   