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
                    <!--                    --><?php
                    //                    if (isset($_SESSION['login_msg'])) {
                    //                        echo "<div class='alert alert-success lead text-center'>" . $_SESSION['login_msg'] . "</div>";
                    //                        unset($_SESSION['login_msg']);
                    //                    }
                    //                    ?>
                </div>

                <div class="title_right" style="float: right;">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Navigation List</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="navigation">
                                <table class="table table-striped">
                                    <tr>
                                        <th>S/n</th>
                                        <th>Title</th>
                                        <th>featuerd image</th>
                                        <th>description</th>
                                        <th>category</th>
                                        <th>tab status</th>
                                        <th>created at</th>
                                        <th>action</th>
                                    </tr>
                                    <tr v-for="(nav,index) in navList">
                                        <td> {{ ++index }} </td>
                                        <td> {{ nav.title }} </td>
                                        <td> {{ nav.image }} </td>
                                        <td> {{ nav.detail }} </td>
                                        <td> {{ nav.category }} </td>
                                        <td> {{ nav.tab_stat }} </td>
                                        <td> {{ nav.created_at }} </td>
                                        <td>
                                            <button class="fa fa-edit btn btn-warning btn-sm "></button>
                                            <button class="fa fa-trash btn btn-danger btn-sm "></button>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                            <button id="test" v-on:click="testing()">TEST</button>
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