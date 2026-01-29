<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Data Transaksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Data Transaksi</h1>
    <a href="/transaksi/create" class="btn btn-primary">Tambah Transaksi</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Petani</th>
                    <th>Jenis Sawit</th>
                    <th>Berat (kg)</th>
                    <th>Harga Snapshot</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $key => $t): ?>
                    <tr>
                        <td>
                            <?= $key + 1 ?>
                        </td>
                        <td>
                            <?= date('d-m-Y', strtotime($t->tanggal)) ?>
                        </td>
                        <td>
                            <?= esc($t->nama_petani) ?>
                        </td>
                        <td>
                            <?= esc($t->jenis_sawit) ?>
                        </td>
                        <td>
                            <?= $t->berat_kg ?> kg
                        </td>
                        <td>Rp
                            <?= number_format($t->harga_per_kg, 0, ',', '.') ?> (Disc:
                            <?= $t->potongan_persen ?>%)
                        </td>
                        <td>Rp
                            <?= number_format($t->subtotal, 0, ',', '.') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>