<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="py-4">
    <h1>Selamat Datang, <?= session()->get('username') ?></h1>
    <p>Anda berhasil login ke sistem.</p>
</div>
<?= $this->endSection() ?>