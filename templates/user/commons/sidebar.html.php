<div class="col-md-4 col-lg-3">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">  خوش آمدید (<?= auth()->user()->username ?>) </span>
    </h4>
    <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <a href="<?= route('user.orders') ?>">
                <h6 class="my-0">سفارشات</h6>
            </a>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <a href="<?= route('user.profile') ?>">
                <h6 class="my-0">ویرایش پروفایل</h6>
            </a>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <a href="<?= route('logout') ?>">
                <h6 class="my-0">خروج</h6>
            </a>
        </li>
    </ul>
</div>