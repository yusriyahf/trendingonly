<?= $this->extend('layouts/template'); ?>

<?= $this->section('pageHeader'); ?>
<div class="page-header">
    <div class="page-header-bg" style="background-image: url('<?=
                                                                !empty($categories[0]['thumbnail'])
                                                                    ? base_url('uploads/' . $categories[0]['thumbnail'])
                                                                    : base_url('uploads/background-olahraga.jpg')
                                                                ?>');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
                <h1 class="text-uppercase"><?= esc($kategori['nama_kategori_id']) ?></h1>
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
                    <?php
                    $firstArticle = $artikels[0] ?? 'tidak ada isinya';
                    $categorySlug = $firstArticle['kategori_slug'] ?? $firstArticle['slug_kategori'] ?? $kategori['slug_id'] ?? 'uncategorized';
                    $categoryName = $firstArticle['nama_kategori'] ?? $kategori['nama_kategori_id'] ?? 'Uncategorized';
                    ?>

                    <a class="post-img" href="/<?= $categorySlug ?>/<?= $firstArticle['slug_id'] ?>">
                        <img src="<?= base_url('uploads/' . ($firstArticle['thumbnail'] ?? 'default-thumbnail.jpg')) ?>" alt="<?= htmlspecialchars($firstArticle['judul_id'] ?? '') ?>">
                    </a>

                    <div class="post-body">
                        <div class="post-category">
                            <a href="/kategori/<?= $categorySlug ?>"><?= htmlspecialchars($categoryName) ?></a>
                        </div>
                        <h3 class="post-title title-lg">
                            <a href="/<?= $categorySlug ?>/<?= $firstArticle['slug_id'] ?>">
                                <?= htmlspecialchars($firstArticle['judul_id'] ?? 'No Title') ?>
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
                </div>
                <!-- /post -->

                <div class="row">
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <?php
                            // Get the article - assuming $artikels[1] for the second article
                            $article = $artikels[1] ?? null;
                            if ($article):
                                $catSlug = $article['kategori_slug'] ??
                                    $article['slug_kategori'] ??
                                    ($article['kategori']['slug_id'] ??
                                        ($kategori['slug_id'] ?? 'uncategorized'));

                                $catName = $article['nama_kategori'] ??
                                    ($article['kategori']['nama_kategori_id'] ??
                                        ($kategori['nama_kategori_id'] ?? 'Uncategorized'));
                            ?>
                                <a class="post-img" href="/<?= $catSlug ?>/<?= $article['slug_id'] ?>">
                                    <img src="<?= base_url('uploads/' . ($article['thumbnail'] ?? 'assets/img/post-3.jpg')) ?>"
                                        alt="<?= htmlspecialchars($article['judul_id'] ?? '') ?>">
                                </a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="/kategori/<?= $catSlug ?>"><?= htmlspecialchars($catName) ?></a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="/<?= $catSlug ?>/<?= $article['slug_id'] ?>">
                                            <?= htmlspecialchars($article['judul_id'] ?? 'No Title') ?>
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
                            $article = $artikels[2] ?? null;
                            if ($article):
                                $catSlug = $article['kategori_slug'] ??
                                    $article['slug_kategori'] ??
                                    ($article['kategori']['slug_id'] ??
                                        ($kategori['slug_id'] ?? 'uncategorized'));

                                $catName = $article['nama_kategori'] ??
                                    ($article['kategori']['nama_kategori_id'] ??
                                        ($kategori['nama_kategori_id'] ?? 'Uncategorized'));
                            ?>
                                <a class="post-img" href="/<?= $catSlug ?>/<?= $article['slug_id'] ?>">
                                    <img src="<?= base_url('uploads/' . ($article['thumbnail'] ?? 'assets/img/post-3.jpg')) ?>"
                                        alt="<?= htmlspecialchars($article['judul_id'] ?? '') ?>">
                                </a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="/kategori/<?= $catSlug ?>"><?= htmlspecialchars($catName) ?></a>
                                    </div>
                                    <h3 class="post-title">
                                        <a href="/<?= $catSlug ?>/<?= $article['slug_id'] ?>">
                                            <?= htmlspecialchars($article['judul_id'] ?? 'No Title') ?>
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
                                    <a href="<?= base_url($kategori['slug_id']); ?>"><?= esc($kategori['nama_kategori_id']) ?></a>
                                </div>
                                <h3 class="post-title"><a href="<?= base_url($kategori['slug_id'] . '/' . $artikel['slug_id']); ?>"><?= esc($artikel['judul_id']) ?></a></h3>
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
                                <p><?= esc($artikel['konten_id']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- /post -->

                <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Load More</a>
                </div>
            </div>

            <div class="col-md-4">
                <!-- ad widget-->
                <div class="aside-widget text-center">
                    <a href="#" style="display:inline-block; margin:auto;">
                        <img class=" img-responsive" src="<?= base_url('assets/img/ad-3.jpg'); ?>" alt="">
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
                        <h2 class="title">Categories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            <?php foreach ($allKategoris as $item): ?>
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
                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="#"><img src="./img/widget-3.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="#">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="#"><img src="./img/widget-2.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#">Technology</a>
                                <a href="#">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="#">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="#"><img src="./img/widget-4.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#">Health</a>
                            </div>
                            <h3 class="post-title"><a href="#">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="#"><img src="./img/widget-5.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#">Health</a>
                                <a href="#">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="#">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                        </div>
                    </div>
                    <!-- /post -->
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