<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fw fa-hospital-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GAS MEDIS <sup>RSA UGM</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query Menu -->
    <?php
    $role_id = $this->session->userdata('role_id');

    $queryMenu = "SELECT um.id, menu
                    FROM user_menu AS um JOIN user_access_menu AS uam 
                      ON um.id = uam.menu_id
                   WHERE uam.role_id = $role_id
                ORDER BY uam.menu_id ASC
                ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>


    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <?php if ($m['menu'] == 'User') continue ?>

        <!-- Heading -->
        <div class="sidebar-heading">
            <?= $m['menu'];  ?>
        </div>

        <!-- Query Sub Menu -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * FROM user_sub_menu
                         WHERE menu_id = $menuId   
                           AND is_active = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- Looping Sub Menu -->
        <?php foreach ($subMenu as $sm) : ?>
            <!-- Nav Item - Dashboard -->
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <a class="nav-link pb-0" href="<?= base_url($sm['url']) ?>">
                    <i class="<?= $sm['icon'] ?>"></i>
                    <span><?= $sm['title'] ?></span></a>
                </li>
            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">


        <?php endforeach; ?>

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li> -->

        <!-- Divider
        <hr class="sidebar-divider d-none d-md-block"> -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->