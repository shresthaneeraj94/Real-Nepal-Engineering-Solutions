<?php
include_once "Includes/authCheck.php";
include_once "Includes/header.php";
include_once "Includes/nav.php";

?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="" id="navigation">
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
                            <i class="fa fa-briefcase"></i> Show by category :
                            <select v-model="search" class="form-control" v-on:change="getCategory()">
                                <option value="all">Show All</option>
                                <option value="product">Product</option>
                                <option value="services">Services</option>
                                <option value="designing">Designing</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="">

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
                                        <th>Quote</th>
                                        <th>featuerd image</th>
                                        <th>description</th>
                                        <th>category</th>
                                        <th>tab status</th>
                                        <th>created at</th>
                                        <th colspan="2">action</th>
                                    </tr>
                                    <tr v-for="(nav,index) in navList">
                                        <td> {{ ++index }}</td>
                                        <td> {{ nav.title |strlimit}}</td>
                                        <td> {{ nav.quote |strlimit}}</td>
                                        <td>
                                            <img :src="'../img/Navigation/'+nav.image" alt="image" style="height:50px;">
                                        </td>
                                        <td> {{ nav.detail | strlimit }}</td>
                                        <td> {{ nav.category }}</td>
                                        <td> {{ nav.tab_stat }}</td>
                                        <td> {{ nav.created_at }}</td>
                                        <td>
                                            <button class="fa fa-edit btn btn-default btn-sm"
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
                                            <option value="built">Built In</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label> Tab Status : </label>
                                        <br>
                                        <i class="fa fa-check fa-2x"></i>
                                        <input type="radio" name="tab_stat" v-model="editList.tab_stat" value="1">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times fa-2x"></i>
                                        <input type="radio" name="tab_stat" v-model="editList.tab_stat" value="0"
                                               checked>
                                        <br>
                                        <br>
                                        <label><i class="fa fa-image"> </i> Featured Image :</label>
                                        <input type="file" id="file" ref="file" class="form-control"
                                               v-on:change="handleFileUpload()"/>
                                        <br>
                                    </div>
                                    <br>
                                    <label> <i class="fa fa-tag"></i> Quote : </label>
                                    <input type="text" v-model="editList.quote" class="form-control">
                                    <br>
                                    <label> <i class="fa fa-info"></i> Description : </label>
                                    <textarea v-model="editList.detail" style="resize: none; height: 140px"
                                              class="form-control"></textarea>
                                    <br>
                                    <button type="submit" class="alignright btn btn-success">Submit</button>

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