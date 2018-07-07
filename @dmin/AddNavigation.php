<?php
include_once "Includes/authCheck.php";
include_once "Includes/header.php";
include_once "Includes/nav.php";

?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <?php
                    if (isset($_SESSION['nav_msg'])) {
                        echo "<div class='alert alert-warning text-center'>" . $_SESSION['nav_msg'] . "</div>";
                        unset($_SESSION['nav_msg']);
                    }
                    ?>
                </div>

                <div class="title_right" style="float: right;">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
<!--                            <input type="text" class="form-control" placeholder="Search for...">-->
<!--                            <span class="input-group-btn">-->
<!--                      <button class="btn btn-default" type="button">Go!</button>-->
<!--                    </span>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Navigation</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">

                                <form action="action/addNavigation.php" method="post"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label> <i class="fa fa-book"></i> Title : </label>
                                            <input type="text" name="title" class="form-control" required>
                                            <br> <label> <i class="fa fa-briefcase"></i> Category : </label>
                                            <select name="category" class="form-control">
                                                <option value="product">Product</option>
                                                <option value="services">Services</option>
                                                <option value="designing">Designing</option>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <label> Tab Status : </label>
                                            <br>
                                            <i class="fa fa-check fa-2x"></i> <input type="radio" name="tab_stat"
                                                                                     value="1">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times fa-2x"></i> <input
                                                    type="radio" name="tab_stat" value="0" checked>
                                            <br>
                                            <br>
                                            <label><i class="fa fa-image"> </i> Featured Image :</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <label> <i class="fa fa-tag"></i> Quote : </label>
                                    <input type="text" name="quote" class="form-control">
                                    <br>
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