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
            <div id="navigation">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Navigation List</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-striped">
                                    <tr>
                                        <th>S/n</th>
                                        <th>Title</th>
                                        <th>featuerd image</th>
                                        <th>description</th>
                                        <th>category</th>
                                        <th>tab status</th>
                                        <th>created at</th>
                                        <th colspan="2">action</th>
                                    </tr>
                                    <tr v-for="(nav,index) in navList">
                                        <td> {{ ++index }}</td>
                                        <td> {{ nav.title }}</td>
                                        <td> {{ nav.image }}</td>
                                        <td> {{ nav.detail }}</td>
                                        <td> {{ nav.category }}</td>
                                        <td> {{ nav.tab_stat }}</td>
                                        <td> {{ nav.created_at }}</td>
                                        <td>
                                            <button class="fa fa-edit btn btn-warning btn-sm"
                                                    v-on:click="navEdit(nav.id)"></button>
                                        </td>
                                        <td>
                                            <button class="fa fa-trash btn btn-danger btn-sm"
                                                    v-on:click="navDelete(nav.id)"></button>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                            <!--content here-->
                            <div class="navform"
                                 style="display:none;background:whitesmoke;border:2px solid grey;padding:10px;position: absolute;top:20px;left:200px;">
                                <i class="alignright fa fa-times fa-2x btn" v-on:click="closeEditForm()"></i>
                                <form v-on:submit.prevent="submitEdit()" style="padding: 40px">
                                    <div class="col-md-6">
                                        <label> <i class="fa fa-book"></i> Title : </label>
                                        <input type="text" v-model="editList.title" class="form-control" required>
                                        <br> <label> <i class="fa fa-briefcase"></i> Category : </label>
                                        <select v-model="editList.category" class="form-control">
                                            <option value="product">Product</option>
                                            <option value="services">Services</option>
                                            <option value="designing">Designing</option>
                                        </select>
                                        <br> <label> <i class="fa fa-info"></i> Description : </label>
                                        <textarea v-model="editList.detail" style="resize: none; height: 140px"
                                                  class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label> Tab Status : </label>
                                        <br>
                                        <i class="fa fa-check fa-2x"></i> <input type="radio" name="tab_stat"
                                                                                 v-model="editList.tab_stat"
                                                                                 value="1">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times fa-2x"></i> <input
                                                type="radio" name="tab_stat" v-model="editList.tab_stat" value="0"
                                                checked>
                                        <br>
                                        <br>
                                        <label><i class="fa fa-image"> </i> Featured Image :</label>
                                        <input type="file" id="file" ref="file" class="form-control" v-on:change="handleFileUpload()"/>
                                        <br>
                                        <button type="submit" class="alignright btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /page content -->


<?php include_once "Includes/footer.php"; ?>