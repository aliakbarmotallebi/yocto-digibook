<?php include_once(__DIR__ . '/../main/commons/header.html.php') ?>
<?php include_once(__DIR__ . '/../main/commons/nav.html.php') ?>

<div class="container">
  <main>
    <div class="row g-3">

      <?php include_once(__DIR__ . '/commons/sidebar.html.php') ?>

      <div class="col-md-8 col-lg-9 order-md-last pt-4">
        <div class="card">
                <div class="card-header">
                    جزئیات سفارش شما
                </div>
                <div class="card-body">
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
                            <?php foreach($details as $detail): ?>
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
                                    <?php  if( $detail->order->isPaid() ): ?>
                                        <span class="badge bg-success">پرداخت شده</span>
                                    <?php  else: ?>
                                        <span class="badge bg-danger">پرداخت نشده</span>
                                    <?php  endif ?>
                                </td>
                                <td>
                                    <span class="fw-bold">
                                       <?= $detail->order->total_price ?>
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
      </div>
    </div>
  </main>
</div>

<?php include_once(__DIR__ . '/../main/commons/footer.html.php') ?>