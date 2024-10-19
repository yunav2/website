<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah Barang</button>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="3">Action</th>
        </tr>
        
        <?php 
        $no = 1;
        foreach ($barang as $brg) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $brg->nama_barang ?></td>
            <td><?php echo $brg->keterangan ?></td>
            <td><?php echo $brg->kategori ?></td>
            <td><?php echo $brg->harga ?></td>
            <td><?php echo $brg->stok ?></td>
            <td><?php echo anchor('admin/data_barang/detail/' . $brg->id_barang, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_barang/edit/' . $brg->id_barang, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_barang/hapus/' . $brg->id_barang, '<id_barangiv class="btn btn-id_baranganger btn-sm"><i class="fas fa-trash"></i></id_barangiv>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">Add</div>
    <div class="modal-dialog" role="document">
        <div class="modal-content"></div>
            <div class="modal-header">