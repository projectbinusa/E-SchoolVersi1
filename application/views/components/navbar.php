<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background-color: #10222E">
        <div class="navbar-header" style="background-color: #10222E">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ri-close-line fs-6 ri-menu-2-line"></i>
            </a>
            <a class="navbar-brand" href="<?php echo base_url()?>" style="background-color: #10222E">
                <b class="logo-icon">
                    <img src="<?php echo base_url('uploads/logo/logo-sekolah.png');?>" width="40px" />
                    <!-- <img src="../package/assets/images/logo-pos.png" alt="homepage" class="light-logo" /> -->
                </b>
                <b class="logo-icon logo-text">
                    <img src="<?php echo base_url('uploads/logo/text-eruwatan.png');?>" width="170px" style="" />
                    <!-- <img src="../package/assets/images/logo-pos.png" alt="homepage" class="light-logo" /> -->
                </b>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ri-more-line fs-6"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background-color: #10222E">
            <ul class="navbar-nav me-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"><i data-feather="menu" class="feather-sm"></i></a>
                </li>
        </div>
        <div class="text-light me-5"><?= $this->session->userdata('username') ?></div>
    </nav>
</header>