<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/' . $admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'] . ' ' . $admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="../live-chat/index.php"><i class="fa fa-comment"></i> <span>Chat</span></a></li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Survey</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="new_survey.php"><i class="fa fa-circle-o"></i> Add New</a></li>
          <li><a href="survey_list.php"><i class="fa fa-circle-o"></i> List</a></li>
        </ul>
      <li><a href="survey_report.php"><i class="fa fa-comment"></i> <span>Survey Report</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>