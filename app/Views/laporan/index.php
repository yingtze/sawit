<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Laporan Penjualan
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="" method="get" class="row align-items-end">
            <div class="col-md-3">
                <label>Dari Tanggal</label>
                <input type="date" name="start_date" class="form-control" value="<?= $start_date ?>">
            </div>
            <div class="col-md-3">
                <label>Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-control" value="<?= $end_date ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col-md-2">
                <a href="/laporan" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-success text-white text-center">
        <h3>Laporan Penjualan Kelapa Sawit</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Petani</th>
                        <th>Alamat</th>
                        <th>Jenis Buah</th>
                        <th>Harga Jual</th>
                        <th>Berat (Kg)</th>
                        <th>Potongan (Rp)</th>
                        <th>Total (Rp)</th>
                        <th>Bonus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_semua = 0;
                    foreach ($laporan as $key => $row):
                        $kotor = $row->harga_per_kg * $row->berat_kg;
                        $potonganValue = $kotor * ($row->potongan_persen / 100);
                        $total_semua += $row->subtotal;
                        ?>
                        <tr>
                            <td>
                                <?= $key + 1 ?>
                            </td>
                            <td>
                                <?= tgl_indo($row->tanggal) ?>
                            </td>
                            <td>
                                <?= esc($row->nama_petani) ?>
                            </td>
                            <td>
                                <?= esc($row->alamat_petani) ?>
                            </td>
                            <td>
                                <?= esc($row->jenis_sawit) ?>
                            </td>
                            <td>
                                <?= rupiah($row->harga_per_kg) ?>
                            </td>
                            <td>
                                <?= $row->berat_kg ?>
                            </td>
                            <td>
                                <?= rupiah($potonganValue) ?> (
                                <?= $row->potongan_persen ?>%)
                            </td>
                            <td>
                                <?= rupiah($row->subtotal) ?>
                            </td>
                            <td>
                                <?= $row->getBonus() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="fw-bold bg-light">
                        <td colspan="8" class="text-end">Grand Total</td>
                        <td colspan="2">
                            <?= rupiah($total_semua) ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5 text-end">
            <p>Pekanbaru,
                <?= tgl_indo(date('Y-m-d')) ?>
            </p>
            <br><br>
            <p class="fw-bold">Manager Perusahaan</p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>