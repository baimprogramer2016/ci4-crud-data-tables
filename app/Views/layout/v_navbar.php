<nav class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="container">
        <a class="navbar-brand" href="#">Belajar CI-4</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url('Pages') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Pages/about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/komik'); ?>">Komik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/user'); ?>">Paginate</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data table
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('/data-table-simple'); ?>">Simple</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('/data-table-server-side'); ?>">Server Side (hermawan)</a></li>
                    </ul>
                </li>

        </div>
    </div>

</nav>