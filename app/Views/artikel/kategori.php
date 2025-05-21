<?= $this->extend('layouts/template'); ?>

<?= $this->section('pageHeader'); ?>
<div class="page-header">
    <div class="page-header-bg" style="background-image: url('<?=
                                                                !empty($kategori['thumbnail'])
                                                                    ? base_url('uploads/gambar_kategori/' . $kategori['thumbnail'])
                                                                    : base_url('')
                                                                ?>');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
                <h1 class="text-uppercase"><?= esc($kategori['nama_kategori_' . $lang]) ?></h1>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- post -->
                <div class="post post-thumb">
                    <?php if (!empty($artikels) && isset($artikels[0])): ?>
                        <?php
                        $firstArticle = $artikels[0];
                        $categorySlug = $firstArticle['kategori_slug'] ?? $firstArticle['slug_kategori'] ?? $kategori['slug_' . $lang] ?? 'uncategorized';
                        $categoryName = $firstArticle['nama_kategori'] ?? $kategori['nama_kategori_' . $lang] ?? 'Uncategorized';
                        ?>

                        <a class="post-img" href="/<?= $categorySlug ?>/<?= $firstArticle['slug_' . $lang] ?>">
                            <img src="<?= base_url('uploads/' . ($firstArticle['thumbnail'] ?? 'default-thumbnail.jpg')) ?>" alt="<?= htmlspecialchars($firstArticle['judul_' . $lang] ?? '') ?>">
                        </a>

                        <div class="post-body">
                            <div class="post-category">
                                <a href="/kategori/<?= $categorySlug ?>"><?= htmlspecialchars($categoryName) ?></a>
                            </div>
                            <h3 class="post-title title-lg">
                                <a href="/<?= $categorySlug ?>/<?= $firstArticle['slug_' . $lang] ?>">
                                    <?= htmlspecialchars($firstArticle['judul_' . $lang] ?? 'No Title') ?>
                                </a>
                            </h3>
                            <div class="article-meta">
                                <span class="author"><?= htmlspecialchars($firstArticle['nama_lengkap'] ?? 'Penulis Tidak Diketahui', ENT_QUOTES) ?></span>
                                <span class="publish-date"><?= date('d F Y', strtotime($firstArticle['published_at'] ?? 'now')) ?></span>
                            </div>
                            <div class="image-source-container">
                                <span class="image-source-label">Sumber Gambar: </span>
                                <span class="image-source-author">
                                    <?= (!empty($firstArticle['sumber_gambar']) && trim($firstArticle['sumber_gambar']) !== '')
                                        ? htmlspecialchars($firstArticle['sumber_gambar'])
                                        : 'Tidak Diketahui' ?>
                                </span>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">Artikel tidak tersedia</div>
                    <?php endif; ?>
                </div>
                <!-- /post -->

                <div class="row">
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <?php
                            // Get the article - assuming $artikels[1] for the second article
                            $article = $artikels[0] ?? null;
                            if ($article):
                                $catSlug = $article['kategori_slug'] ??
                                    $article['slug_kategori'] ??
                                    ($article['kategori']['slug_' . $lang] ??
                                        ($kategori['slug_' . $lang] ?? 'uncategorized'));

                                $catName = $article['nama_kategori'] ??
                                    ($article['kategori']['nama_kategori_' . $lang] ??
                                        ($kategori['nama_kategori_' . $lang] ?? 'Uncategorized'));
                            ?>
                                <a class="post-img" href="/<?= $catSlug ?>/<?= $article['slug_' . $lang] ?>">
                                    <img src="<?= base_url('uploads/' . ($article['thumbnail'] ?? 'assets/img/post-3.jpg')) ?>"
                                        alt="<?= htmlspecialchars($article['judul_' . $lang] ?? '') ?>">
                                </a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="/kategori/<?= $catSlug ?>"><?= htmlspecialchars($catName) ?></a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="/<?= $catSlug ?>/<?= $article['slug_' . $lang] ?>">
                                            <?= htmlspecialchars($article['judul_' . $lang] ?? 'No Title') ?>
                                        </a>
                                    </h3>
                                    <ul class="post-meta">
                                        <li>
                                            <a href="/author/<?= $article['penulis_slug'] ?? 'unknown' ?>">
                                                <?= htmlspecialchars($article['nama_lengkap'] ?? 'Penulis Tidak Diketahui') ?>
                                            </a>
                                        </li>
                                        <li><?= date('d F Y', strtotime($article['published_at'] ?? 'now')) ?></li>
                                        <li class="image-source-item">
                                            <span class="image-source-text">
                                                <?= isset($article['sumber_gambar']) && !empty(trim($article['sumber_gambar']))
                                                    ? 'Sumber: ' . htmlspecialchars($article['sumber_gambar'])
                                                    : 'Sumber: Tidak Diketahui' ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning">Artikel tidak tersedia</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <?php
                            // Get the article - assuming $artikels[1] for the second article
                            $article = $artikels[1] ?? null;
                            if ($article):
                                $catSlug = $article['kategori_slug'] ??
                                    $article['slug_kategori'] ??
                                    ($article['kategori']['slug_' . $lang] ??
                                        ($kategori['slug_' . $lang] ?? 'uncategorized'));

                                $catName = $article['nama_kategori'] ??
                                    ($article['kategori']['nama_kategori_' . $lang] ??
                                        ($kategori['nama_kategori_' . $lang] ?? 'Uncategorized'));
                            ?>
                                <a class="post-img" href="/<?= $catSlug ?>/<?= $article['slug_' . $lang] ?>">
                                    <img src="<?= base_url('uploads/' . ($article['thumbnail'] ?? 'assets/img/post-3.jpg')) ?>"
                                        alt="<?= htmlspecialchars($article['judul_' . $lang] ?? '') ?>">
                                </a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="/kategori/<?= $catSlug ?>"><?= htmlspecialchars($catName) ?></a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="/<?= $catSlug ?>/<?= $article['slug_' . $lang] ?>">
                                            <?= htmlspecialchars($article['judul_' . $lang] ?? 'No Title') ?>
                                        </a>
                                    </h3>
                                    <ul class="post-meta">
                                        <li>
                                            <a href="/author/<?= $article['penulis_slug'] ?? 'unknown' ?>">
                                                <?= htmlspecialchars($article['nama_lengkap'] ?? 'Penulis Tidak Diketahui') ?>
                                            </a>
                                        </li>
                                        <li><?= date('d F Y', strtotime($article['published_at'] ?? 'now')) ?></li>
                                        <li class="image-source-item">
                                            <span class="image-source-text">
                                                <?= isset($article['sumber_gambar']) && !empty(trim($article['sumber_gambar']))
                                                    ? 'Sumber: ' . htmlspecialchars($article['sumber_gambar'])
                                                    : 'Sumber: Tidak Diketahui' ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning">Artikel tidak tersedia</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- <div class="clearfix visible-md visible-lg"></div> -->


                    <!-- /post -->
                </div>

                <!-- post -->
                <?php if (empty($artikels)): ?>
                    <p>Belum ada artikel di kategori ini.</p>
                <?php else: ?>
                    <?php foreach ($artikels as $artikel): ?>
                        <div class="post post-row">
                            <a class="post-img" href="#"><img src="<?= base_url('assets/img/post-13.jpg'); ?>" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="<?= base_url($kategori['slug_' . $lang]); ?>"><?= esc($kategori['nama_kategori_' . $lang]) ?></a>
                                </div>
                                <h3 class="post-title"><a href="<?= base_url($kategori['slug_' . $lang] . '/' . $artikel['slug_' . $lang]); ?>"><?= esc($artikel['judul_' . $lang]) ?></a></h3>
                                <ul class="post-meta">
                                    <li><a href="#"><?= esc($artikel['nama_lengkap'] ?? 'Penulis Tidak Diketahui') ?></a></li>
                                    <li><?= date('d F Y', strtotime($artikel['published_at'] ?? 'now')) ?></li>
                                </ul>
                                <div class="image-source-container">
                                    <span class="image-source-label">Sumbe Gambar: </span>
                                    <span class="image-source-author"><?= (!empty($artikel['sumber_gambar']) && trim($artikel['sumber_gambar']) !== '')
                                                                            ? esc($artikel['sumber_gambar'])
                                                                            : 'Tidak Diketahui' ?></span>
                                </div><br>
                                <p><?= esc($artikel['konten_' . $lang]) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- /post -->

                <?php if (!empty($artikels) && count($artikels) > 1): ?>
                    <div class="section-row loadmore text-center">
                        <a href="#" class="primary-button">Load More</a>
                    </div>
                <?php endif; ?>
            </div>

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
                            <a class="post-img" href="<?= base_url($article['kategori']['slug_' . $lang] . '/' . $article['slug_' . $lang]) ?>">
                                <img src="<?= base_url('uploads/' . $article['thumbnail']) ?>" alt="<?= $article['judul_' . $lang] ?>">
                            </a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="<?= base_url($article['kategori']['slug_' . $lang]) ?>">
                                        <?= $article['kategori']['nama_kategori_' . $lang] ?>
                                    </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="<?= base_url($article['kategori']['slug_' . $lang] . '/' . $article['slug_' . $lang]) ?>">
                                        <?= $article['judul_' . $lang] ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <!-- /post -->
                    <?php endforeach; ?>
                </div>
                <!-- /post widget -->

                <!-- galery widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Instagram</h2>
                    </div>
                    <div class="galery-widget">
                        <ul>
                            <li><a href="#"><img src="./img/galery-1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="./img/galery-2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="./img/galery-3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="./img/galery-4.jpg" alt=""></a></li>
                            <li><a href="#"><img src="./img/galery-5.jpg" alt=""></a></li>
                            <li><a href="#"><img src="./img/galery-6.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /galery widget -->

                <!-- Ad widget -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /Ad widget -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<?= $this->endSection(); ?>