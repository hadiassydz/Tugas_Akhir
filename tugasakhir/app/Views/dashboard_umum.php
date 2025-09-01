<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<div class="container-fluid mt-4">
    <h2 class="text-center mb-4">Dashboard Pemilu DKI Jakarta</h2>
    
    <!-- Card Statistik -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card bg-red text-white">
                <div class="card-body text-center">
                    <div class="stat-icon">
                        <i class="bi bi-flag-fill"></i>
                    </div>
                    <h3 class="stat-number">24</h3>
                    <p class="stat-label">Total Partai</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card bg-success text-white">
                <div class="card-body text-center">
                    <div class="stat-icon">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>
                    <h3 class="stat-number">5</h3>
                    <p class="stat-label">Jenis Ideologi</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card bg-warning text-white">
                <div class="card-body text-center">
                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h3 class="stat-number">3</h3>
                    <p class="stat-label">Koalisi Besar</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card bg-info text-white">
                <div class="card-body text-center">
                    <div class="stat-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h3 class="stat-number">10</h3>
                    <p class="stat-label">Total Dapil</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Grid 2x2 Pertama -->
    <div class="row mb-4">
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card dashboard-card">
                <div class="card-header bg-red text-white">
                    <h5 class="mb-0"><i class="bi bi-bar-chart-fill me-2"></i>Distribusi Suara</h5>
                </div>
                <div class="card-body p-0">
                    <iframe src="http://127.0.0.1:5000/suara" 
                            class="dashboard-iframe" 
                            frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card dashboard-card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-trophy-fill me-2"></i>Top 10 Partai</h5>
                </div>
                <div class="card-body p-0">
                    <iframe src="http://127.0.0.1:5000/top_partai" 
                            class="dashboard-iframe" 
                            frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card dashboard-card">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0"><i class="bi bi-lightbulb-fill me-2"></i>Distribusi Ideologi</h5>
                </div>
                <div class="card-body p-0">
                    <iframe src="http://127.0.0.1:5000/ideologi" 
                            class="dashboard-iframe" 
                            frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card dashboard-card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="bi bi-people-fill me-2"></i>Distribusi Koalisi</h5>
                </div>
                <div class="card-body p-0">
                    <iframe src="http://127.0.0.1:5000/koalisi" 
                            class="dashboard-iframe" 
                            frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>