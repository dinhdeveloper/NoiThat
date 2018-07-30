<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="modules/logo/<?php echo $_SESSION["SHinh"] ?>" alt="Quản trị viên"
                                 class="circle responsive-img valign profile-image cyan"
                                 style="height: 50px;width: 50px">
                        </div>
                        <div class="col col s8 m8 l8">
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn"
                               href="index.php?c=2&k=3"
                               data-activates="profile-dropdown-nav"><?php echo $_SESSION['SHoTen']; ?><i
                                        class="mdi-navigation-arrow-drop-down right"></i></a>
                            <a href="index.php?c=2&k=3">
                                <p class="user-roal">Trang cá nhân</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="li-hover">
                    <p class="ultra-small margin more-text">Quản lý cửa hàng</p>
                </li>
                <li class="no-padding">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li class="bold">
                            <a class="collapsible-header waves-effect waves-cyan">
                                <i class="material-icons">dashboard</i>
                                <span class="nav-text">Quản lý tài khoản</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="index.php?c=2&k=3">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span>Trang Cá Nhân</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?c=2&k=4">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span>Cập nhật tài khoản</span>
                                        </a>
                                    </li>
                                    <?php
//                                    $row1 = Database::ExecuteQuery($sql);
//                                    $result = mysqli_fetch_row($sql1);
                                    if ($_SESSION['SQuyenAdmin'] == 1) {
                                        ?>
                                        <li>
                                            <a href="index.php?c=2">
                                                <i class="material-icons">keyboard_arrow_right</i>
                                                <span>Danh sách nhân viên</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <li class="bold">
                            <a class="collapsible-header waves-effect waves-cyan">
                                <i class="material-icons">dvr</i>
                                <span class="nav-text">Quản lý loại sản phẩm</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="index.php?c=3">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span> Danh sách loại sản phẩm</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?c=3&k=2">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span> Tạo loại sản phẩm mới</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>  <!-- danh mục-->
                        <li class="bold">
                            <a class="collapsible-header waves-effect waves-cyan">
                                <i class="material-icons">web</i>
                                <span class="nav-text">Quản lý sản phẩm</span>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="index.php?c=4">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span>Danh sách tất cả sản phẩm</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?c=4&k=2">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span> Tạo sản phẩm</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold">
                            <a class="collapsible-header  waves-effect waves-cyan">
                                <i class="material-icons">photo_filter</i>
                                <span class="nav-text">Quản lý đơn đặt hàng</span>
                            </a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li>
                                        <a href="index.php?c=5&k=1">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span>Danh sách đơn đặt hàng</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="li-hover">
                            <p class="ultra-small margin more-text">MORE</p>
                        </li>
                        <li class="bold">
                            <a class="collapsible-header  waves-effect waves-cyan">
                                <i class="material-icons">today</i>
                                <span class="nav-text">Báo cáo doanh thu</span>
                            </a>
                            <div class="collapsible-body">
                                <ul class="collapsible" data-collapsible="accordion">
                                    <li>
                                        <a href="index.php">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span> Doanh thu theo tháng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span> Doanh thu theo qúy </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">keyboard_arrow_right</i>
                                            <span> Doanh thu theo năm</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <a href="#" data-activates="slide-out"
                       class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
                        <i class="material-icons">menu</i>
                    </a>
                </li>

        </aside>
        <!-- END WRAPPER -->