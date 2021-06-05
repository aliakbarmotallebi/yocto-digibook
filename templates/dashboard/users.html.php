 <?php include_once(__DIR__ . '/commons/header.html.php') ?>


 <div class="container-fluid">
     <div class="row">

         <?php include_once(__DIR__ . '/commons/nav.html.php') ?>

         <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
             <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                 <h1 class="h2">مدیریت کاربران</h1>
             </div>
             <div class="my-3">
                <?= flash()->each() ?>
            </div>
             <div class="card">
                 <header class="card-header">
                     لیست کاربران
                 </header>
                 <article class="card-body">
                     <table class="table table-bordered table-responsive">
                         <thead>
                             <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">نام کاربری</th>
                                 <th scope="col">نام و نام خانوادگی</th>
                                 <th scope="col">شماره همراه</th>
                                 <th scope="col">تاریخ عضویت</th>
                                 <th scope="col">سطح کاربر</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach($users as $user): ?>
                             <tr>
                                 <th scope="row">
                                     <?= $user->id ?>
                                 </th>
                                 <td><?= $user->username ?></td>
                                 <td><?= $user->full_name ?></td>
                                 <td><?= $user->mobile ?></td>
                                 <td>
                                     <?= $user->created_at ?>
                                 </td>
                                 <td>
                                    <?php  if( $user->isAdmin() ): ?>
                                        <span class="badge bg-success">مدیرسایت</span>
                                    <?php  else: ?>
                                        <span class="badge bg-secondary">کاربر عادی</span>
                                    <?php  endif ?>
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