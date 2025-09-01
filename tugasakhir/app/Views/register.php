<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg rounded-4">
        <div class="card-header bg-red text-white text-center rounded-top-4">
            <h4 class="mb-0">Form Registrasi</h4>
        </div>

        <div class="card-body">
          <!-- Pesan error / sukses -->
          <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
          <?php endif; ?>
          <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
          <?php endif; ?>

          <form action="<?= site_url('auth/register') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
              <label for="nama_user" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control rounded-3" id="nama_user" name="nama_user" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Masukkan email" required>
            </div>

            <div class="mb-3">
            <label for="dapil_user" class="form-label">Dapil</label>
            <select class="form-control rounded-3" id="dapil_user" name="dapil_user" required>
                <option value="">-- Pilih Dapil --</option>
                <option value="1">Dapil 1 - Jakarta Pusat</option>
                <option value="2">Dapil 2 - Kepulauan Seribu & Jakarta Utara</option>
                <option value="3">Dapil 3 - Jakarta Utara</option>
                <option value="4">Dapil 4 - Jakarta Timur</option>
                <option value="5">Dapil 5 - Jakarta Timur</option>
                <option value="6">Dapil 6 - Jakarta Timur</option>
                <option value="7">Dapil 7 - Jakarta Selatan</option>
                <option value="8">Dapil 8 - Jakarta Selatan</option>
                <option value="9">Dapil 9 - Jakarta Barat</option>
                <option value="10">Dapil 10 - Jakarta Barat</option>
            </select>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Buat password" required>
            </div>

            <div class="mb-3">
              <label for="confirm_password" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control rounded-3" id="confirm_password" name="confirm_password" placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn btn-red w-100 fw-bold rounded-4">Daftar</button>
          </form>
        </div>
        <div class="card-footer text-center bg-white border-0">
          <p class="mb-0">Sudah punya akun? 
            <a href="<?= site_url('login') ?>" class="fw-bold">Login</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
