<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
    <span class="fs-5">مدیریت کتاب ها</span>
  </h6>
  <ul class="nav flex-column mb-2">
    <li class="nav-item">
      <a class="nav-link" href="<?= route('dashboard.products.create') ?>">
        ایجاد کتاب
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= route('dashboard.products.index') ?>">
        لیست کتاب ها
      </a>
    </li>
  </ul>

  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="<?= route('dashboard.categories.index') ?>">
          مدیریت دسته بندی ها
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= route('dashboard.users.index') ?>">

          مدیریت کاربران
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= route('dashboard.orders.index') ?>">
          سفارشات
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= route('main.index') ?>" target="_blank">
          نمایش وب سایت
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= route('logout') ?>">
          خروج
        </a>
      </li>
    </ul>
  </div>
</nav>
