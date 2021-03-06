<section class="footer-widget-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="footer-widget">
                    <p class="subcsribe-text wow fadeInDown">
                        We at REAL NEPAL ENGINEERING SOLUTIONS PVT. LTD. believe that development of meaningful and
                        sustainable infrastructures underpin better culture.
                    </p>


                    <div class="social-link wow fadeInDown">
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        </ul>
                    </div>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-2 col-sm-4">
                <div class="footer-widget">
                    <a href="productList?id=product"><h3 class="wow fadeInDown">products</h3></a>
                    <ul class="wow fadeInDown">
                        <?php
                        foreach ($product as $item1) {
                            echo "<li title='" . $item1['title'] . "'><a href='product?id=" . $item1['id'] . "'>" . substr($item1['title'], 0, 20) . "</a></li>";
                        }
                        ?>
                    </ul>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-2 -->
            <div class="col-md-2 col-sm-4">
                <div class="footer-widget">
                    <a href="productList?id=services"><h3 class="wow fadeInDown">Services</h3></a>
                    <ul class="wow fadeInDown">
                        <?php
                        foreach ($services as $item2) {
                            echo "<li title='" . $item2['title'] . "'><a href='product?id=" . $item2['id'] . "'>" . substr($item2['title'], 0, 20) . "</a></li>";
                        }
                        ?>
                    </ul>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-2 -->
            <div class="col-md-2 col-sm-4">
                <div class="footer-widget">
                    <a href="productList?id=built"><h3 class="wow fadeInDown">Built In</h3></a>
                    <ul class="wow fadeInDown">
                        <?php
                        foreach ($built as $item3) {
                            echo "<li title='" . $item3['title'] . "'><a href='product?id=" . $item3['id'] . "'>" . substr($item3['title'], 0, 20) . "</a></li>";
                        }
                        ?>

                    </ul>
                </div><!-- /.footer-widget -->
            </div><!-- /.col-md-2 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>


<footer class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright wow fadeInDown">
                    <p>
                        Copyright &copy; 2018 Real Nepal Engineering Solutions . All Rights Reserved. Designed by
                        <a href="http://dunotdevelopers.com.np/">Dunot Developers PVT. LTD. </a>
                    </p>
                </div><!-- /.copyright -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer>
</div> <!-- .st-content-inner -->
</div> <!-- .st-content -->
</div> <!-- .st-pusher -->


<!-- ======== OFFCANVAS MENU ========= -->
<div class="offcanvas-menu offcanvas-effect visible-xs">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas" id="off-canvas-close-btn">&times;
    </button>
    <h3>Sidebar Menu</h3>
    <div>
        <div>
            <ul>
                <li><a href="index"><i class="fa fa-home"></i>Home</a>
                </li>

                <li><a href="about"><i class="fa fa-life-ring"></i> About Us</a></li>

                <li><a href="productList?id=product"><i class="fa fa-hand-o-right"></i>Products</a>
                    <ul>
                        <?php
                        foreach ($product as $item1) {
                            echo "<li title='" . $item1['title'] . "'><a href='product?id=" . $item1['id'] . "'>" . substr($item1['title'], 0, 20) . "</a></li>";
                        }
                        ?>
                    </ul>
                </li>

                <li><a href="productList?id=services"><i class="fa fa-wrench"></i>Services</a>
                    <ul>
                        <?php
                        foreach ($services as $item2) {
                            echo "<li title='" . $item2['title'] . "'><a href='product?id=" . $item2['id'] . "'>" . substr($item2['title'], 0, 20) . "</a></li>";
                        }
                        ?>
                    </ul>
                </li>


                <li><a href="productList?id=built"><i class="fa fa-area-chart"></i>Built In</a>
                    <ul>
                        <?php
                        foreach ($built as $item3) {
                            echo "<li title='" . $item3['title'] . "'><a href='product?id=" . $item3['id'] . "'>" . substr($item3['title'], 0, 20) . "</a></li>";
                        }
                        ?>
                    </ul>
                </li>

                <li><a href="gallery"><i class="fa fa-image"></i>Gallery</a>
                <li><a href="contact"><i class="fa fa-envelope-o"></i>Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- .offcanvas-menu -->
</div><!-- /st-container -->


<!-- Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>


<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- wow.min.js -->
<script src="js/wow.min.js"></script>
<!-- owl-carousel -->
<script src="owl-carousel/owl.carousel.min.js"></script>
<!-- smoothscroll -->
<script src="js/smoothscroll.js"></script>
<!-- Offcanvas Menu -->
<script src="js/hippo-offcanvas.js"></script>
<!-- easypiechart -->
<script src="js/jquery.easypiechart.min.js"></script>
<!-- Scrolling Nav JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<!-- Magnific-popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Shuffle.min js -->
<script src="js/jquery.shuffle.min.js"></script>
<!-- Custom Script -->
<script src="js/scripts.js"></script>
</body>
</html>
