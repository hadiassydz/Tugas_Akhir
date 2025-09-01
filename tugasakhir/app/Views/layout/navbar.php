<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container px-4">
    <!-- Logo -->
    <div class="d-flex align-items-center">
      <img src="<?= base_url('images/kpu.png') ?>" alt="Logo KPU" style="height: 48px; margin-right: 10px;">
      <img src="<?= base_url('images/dprd.png') ?>" alt="Logo DPRD" style="height: 48px;">
    </div>

    <!-- Toggle Button Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php 
        $uri = service('uri')->getSegment(1); 
      ?>

      <?php if (!in_array($uri, ['register', 'login'])): ?>
        <ul class="navbar-nav ms-auto fw-bold">
          <li class="nav-item">
            <a class="nav-link <?= ($uri == 'beranda') ? 'active' : '' ?>" href="<?= base_url('beranda') ?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($uri == 'dashboard_umum') ? 'active' : '' ?>" href="<?= base_url('dashboard_umum') ?>">Dashboard Umum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($uri == 'dashboard_analisis') ? 'active' : '' ?>" 
              href="<?= base_url('dashboard_analisis') ?>">Dashboard Clustering</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($uri == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">Peta DPT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($uri == 'profil') ? 'active' : '' ?>" href="<?= base_url('profil') ?>">Profil</a>
          </li>
          <li class="nav-item">
          <a class="nav-link text-danger" href="#" id="logoutBtn">Logout</a>
        </li>

        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>

<script>
  const navbar = document.querySelector('.custom-navbar');
  if (navbar) {
    const sticky = navbar.offsetTop;
    window.addEventListener('scroll', function() {
      if (window.pageYOffset > sticky) {
        navbar.classList.add('sticky');
      } else {
        navbar.classList.remove('sticky');
      }
    });
  }
</script>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('logoutBtn').addEventListener('click', function(e) {
  e.preventDefault(); // mencegah langsung redirect
  Swal.fire({
    title: 'Yakin ingin logout?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#7a0000',
    cancelButtonColor: '#aaa',
    confirmButtonText: 'Ya, logout',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "<?= base_url('logout') ?>"; // redirect ke logout
    }
  });
});
</script>