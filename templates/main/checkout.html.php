<?php

use App\Facades\Cart;

include_once(__DIR__ . '/commons/header.html.php') ?>
<?php include_once(__DIR__ . '/commons/nav.html.php') ?>


<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <form action="<?= route('checkout.store') ?>" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                جزئیات صورتحساب 
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">نام</label>
                                        <input type="text" class="form-control" id="firstName" name="first_name" value="<?= $user->first_name ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">نام خانوادگی</label>
                                        <input type="text" class="form-control" id="lastName" name="last_name" value="<?= $user->last_name ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="mobile" class="form-label">تلفن همراه</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $user->mobile ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="postal_code" class="form-label">کدپستی</label>
                                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?= $user->postal_code ?>">
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="address" class="form-label">آدرس</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?= $user->address ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mt-2">
                                            سفارش شما
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>مبلغ قابل پرداخت : </div>
                                            <div class="text-right h5 b"> <?= Cart::total() ?>  تومان </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-success btn-sm btn-block w-100">سفارش دهید</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once(__DIR__ . '/commons/footer.html.php') ?>