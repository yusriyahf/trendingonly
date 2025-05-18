<?= $this->extend('layouts/template'); ?>

<?= $this->section('pageHeader'); ?>
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url('<?= !empty($artikel['gambar_besar']) ? base_url('uploads/gambar_besar/persewangi2.jpg') : base_url('uploads/gambar_besar/header-1.jpg') ?>');" data-stellar-background-ratio="0.5"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="#"><?= esc($kategori['slug_id']) ?></a>
                </div>
                <h1><?= esc($artikel['judul_id']) ?></h1>
                <ul class="post-meta">
                    <li><a href="#"><?= esc($artikel['nama_lengkap']) ?></a></li>
                    <li><?= esc($artikel['published_at']) ?></li>
                    <li><i class="fa fa-eye"></i> <?= esc($artikel['views']) ?></li>
                    <li><i class="fa fa-image"></i> Sumber Gambar: <?= (!empty($artikel['sumber_gambar']) && trim($artikel['sumber_gambar']) !== '')
                                                                        ? esc($artikel['sumber_gambar'])
                                                                        : 'Tidak Diketahui' ?></li>
                </ul>
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
                <!-- post share -->
                <div class="section-row">
                    <div class="post-share">
                        <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
                        <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
                        <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
                        <a href="#"><i class="fa fa-envelope"></i><span>Email</span></a>
                    </div>
                </div>
                <!-- /post share -->

                <!-- post content -->
                <div class="section-row">
                    <?php if (!empty($artikel['gambar_besar'])): ?>
                        <div class="featured-image-container" style="width: 100%; margin: 0 auto 20px;">
                            <img src="<?= base_url('uploads/' . $artikel['gambar_besar']) ?>"
                                alt="<?= esc($artikel['judul_id']) ?>"
                                style="width: 100%; max-width: 100%; height: auto; max-height: 500px; display: block; margin: 0 auto;">
                        </div>
                    <?php endif; ?>
                    <h3><?= esc($artikel['judul_id']) ?></h3>
                    <p><?= esc($artikel['konten_id']) ?></p>
                </div>
                <!-- /post content -->

                <!-- post tags -->
                <div class="section-row">
                    <div class="post-tags">
                        <ul>
                            <li>TAGS:</li>
                            <?php
                            $tags = explode(',', $artikel['tags_id']);
                            foreach ($tags as $tag):
                                $trimmedTag = trim($tag);
                                if (!empty($trimmedTag)):
                            ?>
                                    <li><a href="#"><?= $trimmedTag ?></a></li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- /post tags -->

                <!-- post nav -->
                <div class="section-row">
                    <div class="post-nav">
                        <div class="prev-post">
                            <a class="post-img" href="#"><img src="<?= base_url('assets/img/widget-10.jpg'); ?>" alt=""></a>
                            <h3 class="post-title"><a href="#">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                            <span>Previous post</span>
                        </div>

                        <div class="next-post">
                            <a class="post-img" href="#"><img src="<?= base_url('assets/img/widget-10.jpg'); ?>" alt=""></a>
                            <h3 class="post-title"><a href="#">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                            <span>Next post</span>
                        </div>
                    </div>
                </div>
                <!-- /post nav  -->

                <!-- post author -->
                <div class="section-row">
                    <div class="section-title">
                        <h3 class="title">About <a href="#"><?= esc($artikel['nama_lengkap']) ?></a></h3>
                    </div>
                    <div class="author media">
                        <div class="media-left">
                            <a href="#">
                                <img class="author-img media-object" src="<?= base_url('assets/img/avatar-1.jpg'); ?>" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <ul class="author-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /post author -->

                <!-- /related post -->
                <div>
                    <div class="section-title">
                        <h3 class="title">Related Posts</h3>
                    </div>
                    <div class="row">
                        <!-- post -->
                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="#"><img src="../uploads/pildun1.jpeg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="#">Health</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="#">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="#">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="#"><img src="../uploads/pildun1.jpeg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="#">Fashion</a>
                                        <a href="#">Lifestyle</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="#">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="#">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->

                        <!-- post -->
                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="#"><img src="../uploads/pildun1.jpeg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="#">Health</a>
                                        <a href="#">Lifestyle</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="#">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="#">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /post -->
                    </div>
                </div>
                <!-- /related post -->

                <!-- post komen di hapus -->

            </div>
            <div class="col-md-4">
                <!-- ad widget -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-3.jpg" alt="">
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
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Popular Posts</h2>
                    </div>
                    <?php foreach ($popularArticles as $article): ?>
                        <!-- post -->
                        <div class="post post-widget">
                            <a class="post-img" href="<?= base_url($article['kategori']['slug_id'] . '/' . $article['slug_id']) ?>">
                                <img src="<?= base_url('uploads/' . $article['thumbnail']) ?>" alt="<?= $article['judul_id'] ?>">
                            </a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="<?= base_url($article['kategori']['slug_id']) ?>">
                                        <?= $article['kategori']['nama_kategori_id'] ?>
                                    </a>
                                </div>
                                <h3 class="post-title">
                                    <a href="<?= base_url($article['kategori']['slug_id'] . '/' . $article['slug_id']) ?>">
                                        <?= $article['judul_id'] ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <!-- /post -->
                    <?php endforeach; ?>
                </div>
                <!-- /post widget -->

                <!-- newsletter widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Newsletter</h2>
                    </div>
                    <div class="newsletter-widget">
                        <form>
                            <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                            <input class="input" placeholder="Enter Your Email">
                            <button class="primary-button">Subscribe</button>
                        </form>
                    </div>
                </div>
                <!-- /newsletter widget -->

                <!-- galery widget -->
                <!-- <div class="aside-widget">
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
                </div> -->
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