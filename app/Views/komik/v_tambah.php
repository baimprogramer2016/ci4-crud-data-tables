<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class='mt-3'><?= $title; ?></h1>
            <a href="<?= base_url('komik'); ?>" class="btn btn-success btn-sm  mb-3">Kembali</a>
            <?php
            // echo validation_list_errors();
            $errors = validation_errors();

            ?>
            <?= form_open_multipart('komik/save'); ?>

            <div class=" mb-3">
                <label for="judul" name="judul" class="form-label">Judul</label>
                <input type="text" class="form-control <?= (!empty($errors['judul'])) ? 'is-invalid' : '' ?>" value="<?= old('judul') ?>" name="judul" id="judul" aria-describedby="emailHelp">
                <?php if (!empty($errors['judul'])) { ?>
                    <div class="invalid-feedback">
                        <?php echo $errors['judul']; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control <?= (!empty($errors['penulis'])) ? 'is-invalid' : '' ?>" value="<?= old('penulis') ?>" id="penulis">
                <?php if (!empty($errors['penulis'])) { ?>
                    <div class="invalid-feedback">
                        <?php echo $errors['penulis']; ?>
                    </div>
                <?php } ?>
            </div>

            <div class="mb-3 row">
                <label for="formFile" class="col-sm-2 form-label">Upload Sampul</label>
                <div class="col-sm-2">
                    <img width=70 src="/img/no_image.png" alt="" class="img-thumbnail img-preview">
                </div>
                <div class="form-group col-sm-8">
                    <input name="sampul" class="form-control <?= (!empty($errors['sampul'])) ? 'is-invalid' : '' ?>" value="<?= old('sampul') ?>" type="file" id="sampul" onChange="previewImg()">
                    <?php if (!empty($errors['sampul'])) { ?>
                        <div class="invalid-feedback">
                            <?php echo $errors['sampul']; ?>
                        </div>
                    <?php } ?>
                    <label for="Sampul" class="custom-file-label">Pilih Gambar</label>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <?= form_close(); ?>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>