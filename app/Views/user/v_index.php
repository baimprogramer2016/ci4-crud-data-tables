<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h1 class='mt-3'><?= $title; ?></h1>
            <div class="col-md-4">
                <?= form_open(); ?>
                <div class=" input-group mb-3">
                    <input type="text" class="form-control d-inline" name='cari' placeholder="Cari" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary " type="submit" id="button-addon2">Cari</button>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_user as $key => $item_user) : ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $item_user['nama']; ?></td>
                                <td><?= $item_user['alamat']; ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('user', 'custom_page'); ?>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection('content') ?>