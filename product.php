<?php
$title = "RNES - Detail";
include_once 'includes/header.php';

//set default 0
$id = (isset($_GET['id'])) ? $_GET['id'] : '0';
if ($id === 0) {
    header('Location: //' . $_SERVER['SERVER_NAME']);
    die;
}

$sql = "SELECT * FROM navigation WHERE id=?";
$query = $conn->prepare($sql);
$query->execute([$id]);
$output = $query->fetch();

?>

    <section class="page-header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Single Portfolio</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li class="active">Single Portfolio</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-->
    </section>

    <div class="container">
        <div class="content-wrapper">
            <div class="inner-content">
                <div class="row">
                    <div class="col-md-7">
                        <div class="portfolio-content">
                            <img src="img/work/portfolio-10.jpg" class="img-responsive" alt="">
                            <p>Efficiently communicate installed base leadership skills with extensible testing
                                procedures.
                                Enthusiastically evolve leading-edge scenarios.</p>

                            <ul class="check-square">
                                <li>Globally exploit interoperable infrastructures</li>
                                <li>Collaboratively initiate customer directed manufactured</li>
                                <li>Competently whiteboard backend information rather</li>
                                <li>Efficiently empower next-generation sources</li>
                                <li>Uniquely expedite sticky e-markets via orthogonal</li>
                                <li>Professionally strategize orthogonal core competency</li>
                            </ul>
                        </div> <!-- /.portfolio-content -->
                    </div> <!-- /.col-md-7 -->

                    <div class="col-md-5">
                        <div class="portfolio-info">
                            <p><span class="title">Project Name:</span> Interior Design</p>
                            <p><span class="title">Client:</span> ThemeHippo</p>
                            <p><span class="title">Client Info :</span></p>

                            <p><?php
                                print_r($output)?></p>

                            <span class="block-title">Client Testimonial :</span>
                            <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna.
                                Sed et
                                quam lacus. Fusce condimentum eleifenda f enim eugiat. At vero eos et accusamus et iusto
                                odio dignissimos ducimus qui blanditiis.
                            </blockquote>

                            <div class="project-live-link">
                                <strong>Live Demo:</strong> <a
                                        href="http://www.themehippo.com">http://www.themehippo.com</a>
                            </div> <!-- /.project-live-link -->
                        </div> <!-- /.portfolio-info -->
                    </div> <!-- /.col-md-5 -->
                </div> <!-- /.row -->
                <br>
                <hr>

                <div class="related-project">
                    <h2>Related Project</h2>

                    <div class="related-work-carousel">
                        <div class="item">
                            <div class="single-portfolio">
                                <img src="img/work/portfolio-6.jpg" alt="">
                                <div class="portfolio-links">
                                    <a class="image-link" href="img/work/portfolio-6.jpg"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                </div><!-- /.links -->
                            </div><!-- /.single-portfolio -->
                        </div>

                        <div class="item">
                            <div class="single-portfolio">
                                <img src="img/work/portfolio-2.jpg" alt="">
                                <div class="portfolio-links">
                                    <a class="image-link" href="img/work/portfolio-2.jpg"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                </div><!-- /.links -->
                            </div><!-- /.single-portfolio -->
                        </div>

                        <div class="item">
                            <div class="single-portfolio">
                                <img src="img/work/portfolio-7.jpg" alt="">
                                <div class="portfolio-links">
                                    <a class="image-link" href="img/work/portfolio-7.jpg"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                </div><!-- /.links -->
                            </div><!-- /.single-portfolio -->
                        </div>

                        <div class="item">
                            <div class="single-portfolio">
                                <img src="img/work/portfolio-8.jpg" alt="">
                                <div class="portfolio-links">
                                    <a class="image-link" href="img/work/portfolio-8.jpg"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                </div><!-- /.links -->
                            </div><!-- /.single-portfolio -->
                        </div>

                        <div class="item">
                            <div class="single-portfolio">
                                <img src="img/work/portfolio-11.jpg" alt="">
                                <div class="portfolio-links">
                                    <a class="image-link" href="img/work/portfolio-11.jpg"><i
                                                class="fa fa-search-plus"></i></a>
                                    <a href="#"><i class="fa fa-link"></i></a>
                                </div><!-- /.links -->
                            </div><!-- /.single-portfolio -->
                        </div>

                    </div>
                </div>

            </div><!-- /.inner-content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.container -->

<?php
include_once 'includes/footer.php'
?>