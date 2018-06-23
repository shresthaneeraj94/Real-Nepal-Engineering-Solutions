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
        <div class="" id="gallery">
            <div class="page-title">
                <div class="title_left">
                    <?php
                    if (isset($_SESSION['gallery_msg'])) {
                        echo "<div class='alert alert-success lead text-center'>" . $_SESSION['gallery_msg'] . "</div>";
                        unset($_SESSION['gallery_msg']);
                    }
                    ?>
                </div>

                <div class="title_right" style="float: right;">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" v-model='searchTerm' v-on:keyup="search()" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
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
                                <h2>Gallery List</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-striped">
                                    <tr>
                                        <th>S/n</th>
                                        <th>Title</th>
                                        <th>featuerd image</th>
                                        <th>description</th>
                                        <th>navigation</th>
                                        <th>created at</th>
                                        <th>Add img/vid</th>
                                        <th colspan="2">action</th>
                                    </tr>
                                    <tr v-for="(gallery,index) in galleryList">
                                        <td> {{ ++index }}</td>
                                        <td> {{ gallery.title |strlimit}}</td>
                                        <td>
                                            <img :src="'/img/Gallery/featured/'+gallery.image" alt="image" style="height:50px;">
                                        </td>
                                        <td> {{ gallery.detail |strlimit}}</td>
                                        <td> {{gallery.navigation_id}}</td>
                                        <td> {{ gallery.created_at }}</td>
                                        <td>
                                            <button class="fa fa-plus btn btn-success btn-sm"
                                                    v-on:click="addDetail(gallery.id)"></button>
                                        </td>
                                        <td>
                                            <button class="fa fa-edit btn btn-default btn-xs"
                                                    v-on:click="galleryEdit(gallery.id)"></button>
                                        </td>
                                        <td>
                                            <button class="fa fa-trash btn btn-danger btn-xs"
                                                    v-on:click="galleryDelete(gallery.id)"></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--content here-->
                            <div class="galleryform"
                                 style="display:none;background:whitesmoke;border:2px solid grey;padding:10px;position: absolute;top:20px;left:100px;">
                                <i class="alignright fa fa-times fa-2x btn" v-on:click="closeGalleryEditForm()"></i>
                                <form v-on:submit.prevent="submitGallery()" style="padding: 40px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label> <i class="fa fa-book"></i> Title : </label>
                                            <input type="text" v-model="editGallery.title" class="form-control"
                                                   required>
                                            <br> <label> <i class="fa fa-briefcase"></i> Navigation : </label>
                                            <select v-model="editGallery.navigation_id" class="form-control">
                                                <?php foreach ($list as $item) echo "<option value='" . $item['id'] . "'>" . $item['title'] . "</option>"; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label><i class="fa fa-image"> </i> Featured Image :</label>
                                            <input type="file" id="file" ref="file" class="form-control"
                                                   v-on:change="handleGalleryFileUpload()"/>
                                            <br>
                                        </div>
                                    </div>
                                    <br>
                                    <label> <i class="fa fa-info"></i> Description : </label>
                                    <textarea v-model="editGallery.detail" style="resize: none; height: 140px"
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