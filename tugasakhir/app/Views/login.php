<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-lg rounded-4">
        <div class="card-header bg-red text-white text-center rounded-top-4">
          <h4 class="mb-0">Form Login</h4>
        </div>
        <div class="card-body">

          <form action="<?= site_url('auth/login') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Masukkan email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-red w-100 fw-bold rounded-4">Login</button>
          </form>
        </div>
        <div class="card-footer text-center bg-white border-0">
          <p class="mb-0">Belum punya akun? 
            <a href="<?= site_url('register') ?>" class="fw-bold">Daftar</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->include('layout/footer') ?>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($login_success) && $login_success): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil Login!',
    text: 'Selamat datang, <?= esc($nama_user) ?>',
    confirmButtonColor: '#7a0000',
  }).then(() => {
    window.location.href = "<?= site_url('pemilu') ?>"; // redirect setelah OK
  });
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '<?= session()->getFlashdata('success') ?>',
    confirmButtonColor: '#7a0000',
  });
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops!',
    text: '<?= session()->getFlashdata('error') ?>',
    confirmButtonColor: '#7a0000',
  });
</script>
<?php endif; ?>
