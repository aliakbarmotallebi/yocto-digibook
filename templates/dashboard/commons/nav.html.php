<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>مدیریت کتاب ها</span>
          <a class="link-secondary" href="#" aria-label="إضافة تقرير جديد">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              ایجاد کتاب
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              لیست کتاب ها
            </a>
          </li>
        </ul>

      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              مدیریت دسته بندی ها
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= route('dashboard.users.index') ?>">
              <span data-feather="shopping-cart"></span>
                مدیریت کاربران    
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
            سفارشات
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= route('main.index') ?>" target="_blank">
              <span data-feather="bar-chart-2"></span>
              نمایش وب سایت
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= route('logout') ?>">
              <span data-feather="layers"></span>
              خروج
            </a>
          </li>
        </ul>
      </div>
    </nav>