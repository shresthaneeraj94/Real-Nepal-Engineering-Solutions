<?php
include_once "Includes/authCheck.php";
include_once 'action/DBConnect.php';
//navigation list
$sql = "SELECT * FROM navigation";
$query = $conn->prepare($sql);
$query->execute();
$list = $query->fetchAll();

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
                        echo "<div class='alert alert-warning text-center'>" . $_SESSION['gallery_msg'] . "</div>";
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

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Gallery</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">

                                <form action="action/addGallery.php" method="post"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label> <i class="fa fa-book"></i> Title : </label>
                                            <input type="text" name="title" class="form-control" required>
                                            <br> <label> <i class="fa fa-briefcase"></i> Navigation Link : </label>
                                            <select name="navigation" class="form-control">
                                                <?php foreach ($list as $item)echo "<option value='" . $item['id'] . "'>" . $item['title'] . "</option>"; ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <label><i class="fa fa-image"> </i> Featured Image :</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <label> <i class="fa fa-info"></i> Description : </label>
                                    <textarea name="detail" style="resize: none; height: 140px"
                                              class="form-control"></textarea>
                                    <br>
                                    <button type="submit" class="alignright btn btn-success">Submit</button>

                                </form>
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