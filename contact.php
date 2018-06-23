<?php
$title = "Contact Us";
include_once "includes/header.php"
?>

    <section class="page-header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Contact Us</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="index">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <div class="container">
        <div class="content-wrapper">
            <div class="contact-us-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mini-contact">
                            <h2>Email us</h2>
                            <p>If you're encountering an issue or problem when working with Real Nepal Engineering
                                Solution you can
                                always email us directly or via the form below</p>

                            <a href="mailto:#">dummyemail@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mini-contact">
                            <h2>Call us</h2>
                            <p>If you're encountering an issue or problem when working with Real Nepal Engineering
                                Solution you can
                                always call us directly</p>

                            <a href="#">call +977-01-4478746</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mini-contact">
                            <h2>Visit us</h2>
                            <address>
                                New Baneshwor,Kathmandu
                            </address>
                        </div>
                    </div><!-- /.row -->


                    <div class="row">
                        <div class="col-md-12">
                            <div class="map-wrapper">
                                <div id="mapCanvas" class="map-canvas"></div>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    <div class="contact-us-form">

                        <h2>Drop us a line</h2>


                        <form id="contactForm" action="sendemail.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label class="sr-only" for="name">Name</label>
                                        <span class="input-group-addon" id="basic-addon1"><i
                                                    class="fa fa-user"></i></span>
                                        <input id="name" name="name" type="text" class="form-control"
                                               required="" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label class="sr-only" for="email">Email address</label>
                                        <span class="input-group-addon" id="basic-addon2"><i
                                                    class="fa fa-envelope"></i></span>
                                        <input id="email" name="email" type="email" class="form-control"
                                               required="" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label class="sr-only" for="phone">Phone</label>
                                        <span class="input-group-addon" id="basic-addon3"><i
                                                    class="fa fa-phone"></i></span>
                                        <input id="phone" name="phone" type="text" class="form-control"
                                               placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label class="sr-only" for="subject">Subject</label>
                                        <span class="input-group-addon" id="basic-addon4"><i
                                                    class="fa fa-file-text"></i></span>
                                        <input id="subject" name="subject" type="text" class="form-control"
                                               required="" placeholder="Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group text-area">
                                <label class="sr-only" for="message">Message</label>
                                <span class="input-group-addon" id="basic-addon5"><i
                                            class="fa fa-file-text-o"></i></span>
                                <textarea id="message" name="message" class="form-control" rows="6" required=""
                                          placeholder="Message"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">Send</button>
                        </form>
                    </div>

                </div><!-- /.content-wrapper -->
            </div><!-- /.content-wrapper -->
        </div><!-- /.container -->


<?php include_once "includes/footer.php" ?>