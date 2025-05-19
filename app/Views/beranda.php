<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="section">
    <!-- container -->
    <?php
    // Mengambil data artikel terbaru dari 4 jam terakhir
    $db = \Config\Database::connect();
    $fourHoursAgo = date('Y-m-d H:i:s', strtotime('-4 hours'));

    $builder = $db->table('tb_artikel');
    $builder->select('tb_artikel.*, tb_users.nama_lengkap, tb_kategori.nama_kategori_id as nama_kategori_id');
    $builder->join('tb_users', 'tb_users.id_user = tb_artikel.id_user');
    $builder->join('tb_kategori', 'tb_kategori.id_kategori = tb_artikel.id_kategori', 'left');
    $builder->where('tb_artikel.published_at >=', $fourHoursAgo);
    $builder->orderBy('tb_artikel.published_at', 'DESC');
    $recentArticles = $builder->get()->getResultArray();
    ?>

    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            <?php if (!empty($latestArticles)): ?>
                <div class="col-md-8 hot-post-left">
                    <!-- post -->
                    <div class="post post-thumb">
                        <a class="post-img" href="/<?= $lang; ?>/<?= $lang === 'en' ? $latestArticles[0]['kategori']['slug_en'] : $latestArticles[0]['kategori']['slug_id']; ?>/<?= $lang === 'en' ? $latestArticles[0]['slug_en'] : $latestArticles[0]['slug_id']; ?>">
                            <img src="<?= base_url('uploads/' . $latestArticles[0]['thumbnail']); ?>" alt="<?= $lang === 'en' ? $latestArticles[0]['judul_en'] : $latestArticles[0]['judul_id']; ?>">
                        </a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="/<?= $lang; ?>/kategori/<?= $lang === 'en' ? $latestArticles[0]['kategori']['slug_en'] : $latestArticles[0]['kategori']['slug_id']; ?>">
                                    <?= $lang === 'en' ? $latestArticles[0]['kategori']['nama_kategori_en'] : $latestArticles[0]['kategori']['nama_kategori_id']; ?>
                                </a>
                            </div>
                            <h3 class="post-title title-lg">
                                <a href="/<?= $lang; ?>/<?= $lang === 'en' ? $latestArticles[0]['kategori']['slug_en'] : $latestArticles[0]['kategori']['slug_id']; ?>/<?= $lang === 'en' ? $latestArticles[0]['slug_en'] : $latestArticles[0]['slug_id']; ?>">
                                    <?= $lang === 'en' ? $latestArticles[0]['judul_en'] : $latestArticles[0]['judul_id']; ?>
                                </a>
                            </h3>
                            <div class="article-meta">
                                <span class="author"><?= htmlspecialchars($latestArticles[0]['nama_lengkap'] ?? '', ENT_QUOTES) ?></span>
                                <span class="publish-date"><?= date('d F Y', strtotime($latestArticles[0]['published_at'])) ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                </div>

                <div class="col-md-4 hot-post-right">
                    <!-- post -->
                    <?php $secondArticle = count($latestArticles) > 1 ? $latestArticles[1] : $latestArticles[0]; ?>
                    <div class="post post-thumb">
                        <a class="post-img" href="/<?= $lang; ?>/<?= $lang === 'en' ? $secondArticle['kategori']['slug_en'] : $secondArticle['kategori']['slug_id']; ?>/<?= $lang === 'en' ? $secondArticle['slug_en'] : $secondArticle['slug_id']; ?>">
                            <img src="<?= base_url('uploads/' . $secondArticle['thumbnail']); ?>" alt="<?= $lang === 'en' ? $secondArticle['judul_en'] : $secondArticle['judul_id']; ?>">
                        </a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="/<?= $lang; ?>/kategori/<?= $lang === 'en' ? $secondArticle['kategori']['slug_en'] : $secondArticle['kategori']['slug_id']; ?>">
                                    <?= $lang === 'en' ? $secondArticle['kategori']['nama_kategori_en'] : $secondArticle['kategori']['nama_kategori_id']; ?>
                                </a>
                            </div>
                            <h3 class="post-title">
                                <a href="/<?= $lang; ?>/<?= $lang === 'en' ? $secondArticle['kategori']['slug_en'] : $secondArticle['kategori']['slug_id']; ?>/<?= $lang === 'en' ? $secondArticle['slug_en'] : $secondArticle['slug_id']; ?>">
                                    <?= $lang === 'en' ? $secondArticle['judul_en'] : $secondArticle['judul_id']; ?>
                                </a>
                            </h3>
                            <div class="article-meta">
                                <span class="author"><?= htmlspecialchars($secondArticle['nama_lengkap'] ?? '', ENT_QUOTES) ?></span>
                                <span class="publish-date"><?= date('d F Y', strtotime($secondArticle['published_at'])) ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <?php
                    $thirdArticle = count($latestArticles) > 2
                        ? $latestArticles[2]
                        : (count($latestArticles) > 1
                            ? $latestArticles[1]
                            : $latestArticles[0]);
                    ?>
                    <div class="post post-thumb">
                        <a class="post-img" href="/<?= $lang; ?>/<?= $lang === 'en' ? $thirdArticle['kategori']['slug_en'] : $thirdArticle['kategori']['slug_id']; ?>/<?= $lang === 'en' ? $thirdArticle['slug_en'] : $thirdArticle['slug_id']; ?>">
                            <img src="<?= base_url('uploads/' . $thirdArticle['thumbnail']); ?>" alt="<?= $lang === 'en' ? $thirdArticle['judul_en'] : $thirdArticle['judul_id']; ?>">
                        </a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="/<?= $lang; ?>/kategori/<?= $lang === 'en' ? $thirdArticle['kategori']['slug_en'] : $thirdArticle['kategori']['slug_id']; ?>">
                                    <?= $lang === 'en' ? $thirdArticle['kategori']['nama_kategori_en'] : $thirdArticle['kategori']['nama_kategori_id']; ?>
                                </a>
                            </div>
                            <h3 class="post-title">
                                <a href="/<?= $lang; ?>/<?= $lang === 'en' ? $thirdArticle['kategori']['slug_en'] : $thirdArticle['kategori']['slug_id']; ?>/<?= $lang === 'en' ? $thirdArticle['slug_en'] : $thirdArticle['slug_id']; ?>">
                                    <?= $lang === 'en' ? $thirdArticle['judul_en'] : $thirdArticle['judul_id']; ?>
                                </a>
                            </h3>
                            <div class="article-meta">
                                <span class="author"><?= htmlspecialchars($thirdArticle['nama_lengkap'] ?? '', ENT_QUOTES) ?></span>
                                <span class="publish-date"><?= date('d F Y', strtotime($thirdArticle['published_at'])) ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
            <?php endif; ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <?php
                    // Mengambil 3 kategori pertama
                    $limitedCategories = array_slice($kategoriArtikel, 0, 3);

                    foreach ($limitedCategories as $item):
                        // Artikel sudah diurutkan dari terbaru oleh Controller
                        $displayArticles = $item['artikels'];
                        // Tentukan apakah ini kategori olahraga
                        $isOlahraga = (strtolower($item['kategori']['nama_kategori_id']) === 'olahraga') ||
                            (isset($item['kategori']['slug_id']) && $item['kategori']['slug_id'] === 'olahraga');
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2 class="title"><?= esc($item['kategori']['nama_kategori_id']) ?></h2>
                                </div>
                            </div>

                            <?php if (!empty($displayArticles)): ?>
                                <?php foreach ($displayArticles as $artikel): ?>
                                    <div class="<?= $isOlahraga ? 'col-md-2' : 'col-md-4' ?>">
                                        <div class="post post-sm">
                                            <a class="post-img" href="/<?= esc($lang) ?>/<?= esc($item['kategori']['slug_id']) ?>/<?= esc($artikel['slug_id']) ?>">

                                                <?php
                                                $thumbnail = !empty($artikel['thumbnail'])
                                                    ? base_url('uploads/' . $artikel['thumbnail'])
                                                    : base_url('assets/img/default-thumbnail.jpg');
                                                ?>
                                                <div class="article-image-container" style="width: 100%; height: 200px; overflow: hidden;">
                                                    <img src="<?= $thumbnail ?>"
                                                        alt="<?= htmlspecialchars($artikel['judul_id'], ENT_QUOTES) ?>"
                                                        class="zoom-on-hover"
                                                        style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
                                                        onerror="this.onerror=null;this.src='<?= base_url('assets/img/default-thumbnail.jpg') ?>'" loading="lazy">
                                                </div>
                                            </a>
                                            <div class="post-body">
                                                <div class="post-category">
                                                    <a href="/<?= esc($lang) ?>/<?= esc($item['kategori']['slug_id']) ?>">
                                                        <?= esc($item['kategori']['nama_kategori_id']) ?>
                                                    </a>

                                                </div>
                                                <h3 class="post-title title-sm">
                                                    <a href="/<?= esc($lang) ?>/<?= esc($item['kategori']['slug_id']) ?>/<?= esc($artikel['slug_id']) ?>">
                                                        <?= esc($artikel['judul_id']) ?>
                                                    </a>

                                                </h3>
                                                <ul class="post-meta">
                                                    <li><a href="#"><?= esc($artikel['nama_lengkap'] ?? 'Penulis Tidak Diketahui') ?></a></li>
                                                    <li><?= date('d F Y', strtotime($artikel['published_at'] ?? 'now')) ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-md-12">
                                    <p>Tidak ada artikel yang tersedia untuk kategori ini.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>


                <style>
                    .zoom-on-hover {
                        transition: transform 0.5s ease-in-out;
                    }

                    .zoom-on-hover:hover {
                        transform: scale(1.03);
                    }

                    .article-image-container {
                        transition: transform 0.5s ease-in-out;
                    }

                    .post-img:hover .article-image-container {
                        transform: scale(1.015);
                    }
                </style>

                <div class="col-md-4">
                    <!-- ad widget-->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="<?= base_url('assets/img/ad-3.jpg'); ?>" alt="">
                        </a>
                    </div>
                    <!-- /ad widget -->

                    <!-- social widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Social Media</h2>
                        </div>
                        <div class="social-widget">
                            <ul>
                                <li>
                                    <a href="#" class="social-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <span>21.2K<br>Followers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <span>10.2K<br>Followers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="social-google-plus">
                                        <i class="fa fa-google-plus"></i>
                                        <span>5K<br>Followers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /social widget -->

                    <!-- category widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Categorie</h2>
                        </div>
                        <div class="category-widget">
                            <ul>
                                <?php foreach (array_slice($allKategoris, 0, 3) as $item): ?>
                                    <li>
                                        <a href="<?= base_url($item['kategori']['slug_id']) ?>">
                                            <?= $item['kategori']['nama_kategori_id'] ?>
                                            <span><?= $item['count'] ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /category widget -->

                    <!-- newsletter widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Newsletter</h2>
                        </div>
                        <div class="newsletter-widget">
                            <form>
                                <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                                <input class="input" name="newsletter" placeholder="Enter Your Email" disabled>
                                <button class="primary-button" disabled>Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <!-- /newsletter widget -->
                    <!-- post widget -->
                    <div class="aside-widget">
                        <div class="section-title">
                            <h2 class="title">Popular Posts</h2>
                        </div>
                        <?php foreach ($popularArticles as $article): ?>
                            <!-- post -->
                            <div class="post post-widget">
                                <a class="post-img" href="/<?= $lang; ?>/<?= esc($article['kategori']['slug_id'] ?? '') ?>/<?= esc($article['slug_id'] ?? '') ?>">

                                    <?php
                                    // Handle thumbnail dengan fallback default image
                                    $thumbnail = (!empty($article['thumbnail']) && file_exists(FCPATH . 'uploads/' . $article['thumbnail']))
                                        ? base_url('uploads/' . esc($article['thumbnail']))
                                        : base_url('assets/img/default-thumbnail.jpg');
                                    ?>
                                    <img src="<?= $thumbnail ?>"
                                        alt="<?= esc($article['judul_id'] ?? 'Judul tidak tersedia') ?>"
                                        class="img-fluid"
                                        style="max-height: 80px; object-fit: cover;"
                                        onerror="this.onerror=null;this.src='<?= base_url('assets/img/default-thumbnail.jpg') ?>'">
                                </a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="/<?= esc($lang) ?>/<?= esc($article['kategori']['slug_id'] ?? '') ?>">
                                            <?= esc($article['kategori']['nama_kategori_id'] ?? 'Uncategorized') ?>
                                        </a>

                                    </div>
                                    <h3 class="post-title" style="font-size: 14px; line-height: 1.4;">
                                        <a href="/<?= esc($lang) ?>/<?= esc($article['kategori']['slug_id'] ?? '') ?>/<?= esc($article['slug_id'] ?? '') ?>">
                                            <?= esc($article['judul_id'] ?? 'Judul tidak tersedia') ?>
                                        </a>

                                    </h3>
                                </div>
                            </div>
                            <!-- /post -->
                        <?php endforeach; ?>
                    </div>
                    <!-- /post widget -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ad -->
                <div class="col-md-12 section-row text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="<?= base_url('assets/img/ad-2.jpg'); ?>" alt="">
                    </a>
                </div>
                <!-- /ad -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <?= $this->endSection(); ?>