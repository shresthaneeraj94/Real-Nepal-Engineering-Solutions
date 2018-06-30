<?php
$title = "Contact Us";
session_start();
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
                            <p>If you're encountering an issue or problem when working with "Real Nepal Engineering
                                Solutions", you can
                                always email us directly or via the form below</p>

                            <a href="mailto:#">dummyemail@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mini-contact">
                            <h2>Call us</h2>
                            <p>If you're encountering an issue or problem when working with "Real Nepal Engineering
                                Solutions", you can
                                always email us directly or via the form below</p>

                            <a href="#">call +977-01-4478746</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mini-contact">
                            <h2>Visit us</h2>
                            <address>
                                795 Folsom Ave, Suite 600 <br>
                                San Francisco, CA 94107
                            </address>
                        </div>
                    </div>
                </div><!-- /.row -->

                <h1><i class="fa fa-map-marker"></i> MAP HERE</h1><br>


                <div class="directions-wrapper">
                    <div class="contact-directions">
                        <h2>Directions &amp; hours</h2>
                        <p>Dramatically re-enginner high standards in human capital vis-a-vis cross
                            functional networks credibly.</p>
                    </div>
                </div><!-- /.directions-wrapper -->

                <div class="contact-us-form">

                    <h2>Drop us a line</h2>
                    <?php
                    if (isset($_SESSION['mail_contact'])) {
                        echo "<div class='alert alert-success'><b> " . $_SESSION['mail_contact'] . "</b></div>";
                        unset($_SESSION['mail_contact']);
                    } ?>


                    <form action="/includes/mailAction.php" method="POST">
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