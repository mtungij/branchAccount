// In your new_dashboard_view.php (or whatever you call your main content file)
<?php include_once APPPATH . "views/partials/header.php"; ?>
// The new partials/header.php should internally include:
// <?php include_once APPPATH . 'views/partials/navbar.php'; ?>
// <?php include_once APPPATH . 'views/partials/sidebar.php'; ?>

// Then your main content div:
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Your page-specific content from old main file -->
    </div>
</div>

<?php include_once APPPATH . "views/partials/footer.php"; ?>