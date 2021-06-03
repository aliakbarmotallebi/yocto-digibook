<?php include_once(__DIR__ . '/commons/header.html.php') ?>
<?php include_once(__DIR__ . '/commons/nav.html.php') ?>


<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    سبد خرید شما
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام کالا</th>
                                <th scope="col">تعداد سفارش</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($carts as $cart): ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?= $cart->name ?></td>
                                    <td><?= $cart->qty ?></td>
                                    <td><?= $cart->price ?></td>
                                    <td>
                                        <a href="<?= url("/carts/delete/{$cart->__rowID}") ?>">
                                            حذف از سبد
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <span class="fw-bold">
                                        مبلغ قابل پرداخت
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-bold">
                                       <?= \App\Facades\Cart::total() ?>
                                       تومان
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="#" class="btn btn-primary">تکمیل سفارش</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once(__DIR__ . '/commons/footer.html.php') ?>