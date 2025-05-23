<?= $this->extend('layouts/template'); ?>

<?= $this->section('pageHeader'); ?>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
                <div class="author">
                    <img class="author-img center-block" src="./img/avatar-1.jpg" alt="">
                    <h1 class="text-uppercase">John Doe</h1>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <ul class="author-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
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
                <div class="post post-row">
                    <a class="post-img" href="blog-post.html"><img src="./img/post-13.jpg" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">Travel</a>
                            <a href="#">Lifestyle</a>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="post post-row">
                    <a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">Travel</a>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="post post-row">
                    <a class="post-img" href="blog-post.html"><img src="./img/post-5.jpg" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">Lifestyle</a>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="post post-row">
                    <a class="post-img" href="blog-post.html"><img src="./img/post-6.jpg" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">Fashion</a>
                            <a href="#">Lifestyle</a>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                    </div>
                </div>
                <!-- /post -->

                <!-- post -->
                <div class="post post-row">
                    <a class="post-img" href="blog-post.html"><img src="./img/post-7.jpg" alt=""></a>
                    <div class="post-body">
                        <div class="post-category">
                            <a href="#">Health</a>
                            <a href="#">Lifestyle</a>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
                        <ul class="post-meta">
                            <li><a href="#">John Doe</a></li>
                            <li>20 April 2018</li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                    </div>
                </div>
                <!-- /post -->

                <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Load More</a>
                </div>
            </div>

            <div class="col-md-4">
                <!-- ad widget-->
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
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<?= $this->endSection(); ?>