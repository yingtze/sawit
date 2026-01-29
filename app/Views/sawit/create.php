<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Tambah Data Sawit
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Data Sawit</h5>
            </div>
            <div class="card-body">
                <form action="/sawit/store" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label>Jenis Sawit</label>
                        <input type="text" name="jenis_sawit" class="form-control" required
                            value="<?= old('jenis_sawit') ?>">
                    </div>
                    <div class="mb-3">
                        <label>Harga per Kg (Rp)</label>
                        <input type="number" name="harga_per_kg" class="form-control" required
                            value="<?= old('harga_per_kg') ?>">
                    </div>
                    <div class="mb-3">
                        <label>Potongan (%)</label>
                        <input type="number" step="0.01" name="potongan_persen" class="form-control" required
                            value="<?= old('potongan_persen') ?>">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="/sawit" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>