<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>صفحه ورود کاربران</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= asset('/styles/fonts.css') ?>" rel="stylesheet">
    <link href="<?= asset('/styles/bootstrap.rtl.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('/styles/auth.css') ?>" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <div class="my-3">
          <?= flash()->each() ?>
      </div>
      <form action="<?= route('auth.login') ?>" method="POST">
        <h1 class="h3 mb-3 fw-normal">ورود به حساب کاربری</h1>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="username" name="username" placeholder="نام کاربری">
          <label for="username">نام کاربری</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="رمز عبور">
          <label for="password">رمز عبور</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> مرا بخاطر بسپار
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">ورود به سیستم</button>
        <div class="mt-3">
            <p class="card-text">
                <a href="<?= route('main.index') ?>" class="stretched-link text-secondary" style="position: relative;">صفحه اصلی</a>
            </p>
            <p class="card-text bg-light" style="transform: rotate(0);">
                <a href="<?= route('auth.register') ?>" class="stretched-link text-secondary" style="position: relative;">حساب کاربری ندارم !</a>
            </p>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
      </form>
    </main>
  </body>
</html>