<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-0">
            <img src="<?= base_url('assets/'); ?>admin/img/dashboardlogo.png" width="60px" height="50px">
        </div>
        <div class="sidebar-brand-text mx-2">Mager Printing</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">
    <div class="sidebar-heading">
    <?php if($this->session->userdata('role_id')==1){?>
    Admin Magers
    <?php } ?>
    <?php if($this->session->userdata('role_id')==2){?>
    Member Magers
    <?php } ?>
        
    </div>

    <!-- query menu   -->
    <?php if($this->session->userdata('role_id')==2){?>
    <li <?=$this->uri->segment(2) =='' || $this->uri->segment(2)=='gadad' ? 'class="nav-item active" ' : 'class="nav-item"'?>>
        <a class="nav-link pb-0" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>
    <li <?=$this->uri->segment(2) =='upload' || $this->uri->segment(2) == 'gaada' ? 'class="nav-item active" ' : 'class="nav-item"'?>>
    
        <a class="nav-link pb-0" href="<?= base_url('user/upload'); ?>">
            <i class="fas fa fa-fw fa-upload"></i>
            <span>Upload File</span></a>
    </li>
    <li <?=$this->uri->segment(2) =='transaksiuser' || $this->uri->segment(2)== 'gaada' ? 'class="nav-item active" ' : 'class="nav-item"'?>>
        <a class="nav-link pb-0" href="<?= base_url('user/transaksiuser'); ?>">
            <i class="fas fa fa-fw fa-upload"></i>
            <span>Order</span></a>
    </li>
    <li <?=$this->uri->segment(2) =='prosesorder' || $this->uri->segment(2)== 'gaada' ? 'class="nav-item active" ' : 'class="nav-item"'?>>
        <a class="nav-link pb-0" href="<?= base_url('user/prosesorder'); ?>">
            <i class="fas fa fa-fw fa-upload"></i>
            <span>Proses Order</span></a>
    </li>
    <li <?=$this->uri->segment(2) =='historitransaksi' || $this->uri->segment(2)== 'gaada' ? 'class="nav-item active" ' : 'class="nav-item"'?>>
        <a class="nav-link pb-0" href="<?= base_url('user/historitransaksi'); ?>">
            <i class="fas fa fa-fw fa-upload"></i>
            <span>Histori Transaksi</span></a>
    </li>
    <?php } ?>

    <?php 
    $role_id = $this->session->userdata('role_id');

    $queryMenu ="SELECT `user_menu`.`id`, `menu` 
                   FROM `user_menu` JOIN `user_access_menu`
                     ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                     WHERE `user_access_menu`.`role_id`= $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC 
                ";
    $menu = $this->db->query($queryMenu)->result_array();
  ?>


    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>

    <!-- sub menu -->
    <?php
    $menuId = $m['id'];
    $querySubMenu = "SELECT *
                       FROM `user_sub_menu` JOIN `user_menu`
                         ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                      WHERE `user_sub_menu`.`menu_id` = $menuId
                        AND `user_sub_menu`.`is_active` = 1
                        ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>

    <?php foreach ($subMenu as $sm) : ?>
    <?php if ($title == $sm['title']):?>
    <li class="nav-item active">
    <?php else :?>
    <li class="nav-item ">
    <?php endif;?>
        <a class="nav-link pb-0" href="<?=base_url($sm['url']);?>">
            <i class="<?=$sm['icon'];?>"></i>
            <span><?=$sm['title'];?></span></a>
    </li> 
    
<?php endforeach; ?>

<!-- <hr class="sidebar-divider mt-3">  -->

<?php endforeach;?>


    <!-- Menu Keluar -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
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