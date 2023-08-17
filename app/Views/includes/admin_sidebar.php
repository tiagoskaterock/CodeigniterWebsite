<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= url_to('admin.dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <sup><?php echo ucfirst(esc(auth()->user()->firstname)) ?></sup>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url_to('admin.dashboard') ?>" title="Dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php if (auth()->user()->inGroup('admin')): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= url_to('admin.posts') ?>" title="Posts">
            <i class="fas fa-fw fa-blog"></i>
            <span>Posts</span>
        </a>
    </li>
    <?php endif ?>

    <?php if (auth()->user()->inGroup('admin')): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= url_to('admin.users') ?>" title="Users">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
    </li>
    <?php endif ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= url_to('/') ?>" title="Website">
            <i class="fas fa-fw fa-laptop"></i>
            <span>Website</span>
        </a>
    </li>

</ul>