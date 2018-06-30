<?php
$title = "RNES - Gallery View";

include_once '@dmin/action/DBConnect.php';

$id = isset($_GET['id']) ? $_GET['id'] : '0';
$sql = "SELECT * FROM gallery WHERE id=?";
$query = $conn->prepare($sql);
$query->execute([$id]);
$output = $query->fetch();

if (empty($output)) {
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/gallery');
    die;
}

include_once 'includes/header.php';

?>

    <section class="page-header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Gallery Detail</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li class="active"><?= substr($output['title'], 0, 50) ?></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
    <div class="content-wrapper">
        <div class="row" style="padding: 30px;">
            <div class="col-sm-4 text-right">
                <img style="height: 120px;width: 180px" src="/img/Gallery/featured/<?= $output['image'] ?>"
                     alt="image">
            </div>
            <div class="col-sm-8">
                <b><?= $output['title'] ?></b>
                <p><?= $output['detail'] ?></p>
            </div>
        </div>
            <div class="inner-content">
                <div class="row four-column">
                    <div id="grid">
                        <?php

                        $sql_1 = "SELECT * FROM images WHERE gallery_id=?";
                        $query_1 = $conn->prepare($sql_1);
                        $query_1->execute([$id]);
                        $list_image = $query_1->fetchAll();

                        $sql_2 = "SELECT * FROM videos WHERE gallery_id=?";
                        $query_2 = $conn->prepare($sql_2);
                        $query_2->execute([$id]);
                        $list_videos = $query_2->fetchAll();

                        foreach ($list_image as $image) {
                            echo "<div class=\"portfolio-item col-sm-6 col-md-3\">
                            <div class=\"single-portfolio\">
                                <img src=\"img/Gallery/images/" . $image['name'] . "\" alt=\"\">
                                <div class=\"portfolio-links\">
                                    <a class=\"image-link\" href=\"img/Gallery/images/" . $image['name'] . "\"><i
                                                class=\"fa fa-search-plus\"></i></a>
                                </div><!-- /.links -->
                            </div><!-- /.single-portfolio -->
                        <strong title='" . $image['caption'] . "'>" . substr($image['caption'], 0, 50) . "</strong>
                        </div><!-- /.portfolio-item -->";
                        }

                        foreach ($list_videos as $video) {
                            echo "<div class=\"portfolio-item col-sm-6 col-md-3\">
                            <a href=\"https://www.youtube.com/embed/" . $video['name'] . "\"><div class=\"single-portfolio\">
                            <embed src=\"https://www.youtube.com/embed/" . $video['name'] . "\" alt=\"\">
                            </div></a><!-- /.single-portfolio -->
                        <strong title='" . $video['caption'] . "'>" . substr($video['caption'], 0, 50) . "</strong>
                        </div><!-- /.portfolio-item -->";
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