<?php
$title = "RNES - Gallery";

include_once '@dmin/action/DBConnect.php';
$sql = "SELECT * FROM gallery ORDER BY id DESC";
$query = $conn->prepare($sql);
$query->execute();
$output = $query->fetchAll();

include_once 'includes/header.php';
?>

    <section class="page-header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Gallery</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">Gallery</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="content-wrapper">
            <div class="inner-content">
                <div class="row four-column">
                    <div id="grid">
                        <?php
                        foreach ($output as $gallery) {
                            echo "<div class=\"portfolio-item col-sm-6 col-md-3\">
                                <b>&nbsp;&nbsp;&nbsp;" . substr($gallery['title'], 0, 25) . "</b>

                            <div class=\"single-portfolio\">
                                <img src=\"img/Gallery/featured/" . $gallery['image'] . "\" alt=\"\" style='height: 200px;'>
                                <div class=\"portfolio-links\">
                                    <a href=\"galleryView?id=" . $gallery['id'] . "\"><i class=\"fa fa-link\"></i></a>
                                </div>
                                <br>
                            </div>
                        </div>";
                        }
                        ?>
                    </div><!-- /#grid -->
                </div><!-- /.row -->
            </div><!-- /.inner-content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.container -->

<?php
include_once 'includes/footer.php'
?>