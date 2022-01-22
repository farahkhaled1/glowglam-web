<?php
session_start();
include('includes/header.php');

?>

<div class="container-fluid">

    <!--DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EDIT HR Profile </h6>
        </div>
        <div class="card-body">

            <?php
            $connection = mysqli_connect("localhost", "root", "", "glowglam");

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['hredit_id'];

                $query = "SELECT * FROM penalty WHERE hr_id='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">


                        <div class="form-group">
                            <label> HR_ID </label>
                            <input type="text" name="hredit_id" value="<?php echo $row['hr_id'] ?>" class="form-control" placeholder="Enter HR ID">
                        </div>
                        <div class="form-group">
                            <label> Admin_ID </label>
                            <input type="text" name="adminedit_id" value="<?php echo $row['admin_id'] ?>" class="form-control" placeholder="Enter Admin ID">
                        </div>
                        <div class="form-group">
                            <label>HR_Email</label>
                            <input type="email" name="hredit_email" value="<?php echo $row['hr_email'] ?>" class="form-control" placeholder="Enter HR Email">
                        </div>
                        <div class="form-group">
                            <label>Admin_Email</label>
                            <input type="text" name="adminedit_email" value="<?php echo $row['admin_email'] ?>" class="form-control " placeholder="Enter Admin Email">
                        </div>
                        <div class="form-group">
                            <label>Warning</label>
                            <input type="text" name="edit_warning" value="<?php echo $row['warning'] ?>" class="form-control" placeholder="Enter warning">
                        </div>

                        <a href="hr.php" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="updatehrbtn" class="btn btn-primary"> Update </button>
                    </form>
            <?php
                }
            }
            ?>

        </div>

    </div>
</div>
</div>



<?php
include "includes/scripts.php";
?>