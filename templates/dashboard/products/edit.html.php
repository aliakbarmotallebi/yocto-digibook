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
                    افزدون کتاب
                </header>
                <article class="card-body">
                    <form class="row g-3" enctype="multipart/form-data" method="post" action="<?= url("/dashboard/products/update/$product->id") ?>" >
                        <div class="col-md-6">
                            <label for="title" class="form-label">عنوان</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $product->title ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">قیمت</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?= $product->getRawOriginal('price') ?>">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">توضیحات</label>
                            <textarea class="form-control" name="description" id="description" rows="3"><?= $product->description ?></textarea>
                        </div>

                        <div class="col-md-5">
                            <label for="author" class="form-label">نویسنده کتاب</label>
                            <input type="text" class="form-control" id="author" name="author" value="<?= $product->author ?>">
                        </div>
                        <div class="col-md-2">
                            <label for="page_count" class="form-label">تعداد صفحات</label>
                            <input type="number" class="form-control" id="page_count" name="page_count" value="<?= $product->page_count ?>">
                        </div>
                        <div class="col-md-5">
                            <label for="translator" class="form-label">مترجم کتاب</label>
                            <input type="text" class="form-control" id="translator" name="translator" value="<?= $product->translator ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">دسته بندی</label>
                            <select id="category_id" name="category_id" class="form-select">
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category->id ?>">
                                        <?= $category->label ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label">تصویر کتاب</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="col-6">
                            <label for="status" class="form-label">وضعیت انتشار</label>
                            <select id="status" name="status" class="form-select">
                                <option seleted value="1">منتشر</option>
                                <option value="0">عدم منتشر</option>  
                            </select>
                     
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                              ویرایش کتاب
                            </button>
                        </div>
                    </form>
                </article>
            </div>
        </main>
    </div>
</div>