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

				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<form action="" id="manage_survey">
								<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
								<div class="row">
									<div class="col-md-6 border-right">
										<div class="form-group">
											<label for="" class="control-label">Title</label>
											<input type="text" name="title" class="form-control form-control-sm" required value="<?php echo isset($stitle) ? $stitle : '' ?>">
										</div>
										<div class="form-group">
											<label for="" class="control-label">Start</label>
											<input type="date" name="start_date" class="form-control form-control-sm" required value="<?php echo isset($start_date) ? $start_date : '' ?>">
										</div>
										<div class="form-group">
											<label for="" class="control-label">End</label>
											<input type="date" name="end_date" class="form-control form-control-sm" required value="<?php echo isset($end_date) ? $end_date : '' ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Description</label>
											<textarea name="description" id="" cols="30" rows="4" class="form-control" required><?php echo isset($description) ? $description : '' ?></textarea>
										</div>
									</div>
								</div>
								<hr>
								<div class="col-lg-12 text-right justify-content-center d-flex">
									<button class="btn btn-primary mr-2">Save</button>
									<button class="btn btn-secondary" type="button" onclick="location.href = 'survey_list.php'">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script>
					$('#manage_survey').submit(function(e) {
						e.preventDefault()
						$('input').removeClass("border-danger")
						start_load()
						$('#msg').html('')
						$.ajax({
							url: 'ajax.php?action=save_survey',
							data: new FormData($(this)[0]),
							cache: false,
							contentType: false,
							processData: false,
							method: 'POST',
							type: 'POST',
							success: function(resp) {
								if (resp == 1) {
									alert_toast('Data successfully saved.', "success");
									setTimeout(function() {
										location.replace('home.php?page=survey_list')
									}, 1500)
								}
							}
						})
					})
				</script>