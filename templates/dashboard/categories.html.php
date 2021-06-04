<?php include_once(__DIR__ . '/commons/header.html.php') ?>


<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__ . '/commons/nav.html.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">مدیریت دسته بندی</h1>
            </div>
            <div class="my-3">
                <?= flash()->each() ?>
            </div>
            <div class="card">
                <header class="card-header">
                    ایجاد دسته بندی
                </header>
                <article class="card-body">
                    <form action="<?= route('dashboard.categories.store') ?> " method="post">
                        <div class="col-md-4">
                            <label for="label" class="form-label">نام دسته بندی</label>
                            <input type="text" class="form-control" name="label" id="label">
                        </div>
                        <div class="col-12 mt-2">
                            <button type="submit" class="btn btn-primary">ذخیره دسته بندی</button>
                        </div>
                    </form>
                </article>
            </div>
            <div class="card mt-3">
                <header class="card-header">
                    لیست دسته بندی ها
                </header>
                <article class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام دسته بندی</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $category->id ?>
                                    </th>
                                    <td>
                                        <?= $category->label ?>
                                    </td>
                                    <td>
                                        <a href="<?= url("/dashboard/categories/delete/{$category->id}") ?>" class="btn btn-danger btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </article>
            </div>
        </main>
    </div>
</div>