<?php
include_once "Includes/authCheck.php";
include_once 'action/DBConnect.php';
//mail list
$sql = "SELECT * FROM mail WHERE status=?";
$query = $conn->prepare($sql);
$query->execute([0]);
$list = $query->fetchAll();

include_once "Includes/header.php";
include_once "Includes/nav.php";

?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="" id="mail">
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
                            <!--                            <i class="fa fa-briefcase"> Search By Gallery : </i>-->
                            <!--                            <br>-->
                            <!--                            <Select v-model="searchVideo" class="form-control" v-on:change="getByGallery()">-->
                            <!--                                <option value="all">Show All</option>-->
                            <!--                                <option v-for="gallery in gallerySearchList" v-bind:value="gallery.id">-->
                            <!--                                    {{gallery.title|strlimit}}-->
                            <!--                                </option>-->
                            <!--                            </Select>-->
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
                                <h2><i class="fa fa-eye"> </i> Unchecked Mail List</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-striped">
                                    <tr>
                                        <th>S/n</th>
                                        <th width="50%">subject</th>
                                        <th width="20%">sender</th>
                                        <th width="20%">sender(email)</th>
                                    </tr>
                                    <?php
                                    if (empty($list)) {
                                        echo '<tr><td colspan="4"> No new mail ! go to <a href="/@dmin/Mail"><b>all mails</b></a></td></tr>';
                                    } else {
                                        foreach ($list as $key => $data) { ?>
                                            <tr v-on:click="mailDetail(<?= $data['id'] ?>)"
                                                class="mail-table mail-<?= $data['status'] ?>">
                                                <td><?= ++$key ?></td>
                                                <td><?= $data['subject'] ?></td>
                                                <td><?= $data['name'] ?></td>
                                                <td><?= $data['email'] ?></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </table>
                                <div class='mail'>
                                    <i class='alignright fa fa-times fa-2x text-danger' v-on:click='closeMail()'></i>
                                    <h4>
                                        <img src="/@dmin/docs/logo.png" alt="image">
                                        &nbsp;&nbsp;&nbsp;Real Nepal Engineering Solutions
                                    </h4>
                                    <div style="border: 2px solid lightgray;padding: 20px">
                                        <b>
                                            Sender Info :
                                            <br><i class="fa fa-user"></i> Name : {{mailData.name}}
                                            <br><i class="fa fa-envelope"></i> Email : {{mailData.email}}
                                            <br><i class="fa fa-phone"></i> Phone : {{mailData.phone}}
                                        </b>
                                        <hr>
                                        <div class="text-center">
                                            <h1>{{mailData.subject}}</h1>
                                            <br>
                                            <p>{{mailData.detail}}</p>
                                        </div>
                                        <hr>
                                    </div>
                                    <br>
                                    <textarea style="resize: none;" class="form-control" rows="3"
                                              placeholder="Type and press enter to reply . . ."></textarea>
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