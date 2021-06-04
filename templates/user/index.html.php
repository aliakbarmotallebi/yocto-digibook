<?php include_once(__DIR__ . '/../main/commons/header.html.php') ?>
<?php include_once(__DIR__ . '/../main/commons/nav.html.php') ?>

<div class="container">
  <main>
    <div class="row g-3">

      <?php include_once(__DIR__ . '/commons/sidebar.html.php') ?>

      <div class="col-md-8 col-lg-9 order-md-last pt-4">
        <div class="card">
                <div class="card-header">
                    سفارشات شما
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">کد سفارش</th>
                                <th scope="col">تاریخ ایجاد</th>
                                <th scope="col">وضعیت سفارش	</th>
                                <th scope="col">مبلغ کل</th>
                                <th scope="col">دسترسی</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders as $order): ?>
                            <tr>
                                <td><?=  $order->id ?></td>
                                <td><?=  $order->order_date ?></td>
                                <td>
                                    <?php  if( $order->isPaid() ): ?>
                                        <span class="badge bg-success">پرداخت شده</span>
                                    <?php  else: ?>
                                        <span class="badge bg-danger">پرداخت نشده</span>
                                    <?php  endif ?>
                                </td>
                                <td><?=  $order->total_price ?></td>
                                <td class="text-center">
                                    <a href="<?= url("/user/order/{$order->id}") ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
      </div>
    </div>
  </main>
</div>

<?php include_once(__DIR__ . '/../main/commons/footer.html.php') ?>