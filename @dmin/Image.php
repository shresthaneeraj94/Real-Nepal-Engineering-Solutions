<?php
include_once "Includes/authCheck.php";
//include_once 'action/DBConnect.php';
////navigation list
//$sql = "SELECT * FROM gallery";
//$query = $conn->prepare($sql);
//$query->execute();
//$list = $query->fetchAll();

include_once "Includes/header.php";
include_once "Includes/nav.php";

?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="" id="image">
            <div class="page-title">
                <div class="title_left">
                    <!--                    --><?php
                    //                    if (isset($_SESSION['gallery_msg'])) {
                    //                        echo "<div class='alert alert-success lead text-center'>" . $_SESSION['gallery_msg'] . "</div>";
                    //                        unset($_SESSION['gallery_msg']);
                    //                    }
                    //                    ?>
                </div>

                <div class="title_right" style="float: right;">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <i class="fa fa-briefcase"> Search By Gallery : </i>
                            <br>
                            <Select v-model="searchImage" class="form-control" v-on:change="getByGallery()">
                                <option value="all">Show All</option>
                                <option v-for="gallery in gallerySearchList" v-bind:value="gallery.id">
                                    {{gallery.title|strlimit}}
                                </option>
                            </Select>
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
                                <h2>Image List</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-striped">
                                    <tr>
                                        <th>S/n</th>
                                        <th>image</th>
                                        <th>caption</th>
                                        <th>gallery id</th>
                                        <th colspan="2">action</th>
                                    </tr>
                                    <tr v-for="(image,index) in imageList">
                                        <td> {{ ++index }}</td>
                                        <td>
                                            <img :src="'/img/Gallery/images/'+image.name" alt="image"
                                                 style="height:50px;">
                                        </td>
                                        <td> {{ image.caption |strlimit}}</td>
                                        <td> {{ image.gallery_id }}</td>
                                        <td>
                                            <button class="fa fa-edit btn btn-default btn-xs"
                                                    v-on:click="editImage(image.id)"></button>
                                        </td>
                                        <td>
                                            <button class="fa fa-trash btn btn-danger btn-xs"
                                                    v-on:click="deleteImage(image.id)"></button>
                                        </td>
                                    </tr>
                                </table>
                                <div class='caption'>
                                    <i class='fa fa-tag'> Caption : </i>
                                    <i class='alignright fa fa-times fa-2x' v-on:click='closeCap()'></i>
                                    <textarea rows='5' style='resize: none' v-model='caption'
                                              class='form-control'></textarea>
                                    <br>
                                    <button class='btn btn-success' v-on:click='submitCap()'>Submit</button>
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