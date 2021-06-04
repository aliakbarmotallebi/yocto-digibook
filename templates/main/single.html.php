
<?php include_once(__DIR__ . '/commons/header.html.php') ?>
<?php include_once(__DIR__ . '/commons/nav.html.php') ?>


<main>
  <div class="container">
    <h1><?= $product->title ?></h1>
    <p class="fs-5 col-md-8">
        <?= $product->description ?>
    </p>

    <div class="mb-5">
        <a href="<?= url("/carts/add/{$product->id}") ?>" class="btn btn-primary btn-sm px-4">
    افزدون به سبد خرید  
        </a>
    </div>

    <hr class="col-3 col-md-2 mb-5">

    <div class="row g-5">
      <div class="col-md-4 d-flex">
        <img src="<?= asset($product->image) ?>" class="img-thumbnail" alt="<?= $product->title ?>">
      </div>
            <div class="col-md-8 ">
                <ul class="icon-list">
                    <li>
                        <a href="<?= url("/category/{$product->category->id}") ?>">
                            <?= $product->category->label ?>
                        </a>
                    </li>
                    <li>
                        <strong class="fs-5"> نویسنده: </strong>
                        <span>
                            <?= $product->author?>
                        </span>
                    </li>
                    <li>
                        <strong class="fs-5"> مترجم: </strong>
                        <span>
                            <?= $product->translator?>
                        </span>
                    </li>
                    <li>
                        <strong class="fs-5"> تعداد صفحات: </strong>
                        <span>
                            <?= $product->page_count?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php include_once(__DIR__ . '/commons/footer.html.php') ?>
