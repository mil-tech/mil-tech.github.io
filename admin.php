<?php
    session_start();
    
    if(!isset($_SESSION['login_user'])){
        header('Location: login.html'); // Redirecting To Home Page
    }
    else{
        //Storing Session
        $login_session=$_SESSION['login_user'];
    }
    
?>

<!doctype html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" name="viewport" />
    
    <title>CODE NINJA TECHNOLOGIES - Free Multipurpose Business Template</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="assets/css/iconfont.css">
    <link rel="stylesheet" href="assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min-v4.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css' type='text/css' />
    <!--<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="assets/css/jquery.dm-uploader.min.css">


    <!--For Plugins external css-->
    <link rel="stylesheet" href="assets/css/plugins.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar-collapse">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class='preloader'>
        <div class='loaded'>&nbsp;</div>
    </div>
    <div class="culmn">

        <header id="main_menu" class="header navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                            data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="#inquiry">
                                            <img src="assets/images/codeninja-logo.png" />
                                        </a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->



                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                        <ul class="nav navbar-nav navbar-right">
                                            <li>
                                                <a href="#inquiry">Inquiry</a>
                                            </li>
                                            <li>
                                                <a href="#contacts">Contact</a>
                                            </li>
                                            <li>
                                                <a href="#accounts">Account</a>
                                            </li>
                                            <li>
                                                <a href="#billing">Billing</a>
                                            </li>

                                            <!-- <li>
                                                <a href="#contact">CONTACT US</a>
                                            </li> -->

                                            <li>
                                                <a href="assets/src/logout.php">Logout</a>
                                            </li>
                                            
                                            <li>
                                                <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form class="navbar-form" role="search">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Search">
                                                            </div>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>


                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>
        </header>
        <!--End of header -->


        <section class="admin-home">
        </section>


        <!--Inquiry table-->
        <section id="inquiry" class="othersservice">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_othersservice_area sections">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="head_title">
                                        <h3>INQUIRIES</h3>
                                        <div class="separator"></div>
                                    </div>

                                </div>

                                <div class="main_othersservice_content">
                                    <div class="col-sm-12 table-responsive">
                                        <table id="inquiry-table" class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr class="d-flex">
                                                    <th scope="col">ID <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Full Name <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Contact Number <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Email <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Company <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Message <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Inquiry Date <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Status <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="inquiry-body" class="table-striped table-hover">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="message-modal"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="message-modal-title"></h5>
                                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button> -->
                                            </div>
                                            <div class="modal-body" id="message-modal-body">

                                            </div>
                                            <div class="modal-footer" id="message-modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!--<button id="replybtn" type="button" class="btn btn-primary">Reply</button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contacts" class="othersservice">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_othersservice_area sections">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="head_title">
                                        <h3>CONTACTS</h3>
                                        <div class="separator"></div>
                                    </div>

                                </div>

                                <div class="main_othersservice_content">
                                    <div class="col-sm-12 table-responsive">
                                        <table id="contact-table" class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr class="d-flex">
                                                    <th scope="col">ID <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">First Name <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Last Name <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Email <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Phone 1 <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Phone 2 <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Phone 3 <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Status <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Created Date <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="contact-body" class="table-striped table-hover">
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="accounts" class="othersservice">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_othersservice_area sections">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="head_title">
                                        <h3>ACCOUNTS</h3>
                                        <div class="separator"></div>
                                    </div>

                                </div>

                                <div class="main_othersservice_content">
                                    <div class="col-sm-12 table-responsive">
                                        <table id="account-table" class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr class="d-flex">
                                                    <th scope="col">ID <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Company Name <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Contact Person <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Email <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Phone 1 <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Phone 2 <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Phone 3 <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Created Date <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <!--<th scope="col">Action </th>-->
                                                </tr>
                                            </thead>
                                            <tbody id="account-body" class="table-striped table-hover">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="addbill" class="othersservice hide">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_othersservice_area sections">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="head_title">
                                        <h3>Add Bill</h3>
                                        <div class="separator"></div>
                                    </div>

                                </div>

                                <div class="main_othersservice_content">
                                    <form id="billingform">
                                        <div class="col-sm-12">
                                            <!--<div class="head_title">
                                                <h3>LEAVE MESSAGE</h3>
                                                <div class="separator"></div>
                                            </div>-->
                                            <div class="single_content_left">
                                                <form id="billing-form">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <select class="form-control" name="accountname" id="selectaccount" style=""></select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" class="form-control" name="billingdate"
                                                                    placeholder="Billing Date" value=""
                                                                    required="" id="billingdate">
                                                            </div>
                                                            <div class="form-group">
                                                                <!--<input type="text" class="form-control" name="billingstatus"
                                                                    placeholder="Status" value="pending" required="">-->
                                                                <select class="form-control" name="billingstatus" id="selectstatus" style=""></select>
                                                            
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea type="textarea" name="remarks" class="form-control"
                                                                    rows="5" placeholder="Remarks...." value="test test test" required=""></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <!--<div class="form-group">-->
                                                                    <!-- Our markup, the important part here! -->
                                                                    <div id="drag-and-drop-zone" class="dm-uploader">
                                                                        <div class="dm-uploader-inner">
                                                                            <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop files here</h3>

                                                                            <div class="btn btn-primary mb-5">
                                                                                <span>Open the file Browser</span>
                                                                                <input id="attachedfiles" type="file" title='Click to add Files' multiple>
                                                                                <!--accept=".txt,.ppt,.pptx,.doc,.docx,.xlsx,.pdf,.jpg,.jpeg,.png"-->
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /uploader -->
                                                                <!--</div>-->
                                                            </div>

                                                        <div class="col-sm-4">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <b>FILE LIST</b>
                                                                </div>
                                                                <ul class="list-unstyled p-2 d-flex flex-column col card-body" id="files">
                                                                    <li class="text-muted text-center empty">No files uploaded.
                                                                            <!-- <p class="controls mb-2">
                                                                                    <button href="#" class="btn btn-sm btn-primary start" role="button">Start</button>
                                                                                    <button href="#" class="btn btn-sm btn-danger cancel" role="button" disabled="disabled">Cancel</button>
                                                                            </p> -->
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <center>
                                                            <div class="form-group">
                                                                <button id='save-btn' type="button" name="submit" class="btn form-control" style="">Save Billing</button>
                                                                <!-- <span id="loader" class="ajax-loader is-active"></span> -->
                                                            </div>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

          <section id="billing" class="othersservice">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_othersservice_area sections">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="head_title">
                                        <h3>Billing Details</h3>
                                        <div class="separator"></div>
                                    </div>

                                </div>

                                <div class="main_othersservice_content">
                                    <div class="col-sm-12 table-responsive">
                                        <table id="billdetails-table" class="table table-hover table-condensed">
                                            <thead class="thead-dark">
                                                <tr class="d-flex">
                                                    <th scope="col">ID <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Billing Date <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Company Name <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Status <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Remarks<span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    <th scope="col">Created Date <span style="float:right;"><i class="fa fa-sort"></i></span></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="billdetails-body" class="table-striped table-hover">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!--<section id="footer" class="footer_widget">
            <div class="video_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="main_widget">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">
                                            <div class="footer_logo">
                                                <img src="assets/images/codeninja-logo.png" alt="" />
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            </p>

                                        </div>
                                    </div>

                                    <div class="col-sm-3  col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>SITEMAP</h4>
                                                <div class="separator"></div>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="">Services</a>
                                                </li>
                                                <li>
                                                    <a href="">About Us</a>
                                                </li>
                                                <li>
                                                    <a href="">Our Team</a>
                                                </li>
                                                <li>
                                                    <a href="">Portfolio</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-3  col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>CASE STUDIES</h4>
                                                <div class="separator"></div>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="">January 2018</a>
                                                </li>
                                                <li>
                                                    <a href="">February 2018</a>
                                                </li>
                                                <li>
                                                    <a href="">March 2018</a>
                                                </li>
                                                <li>
                                                    <a href="">April 2018</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>NEWS</h4>
                                                <div class="separator"></div>
                                            </div>

                                            <div class="footer_subcribs_area">
                                                <p>Sign up for our mailing list to get latest updates and offers.</p>
                                                <form class="navbar-form navbar-left" role="search">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Search">
                                                        <button type="submit" class="submit_btn"></button>
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
            </div>
        </section>-->


        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_footer">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- START SCROLL TO TOP  -->

    <div class="scrollup">
        <a href="#">
            <i class="fa fa-home"></i>
        </a>
    </div>

    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    

    <script src='assets/js/vendor/jquery-migrate.min330a.js?ver=1.4.1'></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.mixitup.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/jquery.masonry.min.js"></script>
    <script src="assets/js/jquery.fancybox.pack.js"></script>

    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
    <!--<script src="assets/js/gmaps.min.js"></script>-->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- google maps-->
    <script type="text/javascript">
        // function showmap() {
        //     var mapOptions = {
        //         zoom: 8,
        //         scrollwheel: false,
        //         center: new google.maps.LatLng(-34.397, 150.644),
        //         mapTypeId: google.maps.MapTypeId.ROADMAP
        //     };
        //     var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        // }
    </script>

    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap.min.js"></script>

    <script src="assets/js/jquery.dm-uploader.js"></script>
    <!-- <script src="assets/js/demo-ui.js"></script>
    <script src="assets/js/demo-config.js"></script> -->

    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/admin_scripts.js"></script>
    <script src="assets/js/jquery.tabledit.js"></script>
    

    <script>
        // INQUIRY  
        function getcontent(elem){
             debugger;
             var name = $(elem).find('td:nth-child(2)').text();
             var message = $(elem).find('td:nth-child(6)').text();
             var email = $(elem).find('td:nth-child(4)').text();

             document.getElementById('message-modal-title').innerHTML = name;
             document.getElementById('message-modal-body').innerHTML = "<p class='message'>" + message + "</p>";
                                                
             var modalfooter =document.getElementById('message-modal-footer');
             var btnreply = document.getElementById('btnreply');

             if( btnreply !== null){
                 btnreply.parentNode.removeChild(btnreply);
             }

             var replybutton = document.createElement('button');
             replybutton.setAttribute('id','btnreply');
             replybutton.setAttribute('type','button');
             replybutton.setAttribute('class','btn btn-primary');
             replybutton.setAttribute('onclick','window.location.href=\'mailto:'+ email +'?Subject=Inquiry%20reply%20from%20Codeninja%20Tech%20Ph\'');
             replybutton.setAttribute('target','_blank');
             var text = document.createTextNode('Reply');

             replybutton.appendChild(text);          
             modalfooter.appendChild(replybutton);
                                                
             $('#message-modal').modal('show');
                                                
        }
        // ACCOUNTS BILLING - add billing
        function addBill(elem){
             debugger;
             var accountId = $(elem).find('td:nth-child(1)').text();
             var companyName = $(elem).find('td:nth-child(2)').text();
             
             var billing = document.getElementById('addbill');
             billing.classList.remove("hide");
             billing.classList.add("show");

             var selectaccount = document.getElementById("selectaccount"),
                opt = document.createElement("option");
                selectaccount.remove(selectaccount.selectedIndex);
                opt.value = accountId;
                opt.textContent = companyName;
                
                selectaccount.appendChild(opt);
                // selectaccount.options[selectaccount.options.selectedIndex].selected = true;

            var status = ["Pending", "Paid"];

            var selectstatus = document.getElementById("selectstatus"), opt;
                // select.remove(select.selectedIndex);
            for(var i=0; i<status.length; i++){
                opt = document.createElement("option");
                opt.value = status[i];
                opt.textContent = status[i];
                selectstatus.appendChild(opt);
            }
            // selectstatus.options[selectstatus.options.selectedIndex].selected = true;
                
             
            window.location.href="#addbill";  
        }
    </script>

   
    <!-- File item template -->
    <script type="text/html" id="files-template">
      
        <li class="media">
            
            <div class="media-body mb-1">
            <p class="mb-2">
                <strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
            </p>
            <div class="progress mb-2">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
                role="progressbar"
                style="width: 0%" 
                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            
            <p class="controls mb-2">
                <button href="#" class="btn btn-sm btn-primary start" role="button">Start</button>
                <button href="#" class="btn btn-sm btn-danger cancel" role="button" disabled="disabled">Cancel</button>
            </p>
            
            <hr class="mt-1 mb-1" />
            </div>
        </li>

    </script>

    <!-- Debug item template -->
    <script type="text/html" id="debug-template">
      <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
    </script>

    <script type="text/javascript">
      
        // date input field
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;       
        document.getElementById("billingdate").value = today;
    </script>

</body>

</html>