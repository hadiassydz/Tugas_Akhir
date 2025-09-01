<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<div class="hero-section text-center py-5 bg-light">
  <h1>Pemilu DPRD DKI Jakarta 2024</h1>
  <h2>Daftar Partai Peserta Pemilu</h2>
</div>

<div class="container mt-5">
  <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- 3 kolom per baris di desktop -->
    <?php foreach ($partai as $p): ?>
      <div class="col">
        <div class="card shadow-sm h-100 rounded-4 overflow-hidden text-center">
          <img src="<?= base_url('images/' . $p['image']); ?>" 
               alt="<?= $p['nama_partai']; ?>" 
               class="card-logo"
               style="height: 200px; width: auto; object-fit: contain; margin: auto; padding: 10px; background-color: white;">
          <div class="card-body">
            <h5 class="card-title fw-bold"><?= $p['nama_partai']; ?></h5>
            <p class="mb-1 text-muted">No. Urut: <?= $p['no_urut']; ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->include('layout/footer') ?>
