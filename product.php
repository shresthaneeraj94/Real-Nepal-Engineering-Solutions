<?php
$title = "RNES - Detail";

include_once '@dmin/action/DBConnect.php';

$id = isset($_GET['id']) ? $_GET['id'] : '0';
$sql = "SELECT * FROM navigation WHERE id=?";
$query = $conn->prepare($sql);
$query->execute([$id]);
$output = $query->fetch();

if (empty($output)) {
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/productList');
    die;
}

include_once 'includes/header.php';

?>

    <section class="page-header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Detail</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index">Home</a></li>
                        <li><a href="productList?id=<?= $output['category'] ?>    "><?= $output['category'] ?></a></li>
                        <li class="active"><?=substr($output['title'],0,30)?></li>
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
                            <img src="img/Navigation/<?= $output['image'] ?>" class="img-responsive" alt="">
                            <p><?= $output['detail'] ?></p>

                            <!--                            <ul class="check-square">-->
                            <!--                                <li>Globally exploit interoperable infrastructures</li>-->
                            <!--                                <li>Collaboratively initiate customer directed manufactured</li>-->
                            <!--                                <li>Competently whiteboard backend information rather</li>-->
                            <!--                                <li>Efficiently empower next-generation sources</li>-->
                            <!--                                <li>Uniquely expedite sticky e-markets via orthogonal</li>-->
                            <!--                                <li>Professionally strategize orthogonal core competency</li>-->
                            <!--                            </ul>-->
                        </div> <!-- /.portfolio-content -->
                    </div> <!-- /.col-md-7 -->

                    <div class="col-md-5">
                        <div class="portfolio-info">
                            <p><span class="title">TITLE</span><?= $output['title'] ?></p>

                            <span class="block-title"></span>
                            <blockquote>
                                <?= $output['quote'] ?>
                            </blockquote>
                            <!---->
                            <!--                            <div class="project-live-link">-->
                            <!--                                <strong>Live Demo:</strong> <a-->
                            <!--                                        href="http://www.themehippo.com">http://www.themehippo.com</a>-->
                            <!--                            </div> <!-- /.project-live-link -->
                        </div> <!-- /.portfolio-info -->
                    </div> <!-- /.col-md-5 -->
                </div> <!-- /.row -->
                <br>
                <hr>

                <?php
                $sql_5 = "SELECT * FROM gallery WHERE navigation_id=?";
                $query_5 = $conn->prepare($sql_5);
                $query_5->execute([$id]);
                $related_gallery = $query_5->fetchAll();
                ?>
                <div class="related-project">
                    <h2>Related Gallery</h2>

                    <div class="related-work-carousel">
                        <?php
                        foreach ($related_gallery as $gallery) {
                            echo "<div class=\"item\">
                            <div class=\"single-portfolio\">

                                <img src=\"img/Gallery/featured/" . $gallery['image'] . "\" alt=\"\" style='height:280px'>
                                <div class=\"portfolio-links\">
                                    <a class=\"image-link\" href=\"img/Gallery/featured/" . $gallery['image'] . "\"><i
                                                class=\"fa fa-search-plus\"></i></a>
                                    <a href=\"galleryView?id=" . $gallery['id'] . "\"><i class=\"fa fa-link\"></i></a>
                                </div><!-- /.links -->
                            </div><!-- /.single-portfolio -->
                        </div>";
                        }
                        ?>
                    </div>
                </div>

            </div><!-- /.inner-content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.container -->

<?php
include_once 'includes/footer.php'
?>