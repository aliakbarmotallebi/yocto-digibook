
<?php include_once(__DIR__ . '/commons/header.html.php') ?>
<?php include_once(__DIR__ . '/commons/nav.html.php') ?>

<div class="container">
  <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <?php foreach($catgories as $catgory): ?>
        <a class="p-2 link-secondary" 
          href="<?= url("/category/{$catgory->id}") ?>">
          <?= $catgory->label ?>
        </a>
        <?php endforeach ?>
      </nav>
  </div>
</div>
<main>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach($products as $product): ?>

          <div class="col w-25">
            <div class="card shadow-sm">
              <img height="300" src="<?= asset($product->image) ?>" alt="<?= $product->title ?>">
              <div class="card-body">

                <p class="card-text">
                  <a href="<?= url("/product/{$product->id}") ?>">
                    <?= $product->title ?>
                  </a>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?= url("/carts/add/{$product->id}") ?>" class="btn btn-sm btn-outline-secondary">
                      افزودن به سبد
                    </a>
                  </div>
                  <small class="text-success fs-5"><?= $product->price ?></small>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach ?>
      </div>
      <div class="d-flex justify-content-center py-3">
        <?php echo( $products->render() ); ?>
      </div>  
    </div>

  </div>

</main>

<?php include_once(__DIR__ . '/commons/footer.html.php') ?>
