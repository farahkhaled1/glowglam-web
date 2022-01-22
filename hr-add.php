<?php
include('includes/header.php');
?>

<!--content wrapper contains page content -->
<div class="content-wrapper">

    <section class="content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Add Warning
                                <a href="hr.php" class="btn btn-danger float-right">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label> HR_ID </label>
                                    <input type="text" name="hrid" class="form-control" placeholder="Enter HR ID">
                                </div>
                                <div class="form-group">
                                    <label> Admin_ID </label>
                                    <input type="text" name="adminid" class="form-control" placeholder="Enter Admin ID">
                                </div>
                                <div class="form-group">
                                    <label>HR_Email</label>
                                    <input type="email" name="hremail" class="form-control" placeholder="Enter HR Email">
                                </div>
                                <div class="form-group">
                                    <label>Admin_Email</label>
                                    <input type="text" name="adminemail" class="form-control checking_email" placeholder="Enter Admin Email">
                                </div>
                                <div class="form-group">
                                    <label>Warning</label>
                                    <input type="text" name="warning" class="form-control" placeholder="Enter warning">
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="addwarning" class="btn btn-primary">Save</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
</div>
</section>
</div>






<?php
include "includes/scripts.php";
?>