<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg rounded-4">
        <div class="card-header bg-red text-white text-center rounded-top-4">
          <h4 class="mb-0">Profil Saya</h4>
        </div>
        <div class="card-body">

          <!-- Form Update Profil -->
          <form action="<?= site_url('profil/update') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Foto Profil -->
            <div class="mb-4 text-center position-relative d-flex justify-content-center">
              <?php if (!empty($user['foto'])): ?>
                <img src="<?= base_url('uploads/'.$user['foto']) ?>" 
                     alt="Foto Profil" 
                     class="rounded-circle" 
                     id="profileImage" 
                     style="width:120px; height:120px; object-fit:cover; border:2px solid #ccc;">
              <?php else: ?>
                <div id="profileImage" 
                     class="rounded-circle d-flex align-items-center justify-content-center" 
                     style="width:120px; height:120px; background-color:#f0f0f0; border:2px solid #ccc; font-size:40px; color:#888;">
                  <i class="bi bi-person-fill"></i>
                </div>
              <?php endif; ?>
              
              <!-- Icon upload foto -->
              <label for="fotoInput" 
                     class="position-absolute" 
                     style="bottom:0; left:50%; transform:translateX(20px); cursor:pointer; background-color:white; border-radius:50%; padding:5px; border:1px solid #ccc;">
                <i class="bi bi-pencil-fill text-dark"></i>
              </label>
              <input type="file" id="fotoInput" name="foto" accept="image/*" style="display:none;">
            </div>

            <!-- Nama Lengkap -->
            <div class="mb-3 position-relative">
              <label for="nama_user" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control rounded-3" id="nama_user" name="nama_user" 
                     value="<?= esc($user['nama_user'] ?? '') ?>" required>
              <span class="position-absolute" style="right: 10px; top: 38px; cursor:pointer;">
                <i class="bi bi-pencil-fill"></i>
              </span>
            </div>

            <!-- Email -->
            <div class="mb-3 position-relative">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control rounded-3" id="email" name="email" 
                     value="<?= esc($user['email'] ?? '') ?>" required>
              <span class="position-absolute" style="right: 10px; top: 38px; cursor:pointer;">
                <i class="bi bi-pencil-fill"></i>
              </span>
            </div>

            <!-- Dapil -->
            <div class="mb-3">
              <label for="dapil_user" class="form-label">Dapil</label>
              <select class="form-control rounded-3" id="dapil_user" name="dapil_user" required>
                <option value="">-- Pilih Dapil --</option>
                <?php 
                  $dapils = [
                    '1' => 'Dapil 1 - Jakarta Pusat',
                    '2' => 'Dapil 2 - Kepulauan Seribu & Jakarta Utara',
                    '3' => 'Dapil 3 - Jakarta Utara',
                    '4' => 'Dapil 4 - Jakarta Timur',
                    '5' => 'Dapil 5 - Jakarta Timur',
                    '6' => 'Dapil 6 - Jakarta Timur',
                    '7' => 'Dapil 7 - Jakarta Selatan',
                    '8' => 'Dapil 8 - Jakarta Selatan',
                    '9' => 'Dapil 9 - Jakarta Barat',
                    '10'=> 'Dapil 10 - Jakarta Barat',
                  ];
                  foreach ($dapils as $key => $val): ?>
                    <option value="<?= $key ?>" <?= ($user['dapil_user'] ?? '') == $key ? 'selected' : '' ?>>
                      <?= $val ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>

            <button type="submit" class="btn btn-red w-100 fw-bold rounded-4">Simpan Perubahan</button>
          </form>

          <!-- Form Hapus Foto (SweetAlert Confirm) -->
          <?php if (!empty($user['foto'])): ?>
            <div class="text-center mt-3">
              <form id="hapusFotoForm" action="<?= site_url('profil/hapusFoto') ?>" method="post">
                <?= csrf_field() ?>
                <button type="button" id="hapusFotoBtn" class="btn btn-outline-danger btn-sm rounded-3">
                  <i class="bi bi-trash"></i> Hapus Foto
                </button>
              </form>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->include('layout/footer') ?>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('success')): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '<?= session()->getFlashdata('success') ?>',
    confirmButtonColor: '#7a0000',
  });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops!',
    text: '<?= session()->getFlashdata('error') ?>',
    confirmButtonColor: '#7a0000',
  });
</script>
<?php endif; ?>

<!-- SweetAlert konfirmasi hapus foto -->
<script>
  const hapusFotoBtn = document.getElementById('hapusFotoBtn');
  const hapusFotoForm = document.getElementById('hapusFotoForm');

  if (hapusFotoBtn) {
    hapusFotoBtn.addEventListener('click', function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Yakin hapus foto?',
        text: "Foto profil kamu akan dihapus permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7a0000',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          hapusFotoForm.submit();
        }
      });
    });
  }
</script>

<!-- Preview foto saat pilih file -->
<script>
  const fotoInput = document.getElementById('fotoInput');
  const profileImage = document.getElementById('profileImage');

  if (fotoInput) {
    fotoInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          if (profileImage.tagName === 'IMG') {
            profileImage.src = e.target.result;
          } else {
            profileImage.innerHTML = '';
            profileImage.style.backgroundImage = `url(${e.target.result})`;
            profileImage.style.backgroundSize = 'cover';
            profileImage.style.backgroundPosition = 'center';
          }
        }
        reader.readAsDataURL(file);
      }
    });
  }
</script>
