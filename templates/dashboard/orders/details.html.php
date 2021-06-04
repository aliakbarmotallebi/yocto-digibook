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
                                <th scope="col">#</th>
                                <th scope="col">نام کالا</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">قیمت واحد</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($details as $detail) : ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?= $detail->product->title ?></td>
                                    <td><?= $detail->qty ?></td>
                                    <td>
                                        <?= $detail->price ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <span class="fw-bold">
                                        مبلغ پرداخت شده
                                    </span>
                                </td>
                                <td>
                                    <?php if ($detail->order->isPaid()) : ?>
                                        <span class="badge bg-success">پرداخت شده</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">پرداخت نشده</span>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <span class="fw-bold">
                                        <?= $detail->order->total_price ?>
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </article>
            </div>
        </main>
    </div>
</div>