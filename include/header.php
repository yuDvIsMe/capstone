<header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
            <div class="main-nav secondary-nav hover-primary-nav py-2" style="float: right;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light p-0"> <a class="navbar-brand position-relative" href="index.php">
                                <h4 class="ihome" style="margin-bottom: -4px; margin-left: -820px; font-size: 2.5rem;">iHome</h4></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown"> <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Trang chủ</a></li>
										<li class="nav-item"> <a class="nav-link" href="about.php">Giới thiệu</a> </li>
										<li class="nav-item"> <a class="nav-link" href="property.php">Căn hộ</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="contact.php">Liên hệ</a> </li>
										<?php  if(isset($_SESSION['uemail']))
										{ ?>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
											<ul class="dropdown-menu">
												<li class="nav-item"> <a class="nav-link" href="profile.php">Thông tin</a> </li>
												<li class="nav-item"> <a class="nav-link" href="feature.php">Căn hộ của tôi</a> </li>
												<li class="nav-item"> <a class="nav-link" href="changepass.php">Đổi mật khẩu</a> </li>
												<li class="nav-item"> <a class="nav-link" href="logout.php">Đăng xuất</a> </li>	
											</ul>
                                        </li>
										<?php } else { ?>
										<li class="nav-item"> <a class="nav-link" href="login.php">Đăng nhập</a> </li>
										<?php } ?>
                                    </ul>
									<a class="btn btn-primary d-none d-xl-block" href="submitproperty.php">Đăng tin</a> 
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</header>