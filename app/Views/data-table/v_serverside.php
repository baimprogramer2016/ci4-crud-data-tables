<?php

use App\Controllers\DataTableExample;
?>
<?= $this->extend('layout/v_template'); ?>

<?= $this->section('content'); ?>


<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h1 class='mt-3'><?= $title; ?></h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Pencarian</span>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Berdasarkan Nama" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Berdasarkan Alamat" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <table class="table table-sm table-bordered " id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        <tr>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th class="filterhead"></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url: '<?= base_url('DataTableExample/ApiServerSide'); ?>',
                data: function(d) {
                    d.nama = $('#nama').val();
                    d.alamat = $('#alamat').val();
                }
            },
            order: [],
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'alamat'
                },
                {
                    data: 'action',
                    orderable: false
                },
            ],
            initComplete: function(settings, json) {

                var indexColumn = 0;

                this.api().columns().every(function() {

                    var column = this;
                    var input = document.createElement("input");

                    $(input).attr('placeholder', 'Search')
                        .addClass('form-control form-control-sm')
                        .appendTo($('.filterhead:eq(' + indexColumn + ')').empty())
                        .on('keyup', function() {
                            column.search($(this).val(), false, false, true).draw();
                        });

                    indexColumn++;
                });
            }
        });
        $('#nama').keyup(function(event) {
            table.ajax.reload();
        });
        $('#alamat').keyup(function(event) {
            table.ajax.reload();
        });
    });
</script>
<?= $this->endSection('content') ?>