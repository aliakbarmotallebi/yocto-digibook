<?php include_once(__DIR__ . '/../commons/header.html.php') ?>


<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__ . '/../commons/nav.html.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">مدیریت سفارشات</h1>
            </div>
            <div class="my-3">
                <?= flash()->each() ?>
            </div>
            <div class="card">
                <header class="card-header">
                    لیست سفارش ها
                </header>
                <article class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">کد سفارش</th>
                                <th scope="col">کاربر سفارش دهنده</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">وضعیت سفارش </th>
                                <th scope="col">مبلغ کل</th>
                                <th scope="col">دسترسی</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?= $order->id ?></td>
                                    <td><?= $order->user->username ?></td>
                                    <td><?= $order->order_date ?></td>
                                    <td>
                                        <?php if ($order->isPaid()) : ?>
                                            <span class="badge bg-success">پرداخت شده</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">پرداخت نشده</span>
                                        <?php endif ?>
                                    </td>
                                    <td><?= $order->total_price ?></td>
                                    <td class="text-center">
                                        <div class="btn-group btn-sm" role="group">
                                            <a class="btn btn-warning" href="<?= url("/dashboard/orders/show/{$order->id}") ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </a>
                                            <a class="btn btn-danger" href="<?= url("/dashboard/orders/delete/{$order->id}") ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start py-1">
                        <?php echo ($orders->render()); ?>
                    </div>
                </article>
            </div>
        </main>
    </div>
</div>