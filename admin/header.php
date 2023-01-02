<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>  
  <div class="header">
			
				<!-- Logo -->
                <div class="header-left" style="margin-top: -6px;">
                    <a href="dashboard.php" class="logo">
						<img src="assets/img/logo.png" alt="Logo">
					</a>
					<a href="dashboard.php" class="logo logo-small">
						<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				

				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">
					<!-- User Menu -->
					<li class="nav-item dropdown app-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.png" width="31" alt=""></span>
						</a>
						
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="assets/img/profiles/avatar-01.png" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $_SESSION['auser'];?></h6>
									<p class="text-muted mb-0">Quản trị viên</p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.php">Trang cá nhân</a>
							<a class="dropdown-item" href="logout.php">Đăng xuất</a>
						</div>
					</li>

					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			
			<!-- header --->
			
			
			
						<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Quản trị</span>
							</li>
							<li> 
								<a href="dashboard.php"><i class="fe fe-bar-chart"></i> <span>Dashboard</span></a>
							</li>
							<li class="menu-title"> 
								<span>Tài khoản</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Quản lý tài khoản </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="adminlist.php"> Admin </a></li>
									<li><a href="userlist.php"> Người dùng </a></li>
								</ul>
							</li>
						
							<li class="menu-title"> 
								<span>Căn hộ</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-home"></i> <span> Quản lý căn hộ</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="propertyadd.php"> Thêm căn hộ </a></li>
									<li><a href="propertyview.php"> Quản lý </a></li>
									
								</ul>
							</li>
							<li class="menu-title"> 
								<span>Người dùng</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-phone"></i> <span> Liên hệ </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="contactview.php"> Liên hệ </a></li>
									<li><a href="messageview.php"> Tin nhắn </a></li>
									<li><a href="feedbackview.php"> Feedback </a></li>
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
