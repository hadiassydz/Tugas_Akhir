<?= $this->include('layout/header') ?>
<?= $this->include('layout/navbar') ?>

<div class="container-fluid mt-4">
    <h2 class="text-center mb-4">Dashboard Clustering</h2>

    <div class="row">
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card dashboard-card">
                <div class="card-header" style="background: linear-gradient(135deg, #6f42c1 0%, #8e44ad 100%); color: white;">
                    <h5 class="mb-0"><i class="bi bi-diagram-3-fill me-2"></i>Hasil Clustering (PCA 2D)</h5>
                </div>
                <div class="card-body p-0">
                    <iframe src="http://127.0.0.1:5000/clustering_results" class="dashboard-iframe" frameborder="0"></iframe>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card dashboard-card">
                <div class="card-header" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white;">
                    <h5 class="mb-0"><i class="bi bi-graph-up me-2"></i>Validasi Internal Clustering</h5>
                </div>
                <div class="card-body p-0">
                    <iframe src="http://127.0.0.1:5000/cluster_validation" class="dashboard-iframe" frameborder="0"></iframe>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card dashboard-card" style="height: 500px;">
                <div class="card-header" style="background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); color: white;">
                    <h5 class="mb-0"><i class="bi bi-pie-chart-fill me-2"></i>Analisis Cluster per Dapil & Partai</h5>
                </div>
                <div class="card-body p-0">
                    <iframe src="http://127.0.0.1:5000/cluster_analysis" class="dashboard-iframe" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>
