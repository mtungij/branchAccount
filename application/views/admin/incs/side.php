<aside class="fixed skin-6">
<div class="sidebar-inner scrollable-sidebar">
<div class="size-toggle">
<a class="btn btn-sm" id="sizeToggle">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
<i class="fa fa-power-off"></i>
</a>
</div><!-- /size-toggle -->	

<div class="main-menu">
<ul>
<li class="active">
<a href="<?php echo base_url("admin/index"); ?>">
<span class="menu-icon">
	<i class="fa fa-desktop fa-lg"></i> 
</span>
<span class="text">
	Dashboard
</span>
<span class="menu-hover"></span>
</a>
</li>
<li>
<a href="<?php echo base_url("admin/position"); ?>">
<span class="menu-icon">
	<i class="fa fa-tag fa-lg"></i> 
</span>
<span class="text">
	Position
</span>
<span class="menu-hover"></span>
</a>
</li>
<li>
<a href="<?php echo base_url("admin/blanch"); ?>">
<span class="menu-icon">
	<i class="fa fa-tag fa-lg"></i> 
</span>
<span class="text">
	Blanch
</span>
<span class="menu-hover"></span>
</a>
</li>
<li class="openable open">
<a href="#">
<span class="menu-icon">
	<i class="fa fa-tag fa-lg"></i> 
</span>
<span class="text">
	Capital
</span>
<span class="menu-hover"></span>
</a>
<ul class="submenu">
<li><a href="<?php echo base_url("admin/shareHolder"); ?>"><span class="submenu-label">Register share Holder</span></a></li>
<li><a href="<?php echo base_url("admin/capital"); ?>"><span class="submenu-label">Add Capital</span></a></li>
</ul>
</li>

<li class="openable">
<a href="#">
<span class="menu-icon">
	<i class="fa fa-tag fa-lg"></i> 
</span>
<span class="text">
	Employee
</span>
</a>
<ul class="submenu">
<li><a href="<?php echo base_url("admin/employee"); ?>"><span class="submenu-label">Register Employee</span></a></li>
<li><a href="<?php echo base_url("admin/all_employee"); ?>"><span class="submenu-label">All Employee</span></a></li>
<li><a href="<?php echo base_url("admin/view_blanchEmployee"); ?>"><span class="submenu-label">All Blanch & Employee </span></a></li>

<li><a href="<?php echo base_url("admin/leave"); ?>"><span class="submenu-label">Employee Leave </span></a></li>
<li><a href="<?php echo base_url("admin/salary_sheet"); ?>"><span class="submenu-label">Salary Sheet </span></a></li>

</ul>
</li>

<li>
<a href="<?php echo base_url("admin/region"); ?>">
<span class="menu-icon">
	<i class="fa fa-map-marker fa-lg"></i> 
</span>
<span class="text">
	Region
</span>
<span class="menu-hover"></span>
</a>
</li>
<!-- <li>
<a href="<?php echo base_url("admin/riba"); ?>">
<span class="menu-icon">
	<i class="fa fa-tag fa-lg"></i> 
</span>
<span class="text">
	Loan
</span>
<span class="menu-hover"></span>
</a>
</li> -->

<li class="openable">
<a href="#">
<span class="menu-icon">
	<i class="fa fa-tag fa-lg"></i> 
</span>
<span class="text">
	Loan
</span>
</a>
<ul class="submenu">
<li><a href="<?php echo base_url("admin/loan_category"); ?>"><span class="submenu-label">Loan Category</span></a></li>
<li><a href="<?php //echo base_url("admin/all_employee"); ?>"><span class="submenu-label">All loan</span></a></li>
<li><a href="<?php //echo base_url("admin/view_blanchEmployee"); ?>"><span class="submenu-label"> Loan penaty</span></a></li>

</ul>
</li>

<li class="openable">
<a href="#">
<span class="menu-icon">
	<i class="fa fa-tag fa-lg"></i> 
</span>
<span class="text">
	Customer
</span>
</a>
<ul class="submenu">
<li><a href="<?php echo base_url("admin/customer"); ?>"><span class="submenu-label">Register Customer</span></a></li>
<li><a href="<?php echo base_url("admin/all_customer"); ?>"><span class="submenu-label">All Customer</span></a></li>

</ul>
</li>
</ul>

</div><!-- /main-menu -->
</div><!-- /sidebar-inner -->
</aside>