<!--header-->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper">
                <ul class="left">
                    <li>
                        <h1 class="logo-wrapper">
                            <a href="index.php" class="brand-logo darken-1">
                                <img src="modules/logo/materialize-logo-color.png" alt="materialize logo">
                                <span class="logo-text hide-on-med-and-down">FLOWER</span>
                            </a>
                        </h1>
                    </li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="material-icons">search</i>
                    <input type="text" name="Search" class="header-search-input z-depth-2"
                           placeholder="Tìm kiếm"/>
                </div>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                            <i class="material-icons">settings_overscan</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button"
                           data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="modules/logo/<?php echo $_SESSION["SHinh"]?>" alt="avatar">
                    <i></i>
                  </span>
                        </a>
                    </li>
                </ul>
                <ul id="profile-dropdown" class="dropdown-content">
                    <li>
                        <a href="index.php?c=2&k=3" class="grey-text text-darken-1">
                            <i class="material-icons">face</i> Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="../../../NoiThat/Admin/Login/dangxuat.php" class="grey-text text-darken-1">
                            <i class="material-icons">keyboard_tab</i> Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header> <!-- close header-->