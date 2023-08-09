<!-- partial : navbar -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('storage/upload_image/'. \App\Helpers::setting()->logo )); ?>" class="mr-2"
                alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('storage/upload_image/'. \App\Helpers::setting()->logo )); ?>" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item nav-profile dropdown">

                <a class="nav-link dropdown-toggle" href="dropdown-logout" data-toggle="dropdown" id="profileDropdown">
                    <?php
                    if(\App\Helpers::profile()->profile_image == ''){
                        $profileImg = 'about-img_1681907625.png';
                    }else{
                        $profileImg = \App\Helpers::profile()->profile_image;
                    }
                    ?>
                    <img src="<?php echo e(asset('/storage/upload_image/' . $profileImg)); ?>" alt="profile" />
                </a>
                <div id="dropdown-logout" class="dropdown-menu dropdown-menu-right navbar-dropdown" id=""
                    aria-labelledby="profileDropdown">
                    <!--a href="<?php echo e(route('admin.profile')); ?>" class="dropdown-item">
                        <i class="ti-settings text-primary"></i>
                        Profile
                    </a-->
                    <a href="<?php echo e(route('admin.changepassword')); ?>" class="dropdown-item">
                        <i class="ti-settings text-primary"></i>
                        Change Password
                    </a>
                    <a href="<?php echo e(route('admin.setting')); ?>" class="dropdown-item">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
            
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
<?php /**PATH C:\xamppnew\htdocs\june\complaint-admin\resources\views/admin/partials/navbar.blade.php ENDPATH**/ ?>