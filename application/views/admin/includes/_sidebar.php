<?php

$cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2); ?>  

<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->

  <!--   <a href="<?= base_url('admin') ?>" class="brand-link">

      <img src="<?= base_url($this->general_settings['favicon']) ?>" alt="Logo" class="brand-image img-circle elevation-3"

           style="opacity: .8">

      <span class="brand-text font-weight-light"><?= $this->general_settings['application_name'] ?></span>

    </a> -->

    <!-- Sidebar -->

    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->

        <div class="user-panel py-3 d-flex justify-content-center">
            <div class="info mt-1 p-0">

                <a href="#" class="d-block"><?php echo ucwords($this->session->userdata['username']) . "<br/>" . " (" . ucwords($this->session->userdata('admin_role')) . ")"; ?><br/>

                    Last Login IP :  <?php echo $this->session->userdata('last_ip') . " <br/>Time: " . $this->session->userdata('last_login'); ?>

                </a>

            </div>

        </div>  

        <!-- Sidebar Menu -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Add icons to the links using the .nav-icon class

                     with font-awesome or any other icon font library -->

                <?php

                $menu = get_sidebar_menu();
             
                foreach ($menu as $nav):



                    $sub_menu = get_sidebar_sub_menu($nav['module_id']);
                    
                 
                    $has_submenu = count($sub_menu) > 0 ? true : false;

                    ?>

                    <?php  if ($this->rbac->check_module_permission($nav['controller_name'])): ?> 
                        <li id="<?= $nav['controller_name'] ?>" class="nav-item <?= $has_submenu ? 'has-treeview' : '' ?> has-treeview">
                            <a href="<?= base_url('admin/' . $nav['controller_name']) ?>" class="nav-link">
                                <i class="nav-icon fa <?= $nav['fa_icon'] ?>"></i>
                                <p>
                                    <?= trans($nav['module_name']) ?>
                                    <?= $has_submenu ? '<i class="right fa fa-angle-left"></i>' : '' ?>
                                </p>

                            </a>

                            <!-- sub-menu -->
                            
                            <?php if ($has_submenu): ?>

                                <ul class="nav nav-treeview  ">

                                    <?php foreach ($sub_menu as $sub_nav): ?>

                                        <li class="nav-item"  <?php if ($sub_nav['link']) {

                                            if (current_url() == base_url('admin/' . $nav['controller_name'] . '/' . $sub_nav['link'])) { ?>

                                            style="background:#5f6d7b;"

                                            <?php }

                                        } else {

                                            if (current_url() == base_url('admin/' . $nav['controller_name'])) { ?>

                                             style="background:#5f6d7b;"

                                            <?php }

                                        } ?>>

                                            <a href="<?= base_url('admin/' . $nav['controller_name'] . '/' . $sub_nav['link']) ?>" class="nav-link">

                                                <i class="fa fa-circle-o nav-icon"></i>
                                                
                                                <p>
                                                    <?php echo trans($sub_nav['name']) ?>
                                                    
                                                </p>

                                            </a>

                                        </li>



                                    <?php endforeach; ?>

                                </ul>

                            <?php endif; ?>

                            <!-- /sub-menu -->

                        </li>

                    <?php endif; ?>

                <?php

                endforeach;

                ?>

            </ul>

        </nav>

        <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

</aside>



<script>

    $("#<?= $cur_tab ?>").addClass('menu-open');

    $("#<?= $cur_tab ?> > a ").addClass('active');

    

</script>