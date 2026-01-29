<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Data Sawit
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Data Sawit</h1>
    <a href="/sawit/create" class="btn btn-primary">Tambah Data Sawit</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Sawit</th>
                    <th>Harga (Rp / kg)</th>
                    <th>Potongan (%)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sawit as $key => $s): ?>
                    <tr>
                        <td>
                            <?= $key + 1 ?>
                        </td>
                        <td>
                            <?= esc($s->jenis_sawit) ?>
                        </td>
                        <td>Rp
                            <?= number_format($s->harga_per_kg, 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= $s->potongan_persen ?>%
                        </td>
                        <td>
                            <a href="/sawit/edit/<?= $s->id ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/sawit/delete/<?= $s->id ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>