
<?php include_once('commons/header.html.php') ?>
<?php include_once('commons/nav.html.php') ?>

<div class="container">
  <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <?php foreach($catgories as $catgory): ?>
        <a class="p-2 link-secondary" href="#">
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
                <p class="card-text"><?= $product->title ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">افزودن به سبد</button>
                  </div>
                  <small class="text-muted"><?= $product->price ?></small>
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

<?php include_once('commons/footer.html.php') ?>
