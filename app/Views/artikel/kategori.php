<?= $this->extend('layouts/template'); ?>

<?= $this->section('pageHeader'); ?>
<div class="page-header">
    <div class="page-header-bg" style="background-image: url('<?= base_url('assets/img/header-2.jpg'); ?>');" data-stellar-background-ratio="0.5"></div>
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
                    <a class="post-img" href="blog-post.html"><img src="<?= base_url('assets/img/hot-post-3.jpg'); ?>" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="category.html">Fashion</a>
                            <a href="category.html">Lifestyle</a>
                        </div>
                        <h3 class="post-title title-lg"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                        <ul class="post-meta">
                            <li><a href="author.html">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                    </div>
                </div>
                <!-- /post -->

                <div class="row">
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="blog-post.html"><img src="<?= base_url('assets/img/post-3.jpg'); ?>" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">Lifestyle</a>
                                </div>
                                <h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">John Doe</a></li>
                                    <li>20 April 2018</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="blog-post.html"><img src="<?= base_url('assets/img/post-5.jpg'); ?>" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">Lifestyle</a>
                                </div>
                                <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">John Doe</a></li>
                                    <li>20 April 2018</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    <div class="clearfix visible-md visible-lg"></div>

                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="blog-post.html"><img src="<?= base_url('assets/img/post-9.jpg'); ?>" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">Lifestyle</a>
                                </div>
                                <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">John Doe</a></li>
                                    <li>20 April 2018</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="blog-post.html"><img src="<?= base_url('assets/img/post-7.jpg'); ?>" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="category.html">Health</a>
                                    <a href="category.html">Lifestyle</a>
                                </div>
                                <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">John Doe</a></li>
                                    <li>20 April 2018</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                </div>

                <!-- post -->
                <?php if (empty($artikels)): ?>
                    <p>Belum ada artikel di kategori ini.</p>
                <?php else: ?>
                    <?php foreach ($artikels as $artikel): ?>
                        <div class="post post-row">
                            <a class="post-img" href="blog-post.html"><img src="<?= base_url('assets/img/post-13.jpg'); ?>" alt=""></a>
                            <div class="post-body">
                                <div class="post-category">
                                    <a href="<?= base_url($kategori['slug_id']); ?>"><?= esc($kategori['nama_kategori_id']) ?></a>
                                </div>
                                <h3 class="post-title"><a href="<?= base_url($kategori['slug_id'] . '/' . $artikel['slug_id']); ?>"><?= esc($artikel['judul_id']) ?></a></h3>
                                <ul class="post-meta">
                                    <li><a href="author.html">John</a></li>
                                    <li>20 April 2018</li>
                                </ul>
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
                        <h2 class="title">Categories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            <li><a href="#">Lifestyle <span>451</span></a></li>
                            <li><a href="#">Fashion <span>230</span></a></li>
                            <li><a href="#">Technology <span>40</span></a></li>
                            <li><a href="#">Travel <span>38</span></a></li>
                            <li><a href="#">Health <span>24</span></a></li>
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
                            <input class="input" name="newsletter" placeholder="Enter Your Email">
                            <button class="primary-button">Subscribe</button>
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
                        <a class="post-img" href="blog-post.html"><img src="./img/widget-3.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Technology</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="./img/widget-4.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Health</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                        </div>
                    </div>
                    <!-- /post -->

                    <!-- post -->
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="./img/widget-5.jpg" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">Health</a>
                                <a href="category.html">Lifestyle</a>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
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