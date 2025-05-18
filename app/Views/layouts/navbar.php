<div id="nav">
    <!-- Top Nav -->
    <div id="nav-top">
        <div class="container">
            <!-- social -->
            <ul class="nav-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <!-- /social -->

            <!-- logo -->
            <div class="nav-logo">
                <a href="index.html" class="logo"><img src="<?= base_url('assets/Trending only.png'); ?>" alt=""></a>
            </div>
            <!-- /logo -->

            <!-- search & aside toggle -->
            <div class="nav-btns">
                <button class="aside-btn"><i class="fa fa-bars"></i></button>
                <button class="search-btn"><i class="fa fa-search"></i></button>
                <div id="nav-search">
                    <form>
                        <input class="input" name="search" placeholder="Enter your search..." disabled>
                    </form>
                    <button class="nav-close search-close">
                        <span></span>
                    </button>
                </div>
            </div>
            <!-- /search & aside toggle -->
        </div>
    </div>
    <!-- /Top Nav -->

    <!-- Main Nav -->
    <div id="nav-bottom">
        <div class="container">
            <!-- nav -->
            <ul class="nav-menu">
                <li>
                    <a href="<?= base_url() ?>">Beranda</a>
                </li>

                <?php
                // Tampilkan 3 kategori utama
                $topCategories = array_slice($allKategoris, 0, 3);
                foreach ($topCategories as $item): ?>
                    <li><a href="<?= base_url($item['kategori']['slug_id']); ?>">
                            <?= $item['kategori']['nama_kategori_id'] ?>
                        </a></li>
                <?php endforeach; ?>

                <li class="has-dropdown megamenu">
                    <a href="#">Kategori Lainnya</a>
                    <div class="dropdown">
                        <div class="dropdown-body">
                            <div class="row">
                                <?php
                                // Ambil semua kategori kecuali 3 pertama
                                $remainingCategories = array_slice($allKategoris, 3);
                                // Bagi menjadi 4 kolom
                                $chunks = array_chunk($remainingCategories, ceil(count($remainingCategories) / 4));
                                foreach ($chunks as $column): ?>
                                    <div class="col-md-3">
                                        <ul class="dropdown-list">
                                            <?php foreach ($column as $item): ?>
                                                <li>
                                                    <a href="<?= base_url($item['kategori']['slug_id']) ?>">
                                                        <?= $item['kategori']['nama_kategori_id'] ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- /nav -->
        </div>
    </div>
    <!-- /Main Nav -->

    <!-- Aside Nav -->
    <div id="nav-aside">
        <ul class="nav-aside-menu">
            <li><a href="<?= base_url() ?>">Beranda</a></li>

            <?php
            // Show the same top 3 categories as in main nav
            $topCategories = array_slice($allKategoris, 0, 3);
            foreach ($topCategories as $item): ?>
                <li><a href="<?= base_url($item['kategori']['slug_id']); ?>">
                        <?= $item['kategori']['nama_kategori_id'] ?>
                    </a></li>
            <?php endforeach; ?>

            <li class="has-dropdown">
                <a>Kategori Lainnya</a>
                <ul class="dropdown">
                    <?php
                    // Show all remaining categories in a single column
                    $remainingCategories = array_slice($allKategoris, 3);
                    foreach ($remainingCategories as $item): ?>
                        <li>
                            <a href="<?= base_url($item['kategori']['slug_id']) ?>">
                                <?= $item['kategori']['nama_kategori_id'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
        <button class="nav-close nav-aside-close"><span></span></button>
    </div>
    <!-- /Aside Nav -->
</div>