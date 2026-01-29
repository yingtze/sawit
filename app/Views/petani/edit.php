<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Edit Petani
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Edit Data Petani</h5>
            </div>
            <div class="card-body">
                <form action="/petani/update/<?= $petani->id ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label>Nama Petani</label>
                        <input type="text" name="nama_petani" class="form-control" required
                            value="<?= old('nama_petani', $petani->nama_petani) ?>">
                    </div>
                    <div class="mb-3">
                        <label>Alamat Petani</label>
                        <textarea name="alamat_petani" class="form-control"
                            required><?= old('alamat_petani', $petani->alamat_petani) ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/petani" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>