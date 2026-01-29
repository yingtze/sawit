<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold">Aplikasi Penjualan Sawit</h1>
        <p class="fs-5">Aplikasi Pengelolaan Laporan Penjualan Sawit</p>
        <div class="d-flex justify-content-center gap-2 mt-4">
            <a class="btn btn-primary btn-lg" href="/petani">Data Petani</a>
            <a class="btn btn-info btn-lg text-white" href="/sawit">Data Sawit</a>
            <a class="btn btn-danger btn-lg" href="/transaksi/create">Tambah Data Transaksi</a>
            <a class="btn btn-success btn-lg" href="/laporan">Laporan</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>