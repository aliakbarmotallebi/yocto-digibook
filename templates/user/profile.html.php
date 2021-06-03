<?php include_once(__DIR__ . '/../main/commons/header.html.php') ?>
<?php include_once(__DIR__ . '/../main/commons/nav.html.php') ?>

<div class="container">
    <main>
        <div class="row g-3">

            <?php include_once(__DIR__ . '/commons/sidebar.html.php') ?>

            <div class="col-md-8 col-lg-9 order-md-last pt-4">
                <div class="card">
                    <div class="card-header">
                        ویرایش پروفایل
                    </div>
                    <div class="card-body">
                        <form action="<?= route('user.edit.profile') ?>" method="post">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="username" class="form-label">نام کاربری</label>
                                    <input type="text" class="form-control" disabled id="username" name="username" value="<?= $user->username ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">نام</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" value="<?= $user->first_name ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" value="<?= $user->first_name ?>">
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
                            <hr class="my-4">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit">ویرایش پروفایل</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once(__DIR__ . '/../main/commons/footer.html.php') ?>