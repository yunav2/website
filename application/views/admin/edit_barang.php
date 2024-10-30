<div class="container-fluid">
    <h3><i class="fas fa-edit">Edit Barang</i></h3>

    <?php foreach ($barang as $brg) : ?>

    <form action="<?php echo base_url(). 'admin/data_barang/update'; ?>" method="post">
        <div class="form-group"></div>
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?php echo $brg->nama_barang ?>">

            <div class="form-group"></div>
            <label>Keterangan</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $brg->id_barang ?>">
        </div>
</div>