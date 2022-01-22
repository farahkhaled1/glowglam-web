<?php include 'includes/header.php'; ?>



<div class="container-fluid">

    <!--DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">HR Profile
                <a href="hr-add.php" class="btn btn-primary float-right">Add Warning</a>

            </h6>
        </div>

        <div class="card-body">

            <?php
            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2 class="bg-primary text-white">' . $_SESSION['success'] . ' </h2>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . ' </h2>';
                unset($_SESSION['status']);
            }

            ?>



            <div class="table-responsive">
                <?php
                $connection = mysqli_connect("localhost", "root", "", "glowglam");
                $query = "SELECT * FROM penalty";
                $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>HR_ID</th>
                            <th>Admin_ID</th>
                            <th>HR_Email</th>
                            <th>Admin_Email</th>
                            <th>Warning</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['hr_id']; ?> </td>
                                    <td><?php echo $row['admin_id']; ?> </td>
                                    <td><?php echo $row['hr_email']; ?> </td>
                                    <td><?php echo $row['admin_email']; ?> </td>
                                    <td><?php echo $row['warning']; ?> </td>
                                    <td>
                                        <form action="hr_edit.php" method="post">
                                            <input type="hidden" name="hredit_id" value="<?php echo $row['hr_id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> EDIT </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name=hrdelete_id value="<?php echo $row['hr_id']; ?>">
                                            <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE </button>
                                    </td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "no record found";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>


</div>

<!--/.container-fluid-->

<?php
include "includes/scripts.php";
?>