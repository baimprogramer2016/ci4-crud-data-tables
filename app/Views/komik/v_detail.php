<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class='mt-3'>Komik </h1>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $data_komik['sampul']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data_komik['judul']; ?></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text">Penulis By : <small class="text-body-secondary"><?= $data_komik['penulis']; ?></small></p>

                            <div class="mt-5">
                                <a href="<?= base_url('komik/edit/' . $data_komik['slug']); ?> " class="btn btn-primary btn-sm">Edit</a>
                                <form action="<?= base_url('komik/' . $data_komik['id']); ?>" class="d-inline" method="POST">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?');">Delete</button>
                                </form>
                                <a href="<?= base_url('komik'); ?>" class="btn btn-success btn-sm">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>