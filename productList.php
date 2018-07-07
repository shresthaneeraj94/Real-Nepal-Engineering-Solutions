<?php
$title = "RNES - Detail";
include_once 'includes/header.php';

if (isset($_GET['id'])) {
    $category = $_GET['id'];
    $sql = "SELECT * FROM navigation WHERE category=?";
    $query = $conn->prepare($sql);
    $query->execute([$category]);

} else {
    $sql = "SELECT * FROM navigation WHERE category!=?";
    $query = $conn->prepare($sql);
    $query->execute(['Gallery']);
}
$output = $query->fetchAll();

?>

    <section class="page-header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Listings</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index">Home</a></li>
                        <li class="active"><?= $category ?></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-->
    </section>

    <div class="container">
        <div class="content-wrapper">
            <div class="inner-content">
                <div class="row">
                    <div class="portfolio-content">
                        <?php
                        foreach ($output as $sub) {
                            echo "<a href='product?id=".$sub['id']."'><div style='padding-top: 15px;margin: 2px;border-bottom: 1px solid gainsboro;'>
                                    <div class='row'>
                                        <div class='col-sm-3 text-right'>
                                             <img src='img/Navigation/" . $sub['image'] . "' alt='image' style='height: 100px;width: 100px'>

                                        </div>
                                        <div class='col-sm-9'>
                                            <b>" . $sub['title'] . "</b >
                                            <p>" . substr($sub['detail'], 0, 50) . "</p>
                                        </div >                                    
                                        </div >
                                  </div></a> ";
                        }
                        ?>
                    </div> <!-- /.portfolio-content -->

                </div> <!-- /.row -->
            </div><!-- /.inner-content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.container -->

<?php
include_once 'includes/footer.php'
?>