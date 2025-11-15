<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login - ADI SalesTrack</title>

<!-- plugins:css -->
<link rel="stylesheet" href="<?= base_url('vendors/feather/feather.css'); ?>">
<link rel="stylesheet" href="<?= base_url('vendors/mdi/css/materialdesignicons.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css'); ?>">
<link rel="stylesheet" href="<?= base_url('vendors/typicons/typicons.css'); ?>">
<link rel="stylesheet" href="<?= base_url('vendors/simple-line-icons/css/simple-line-icons.css'); ?>">
<link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css'); ?>">

<!-- inject:css -->
<link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css'); ?>">
<!-- endinject -->

<link rel="shortcut icon" href="<?= base_url('images/logo.png'); ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

              <div class="brand-logo text-center mb-3">
                <img src="<?= base_url('images/logo/alldata_logo.png') ?>" width="120">
              </div>

              <h4>Welcome to ADI SalesTrack</h4>
              <h6 class="fw-light mb-3">Sign in to continue.</h6>

              <form id="loginForm">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username"
                    placeholder="Username" required>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password"
                    placeholder="Password" required>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    SIGN IN
                  </button>
                </div>
              </form>

              <div id="alertBox" class="text-danger mt-3" style="display:none;"></div>

              <div class="text-center mt-4 fw-light">
                Don't have an account?
                <a href="<?= base_url('register') ?>" class="text-primary">Register</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script>
    const form = document.getElementById('loginForm');
    const alertBox = document.getElementById('alertBox');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;

      let response = await fetch("<?= base_url('api/login') ?>", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ username, password })
      });

      let result = await response.json();

      if (!response.ok) {
        alertBox.style.display = 'block';
        alertBox.textContent = result.messages || result.message || "Login failed";
        return;
      }

      // Save token
      localStorage.setItem("token", result.token);

      // Redirect
      window.location.href = "<?= base_url('dashboard') ?>";
    });
  </script>


  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('vendors/js/vendor.bundle.base.js') ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
    <script src="<?= base_url('js/off-canvas.js') ?>"></script>
    <script src="<?= base_url('js/hoverable-collapse.js') ?>"></script>
    <script src="<?= base_url('js/template.js') ?>"></script>
    <script src="<?= base_url('js/settings.js') ?>"></script>
    <script src="<?= base_url('js/todolist.js') ?>"></script>
  <!-- endinject -->
</body>

</html>
