<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Data Petani
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Data Petani</h1>
    <a href="/petani/create" class="btn btn-primary">Tambah Petani</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Petani</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($petani as $key => $p): ?>
                    <tr>
                        <td>
                            <?= $key + 1 ?>
                        </td>
                        <td>
                            <?= esc($p->nama_petani) ?>
                        </td>
                        <td>
                            <?= esc($p->alamat_petani) ?>
                        </td>
                        <td>
                            <a href="/petani/edit/<?= $p->id ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/petani/delete/<?= $p->id ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>