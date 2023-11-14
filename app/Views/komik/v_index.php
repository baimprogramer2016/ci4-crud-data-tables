<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="<?= base_url('komik/create'); ?>" class="btn btn-primary btn-sm  mt-3">Tambah</a>
            <h1 class='mt-3'>Daftar Komik</h1>
            <?php
            if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success alert-sm"><?= session()->getFlashdata('message'); ?></div>
            <?php
            endif;
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope='col'>No</th>
                        <th scope='col'>Sampul</th>
                        <th scope='col'>Judul</th>
                        <th scope='col'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($data_komik as $item_komik) { ?>
                        <tr>
                            <td scope='row'><?= $i++; ?></td>
                            <td><img src='/img/<?= $item_komik['sampul']; ?>' alt="tes" class="sampul"></td>
                            <td><?= $item_komik['judul']; ?></td>
                            <td><a href="<?= base_url('komik/' . $item_komik['slug']); ?>" class='btn btn-success btn-sm'>Detail</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>