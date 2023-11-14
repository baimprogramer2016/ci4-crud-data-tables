<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>


<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h1 class='mt-3'><?= $title; ?></h1>
            <div class="container">
                <table class="table table-striped" id="example">
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
                                <td>''</td>
                                <td><?= $item_user['nama']; ?></td>
                                <td><?= $item_user['alamat']; ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(" #example").DataTable()
    });
</script>
<?= $this->endSection('content') ?>