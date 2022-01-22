<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Survey
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
          <li>Survey</li>
          <li class="active">List</li>
        </ol>
      </section>

      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>

        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $connection = mysqli_connect("localhost", "root", "", "glowglam");
                    $query = "SELECT * FROM survey_set";
                    $query_run = mysqli_query($connection, $query);
                    ?>



                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                      while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <tr>
                          <td><?php echo $row['id']; ?> </td>
                          <td><?php echo $row['title']; ?> </td>
                          <td><?php echo $row['description']; ?> </td>
                          <td><?php echo $row['user_id']; ?> </td>
                          <td><?php echo $row['start_date']; ?> </td>
                          <td><?php echo $row['end_date']; ?> </td>
                          <td><?php echo $row['date_created']; ?> </td>
                          <td class="text-center">

                          <td>

                            <a href='view_survey.php?user=" . $row[' id'] . "' class='btn btn-info btn-sm btn-flat'><i class='fa fa-search'></i> View</a>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='" . $row['id'] . "'><i class='fa fa-trash'></i> Delete</button>
                            </td>
							
						

                        <?php
                      }
                    } else {
                      echo "no record found";
                    }
                        ?>



<?php include 'includes/footer.php'; ?>


<?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {

      $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });


    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'survey_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.userid').val(response.id);
          $('#edit_email').val(response.email);
          $('#edit_password').val(response.password);
          $('#edit_firstname').val(response.firstname);
          $('#edit_lastname').val(response.lastname);
          $('#edit_address').val(response.address);
          $('#edit_contact').val(response.contact_info);
          $('.fullname').html(response.firstname + ' ' + response.lastname);
        }
      });
    }
  </script>