<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon" style="margin-top:100px">
            <img src="<?= base_url('assets/img/Logo_BNN.png') ?>" width="70%">
        </div>
    </a>
    <br>
    <br>
    <br>
    <br>
    <!-- Divider -->
    <hr class="sidebar-divider" style="margin-top:5px">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <?php
    $roleId = $this->session->userdata('role_id');
    $query = " SELECT `user_menu`.`id`,`menu`
                FROM `user_menu` JOIN `user_access_menu` 
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
            WHERE `role_id` = $roleId ORDER BY `menu_id` ASC
            ";
    $menu = $this->db->query($query)->result_array();
    ?>

    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu'] ?>
        </div>
        <?php
        $menuId = $m['id'];
        $query = "SELECT * FROM `user_sub_menu` WHERE `user_sub_menu`.`menu_id` = $menuId";
        $submenu = $this->db->query($query)->result_array();
        ?>
        <?php foreach ($submenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                </li>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon'] ?>"></i>
                    <span><?= $sm['title'] ?></span>
                </a>
                </li>
            <?php endforeach; ?>
            <hr class="sidebar-divider">
        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link " href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->