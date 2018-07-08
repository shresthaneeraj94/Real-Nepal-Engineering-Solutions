<?php
include_once "Includes/authCheck.php";
include_once 'action/DBConnect.php';
if (!isset($_GET['id'])) {
    header('Location: Gallery');
    die;
}
//gallery detail
$id = $_GET['id'];
$sql = "SELECT * FROM gallery WHERE id=?";
$query = $conn->prepare($sql);
$query->execute([$id]);
$gallery = $query->fetch();

include_once "Includes/header.php";
include_once "Includes/nav.php";

?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <?php
                    if (isset($_SESSION['gallery_msg'])) {
                        echo "<div class='alert alert-success text-center'>" . $_SESSION['gallery_msg'] . "</div>";
                        unset($_SESSION['gallery_msg']);
                    }
                    ?>
                </div>

                <div class="title_right" style="float: right;">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">

                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" id="addDetail">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Images and Videos to gallery</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row text-center">
                                <div class="col-md-4 text-info">
                                    Gallery title : <br><b class="lead"><?php echo $gallery['title'] ?> </b>
                                    <hr>
                                    <img src="../img/Gallery/featured/<?php echo $gallery['image'] ?>"
                                         style="height: 150px;padding:10px" alt="image">

                                    <h5><i class="fa fa-newspaper-o"> Detail : </i></h5>
                                    <?php echo $gallery['detail'] ?>
                                    <hr>
                                </div>
                                <div class="col-md-8">
                                    <button class="btn btn-info" v-on:click="addImage()"><i class="fa fa-plus"></i> <i
                                                class="fa fa-image"></i>
                                    </button>
                                    <button class="btn btn-info" v-on:click="minusImage()"><i class="fa fa-minus"></i>
                                        <i
                                                class="fa fa-image"></i>
                                    </button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-info" v-on:click="addVideo()"><i class="fa fa-plus"></i> <i
                                                class="fa fa-video-camera"></i>
                                    </button>
                                    <button class="btn btn-info" v-on:click="minusVideo()"><i class="fa fa-minus"></i>
                                        <i
                                                class="fa fa-video-camera"></i>
                                    </button>
                                    <hr>
                                    <div class="text-left imgvid">
                                        <form action="action/addGalleryDetail" id="img-vid-form"
                                              enctype="multipart/form-data" method="post">
                                            <input type="text" name="id" value="<?= $id ?>" style="display: none;">
                                            <button class="alignright btn btn-success" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--content here-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


<?php include_once "Includes/footer.php"; ?>