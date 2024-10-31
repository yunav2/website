<div class="container-fluid">
    <h3><i class="fas fa-sm fa-pencil-alt"></i> Product Edit</h3>

    <?php foreach ($barang as $brg) : ?>
        <form method="post" action="<?= base_url('') . 'admin/data_barang/update' ?>">

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input class="form-control" type="text" name="nama_barang" id="nama_barang" autocomplete="off" value="<?php echo $brg['nama_barang']; ?>">
                <input class="form-control" type="hidden" name="id_barang" value="<?= $brg['id_barang'] ?>">
            </div>
            <div class="form-group">
                <label for="keterangan_barang">Keterangan</label>
                <input class="form-control" type="text" name="keterangan" id="keterangan" autocomplete="off" value="<?= $brg['keterangan'] ?>">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="custom-select" name="kategori" id="kategori" value="<?= $brg['kategori'] ?>">
                    <option value="Electronics">Electronics</option>
                    <option value="Clothes">Clothes</option>
                    <option value="Sports">Sports</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-8">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input name="harga" type="text" class="form-control" placeholder="Harga" autocomplete="off" value="<?= $brg['harga'] ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <input name="stok" type="text" class="form-control" placeholder="Stok" autocomplete="off" value="<?= $brg['stok'] ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    <?php endforeach; ?>
</div>