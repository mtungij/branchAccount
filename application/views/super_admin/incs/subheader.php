<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " >
            <!-- begin: Header Menu -->
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i>
</button>
<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default "  >
        <ul class="kt-menu__nav ">
    </ul>
    </div>
</div>
<!-- end: Header Menu -->       <!-- begin:: Header Topbar -->


<div class="kt-header__topbar">
    <!--begin: Search -->
         
        <!--end: Search -->

    <!--begin: Language bar -->
   <!--  <div class="kt-header__topbar-item kt-header__topbar-item--langs">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <img class="" src="<?php echo base_url() ?>assets/new/assets/media/flags/012-uk.svg" alt="" />
            </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
            <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
    <li class="kt-nav__item kt-nav__item--active">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="<?php echo base_url() ?>assets/new/assets/media/flags/020-flag.svg" alt="" /></span>
            <span class="kt-nav__link-text">English</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="<?php echo base_url() ?>assets/new/assets/media/flags/016-spain.svg" alt="" /></span>
            <span class="kt-nav__link-text">Spanish</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="<?php echo base_url() ?>assets/new/assets/media/flags/017-germany.svg" alt="" /></span>
            <span class="kt-nav__link-text">German</span>
        </a>
    </li>
</ul>       </div>
    </div> -->
    <!--end: Language bar -->


    <!--begin: User Bar -->
    <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <div class="kt-header__topbar-user">
                
                <span class="kt-hidden kt-header__topbar-username kt-hidden-mobile">Sean</span>
                <img alt="Pic" class="kt-radius-100" src="<?php echo base_url() ?>assets/img/user.png" />
                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
            </div>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
            <!--begin: Head -->
    <div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
        <div class="kt-user-card__avatar">
            <img class="kt-hidden-" alt="Pic" src="<?php echo base_url() ?>assets/img/user.png" />
            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
        </div>
        <div class="kt-user-card__name">
            <?php echo $_SESSION['email']; ?>
        </div>
        <!-- <div class="kt-user-card__badge">
            <span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
        </div> -->
    </div>
<!--end: Head -->

<!--begin: Navigation -->
<div class="kt-notification">
    <a href="<?php echo base_url("admin/company_profile"); ?>" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-calendar-3 kt-font-success"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Profile
            </div>
            <div class="kt-notification__item-time">
                Account settings
            </div>
        </div>
    </a>
 
    <div class="kt-notification__custom kt-space-between">
        <a href="<?php echo base_url("welcome/super_logout"); ?>"  class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>

    </div>
</div>
</div>
<!--end: Navigation -->     
</div>
<!--end: User Bar -->    
</div><!-- end:: Header Topbar -->
</div>
<!-- end:: Header -->