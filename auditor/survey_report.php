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
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add New</li>
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

        <?php
        $answers = $conn->query("SELECT distinct(survey_id) from answers where user_id");
        ?>
        <div class="col-lg-12">
          <div class="d-flex w-100 justify-content-center align-items-center mb-2">
            <label for="" class="control-label">Find Survey</label>
            <div class="input-group input-group-sm col-sm-5">
              <input type="text" class="form-control" id="filter" placeholder="Enter keyword...">
              <span class="input-group-append">
                <button type="button" class="btn btn-primary btn-flat" id="search">Searh</button>
              </span>
            </div>
          </div>
          <div class=" w-100" id='ns' style="display: none">
            <center><b>No Result.</b></center>
          </div>
          <div class="row">


            <?php

            $connection = mysqli_connect("localhost", "root", "", "glowglam");
            $query = "SELECT * FROM survey_set";
            $query_run = mysqli_query($connection, $query);
            ?>







            <div class="col-md-3 py-1 px-1 survey-item">
              <div class="card card-outline card-primary">
                <div class="card-header">
                  <h3 class="card-title"></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: block;">

                  <div class="row">
                    <hr class="border-primary">
                    <div class="d-flex justify-content-center w-100 text-center">
                      <a href="index.php?page=view_survey_report&id=<?php echo $row['id'] ?>" class="btn btn-sm bg-gradient-primary"><i class="fa fa-poll"></i> View Report</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <script>
          function find_survey() {
            start_load()
            var filter = $('#filter').val()
            filter = filter.toLowerCase()
            console.log(filter)
            $('.survey-item').each(function() {
              var txt = $(this).text()
              if ((txt.toLowerCase()).includes(filter) == true) {
                $(this).toggle(true)
              } else {
                $(this).toggle(false)
              }
              if ($('.survey-item:visible').length <= 0) {
                $('#ns').show()
              } else {
                $('#ns').hide()
              }
            })
            end_load()
          }
          $('#search').click(function() {
            find_survey()
          })
          $('#filter').keypress(function(e) {
            if (e.which == 13) {
              find_survey()
              return false;
            }
          })
        </script>