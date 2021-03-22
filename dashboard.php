<?php 
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();?>
<?php if (isset($_SESSION['userlevel'])) : ?>
                        <?php 
                          if ($_SESSION['userlevel']=='member'){ 
                            header("location:404.html");?>
                      <?php } else{ ?>

                            <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Learn AdminLTE</title>
                            
                                <link rel="stylesheet" href="css/bootstrap.min.css">
                                <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
                                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                                <link rel="stylesheet" href="css/ionicons.min.css">
                                <link rel="stylesheet" href="css/adminlte.min.css">
                                <link rel="stylesheet" href="css/skin.min.css">
                            </head>
                            <body class="skin-blue">
                            
                            
                                <div class="wrapper">
                            
                                    <!-- Main Header -->
                                    <header class="main-header">
                                  
                                      <!-- Logo -->
                                      <a href="index.php" class="logo">
                                        <img src="img/website/logo_black.png" alt="asd" width="150" height="50">
                                      </a>
                                  
                                      <!-- Header Navbar -->
                                      <nav class="navbar navbar-static-top" role="navigation">
                                        <!-- Sidebar toggle button-->
                                        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                                          <span class="sr-only">Toggle navigation</span>
                                        </a>
                                        <!-- Navbar Right Menu -->
                                        <div class="navbar-custom-menu">
                                          <ul class="nav navbar-nav">
                                            <!-- Messages: style can be found in dropdown.less-->
                                            
                                            <!-- /.messages-menu -->
                                  
                                           
                                            <!-- Tasks Menu -->
                                            <li class="dropdown tasks-menu">
                                         
                                              <ul class="dropdown-menu">
                                                <li class="header">You have 9 tasks</li>
                                                <li>
                                                  <!-- Inner menu: contains the tasks -->
                                                  <ul class="menu">
                                                    <li><!-- Task item -->
                                                      <a href="#">
                                                        <!-- Task title and progress text -->
                                                        <h3>
                                                          Design some buttons
                                                          <small class="pull-right">20%</small>
                                                        </h3>
                                                        <!-- The progress bar -->
                                                        <div class="progress xs">
                                                          <!-- Change the css width attribute to simulate progress -->
                                                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                               aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                          </div>
                                                        </div>
                                                      </a>
                                                    </li>
                                                    <!-- end task item -->
                                                  </ul>
                                                </li>
                                                <li class="footer">
                                                  <a href="#">View all tasks</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <!-- User Account Menu -->
                                            <li class="dropdown user user-menu">
                                              <!-- Menu Toggle Button -->
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <!-- The user image in the navbar-->
                                                <img src="img/profile.jpeg" class="user-image" alt="User Image">
                                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                                <span class="hidden-xs">Alexander Pierce</span>
                                              </a>
                                              <ul class="dropdown-menu">
                                                <!-- The user image in the menu -->
                                                <li class="user-header">
                                                  <img src="img/profile.jpeg" class="img-circle" alt="User Image">
                                  
                                                  <p>
                                                    Alexander Pierce - Web Developer
                                                    <small>Member since Nov. 2012</small>
                                                  </p>
                                                </li>
                                                <!-- Menu Body -->
                                                <li class="user-body">
                                                  <div class="row">
                                                    <div class="col-xs-4 text-center">
                                                      <a href="#">Followers</a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                      <a href="#">Sales</a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                      <a href="#">Friends</a>
                                                    </div>
                                                  </div>
                                                  <!-- /.row -->
                                                </li>
                                                <!-- Menu Footer-->
                                                <li class="user-footer">
                                                  <div class="pull-left">
                                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                                  </div>
                                                  <div class="pull-right">
                                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                                  </div>
                                                </li>
                                              </ul>
                                            </li>
                                            <!-- Control Sidebar Toggle Button -->
                                            <li>
                                           
                                            </li>
                                          </ul>
                                        </div>
                                      </nav>
                                    </header>
                                    <!-- Left side column. contains the logo and sidebar -->
                                    <aside class="main-sidebar">
                                  
                                      <!-- sidebar: style can be found in sidebar.less -->
                                      <section class="sidebar">
                                  
                                        <!-- Sidebar user panel (optional) -->
                                        <div class="user-panel">
                                          <div class="pull-left image">
                                            <img src="img/profile.jpeg" class="img-circle" alt="User Image">
                                          </div>
                                          <div class="pull-left info">
                                            <p>Alexander Pierce</p>
                                            <!-- Status -->
                                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                          </div>
                                        </div>
                                  
                                        <!-- search form (Optional) -->
                                        <form action="#" method="get" class="sidebar-form">
                                          <div class="input-group">
                                            <input type="text" name="q" class="form-control" placeholder="Search...">
                                            <span class="input-group-btn">
                                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                                </button>
                                              </span>
                                          </div>
                                        </form>
                                        <!-- /.search form -->
                                  
                                        <!-- Sidebar Menu -->
                                        <ul class="sidebar-menu" data-widget="tree">
                                          <li class="header">Menu</li>
                                          <!-- Optionally, you can add icons to the links -->
                                          <li class="active"><a href="infomation.html"><i class="fa fa-link"></i> <span>Home Page</span></a></li>
                                          <li><a href="index.html"><i class="fa fa-link"></i> <span>User Login</span></a></li>
                                          <li><a href="index.html"><i class="fa fa-link"></i> <span>Product Item</span></a></li>
                                          <li><a class="button" name="asd" onclick="myFunction()"><i class="fa fa-link"></i> <span>asd</span></a></li>
                                        </ul>
                                        <!-- /.sidebar-menu -->
                                      </section>
                                      <!-- /.sidebar -->
                                    </aside>
                                  
                                    <!-- Content Wrapper. Contains page content -->
                                    <div class="content-wrapper">
                                      <!-- Content Header (Page header) -->
                                      <section class="content-header">
                                        <h1>
                                          Homepage Dashboard
                                        </h1>
                                        <ol class="breadcrumb">
                                          <li><a href="#"><i class="fa fa-dashboard"></i> Home Page</a></li>
                                          <li class="active">Here</li>
                                        </ol>
                                      </section>
                                  
                                      <!-- Main content -->
                                      <section class="content container-fluid">
                                
                                            
                            
                                      </section>
                                      <!-- /.content -->
                                    </div>
                                    <!-- /.content-wrapper -->
                                  
                                    <!-- Main Footer -->
                                    <footer class="main-footer">
                                      <!-- To the right -->
                                      <div class="pull-right hidden-xs">
                                        Anything you want
                                      </div>
                                      <!-- Default to the left -->
                                      <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
                                    </footer>
                                  
                                    <!-- Control Sidebar -->
                                    <aside class="control-sidebar control-sidebar-dark">
                                      <!-- Create the tabs -->
                                      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                                        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                                        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                                      </ul>
                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                        <!-- Home tab content -->
                                        <div class="tab-pane active" id="control-sidebar-home-tab">
                                          <h3 class="control-sidebar-heading">Recent Activity</h3>
                                          <ul class="control-sidebar-menu">
                                            <li>
                                              <a href="javascript:;">
                                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                  
                                                <div class="menu-info">
                                                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                  
                                                  <p>Will be 23 on April 24th</p>
                                                </div>
                                              </a>
                                            </li>
                                          </ul>
                                          <!-- /.control-sidebar-menu -->
                                  
                                          <h3 class="control-sidebar-heading">Tasks Progress</h3>
                                          <ul class="control-sidebar-menu">
                                            <li>
                                              <a href="javascript:;">
                                                <h4 class="control-sidebar-subheading">
                                                  Custom Template Design
                                                  <span class="pull-right-container">
                                                      <span class="label label-danger pull-right">70%</span>
                                                    </span>
                                                </h4>
                                  
                                                <div class="progress progress-xxs">
                                                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                                </div>
                                              </a>
                                            </li>
                                          </ul>
                                          <!-- /.control-sidebar-menu -->
                                  
                                        </div>
                                        <!-- /.tab-pane -->
                                        <!-- Stats tab content -->
                                        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                                        <!-- /.tab-pane -->
                                        <!-- Settings tab content -->
                                        <div class="tab-pane" id="control-sidebar-settings-tab">
                                          <form method="post">
                                            <h3 class="control-sidebar-heading">General Settings</h3>
                                  
                                            <div class="form-group">
                                              <label class="control-sidebar-subheading">
                                                Report panel usage
                                                <input type="checkbox" class="pull-right" checked>
                                              </label>
                                  
                                              <p>
                                                Some information about this general settings option
                                              </p>
                                            </div>
                                            <!-- /.form-group -->
                                          </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                      </div>
                                    </aside>
                                    <!-- /.control-sidebar -->
                                    <!-- Add the sidebar's background. This div must be placed
                                    immediately after the control sidebar -->
                                    <div class="control-sidebar-bg"></div>
                                  </div>
                                  <!-- ./wrapper -->
                                  
                                
                            
                                <script src="js/jquery.min.js"></script>
                                <script src="js/bootstrap.min.js"></script>
                                <script src="js/adminlte.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
                                <script>
                                    $('#myBox').boxWidget({
                                        animationSpeed: 500,
                                        collapseTrigger: '#boxBtn',
                                        removeTrigger: '#my-remove-button-trigger',
                                        collapseIcon: 'fa-minus',
                                        expandIcon: 'fa-plus',
                                        removeIcon: 'fa-times'
                                    })
                            
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </body>
                            </html>
                      <?php } endif ?>