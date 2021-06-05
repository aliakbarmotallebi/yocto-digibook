<?php include_once(__DIR__ . '/../commons/header.html.php') ?>


<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__ . '/../commons/nav.html.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">مدیریت کتاب ها</h1>
            </div>
            <div class="my-3">
                <?= flash()->each() ?>
            </div>
            <div class="card">
                <header class="card-header">
                    لیست کتاب ها
                </header>
                <article class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان</th>
                                <th scope="col">توضیحات</th>
                                <th scope="col">دسته بندی</th>
                                <th scope="col">قیمت</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">وضعیت نمایش</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?= $product->id ?></td>
                                    <td class="fw-bold">
                                        <a href="<?= url("/product/{$product->id}") ?>" target="_blank">
                                            <?= $product->title ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= $product->getBody() ?>
                                    </td>
                                    <td><?= $product->category->label ?></td>
                                    <td><?= $product->price ?></td>
                                    <td><?= $product->created_at ?></td>
                                    <td>
                                        <?php if ($product->status) : ?>
                                            <span class="badge bg-success">
                                                فعال
                                            </span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">
                                                غیرفعال
                                            </span>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-sm" role="group">
                                            <a class="btn btn-warning" href="<?= url("/dashboard/products/edit/{$product->id}") ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </a>
                                            <a class="btn btn-danger" href="<?= url("/dashboard/products/delete/{$product->id}") ?>">
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
                        <?php echo ($products->render()); ?>
                    </div>
                </article>
            </div>
        </main>
    </div>
</div>