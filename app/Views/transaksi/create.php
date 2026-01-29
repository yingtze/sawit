<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Tambah Transaksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Input Transaksi Baru</h5>
            </div>
            <div class="card-body">
                <form action="/transaksi/store" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="mb-3">
                        <label>Nama Petani</label>
                        <select name="petani_id" class="form-select" required>
                            <option value="">-- Pilih Petani --</option>
                            <?php foreach ($petani as $p): ?>
                                <option value="<?= $p->id ?>">
                                    <?= esc($p->nama_petani) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Sawit</label>
                        <select name="sawit_id" class="form-select" required>
                            <option value="">-- Pilih Jenis Sawit --</option>
                            <?php foreach ($sawit as $s): ?>
                                <option value="<?= $s->id ?>">
                                    <?= esc($s->jenis_sawit) ?> (Rp
                                    <?= number_format($s->harga_per_kg) ?>/kg)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Berat (Kg)</label>
                        <input type="number" step="0.01" name="berat_kg" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                    <a href="/transaksi" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>