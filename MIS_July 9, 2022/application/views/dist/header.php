<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="<?php echo base_url(); ?>assets/js/UA-90680653-2.js"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@jilregina">
    <meta name="twitter:creator" content="@jilregina">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="JIL Regina">
    <meta name="twitter:description" content="Jesus Is Lord Church Regina">
    <meta name="twitter:image" content="<?php base_url(); ?>assets/img/meta-logo.png"> 

    <!-- Facebook -->
    <meta property="og:url" content="https://www.jilcanada.com/">
    <meta property="og:title" content="JIL Regina">
    <meta property="og:description" content="Jesus Is Lord Church Regina">

    <meta property="og:image" content="<?php base_url(); ?>assets/img/meta-logo.png">
    <meta property="og:image:secure_url" content="<?php base_url(); ?>assets/img/meta-logo.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Jesus Is Lord Church Regina">
    <meta name="author" content="JIL Regina">

    <title><?php echo $title; ?></title>

    <!-- vendor css -->
    <link href="<?php echo base_url(); ?>assets/css/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/pickerjs/picker.min.css" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/azia.css">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/meta-logo.png">

  </head>

  <body>

     <div class="az-header shadow-none">
      <div class="container">
        <div class="az-header-left">
            <!--<a href="<?php echo base_url(); ?>" class="az-logo">Home</a>-->
            <a href="<?php echo base_url(); ?>" class="az-logo"><img src="<?php echo base_url(); ?>assets/img/meta-jilr-logo.png" alt="logo.png"></a>
          <a href="" id="azNavShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-center">
          <input type="search" class="form-control" placeholder="Search for schedules and events...">
          <button class="btn"><i class="fas fa-search"></i></button>
        </div><!-- az-header-center -->
        <div class="az-header-right">
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><img src="assets/img/meta-logo.png" alt=""></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="assets/img//meta-logo.png" alt="">
                </div><!-- az-img-user -->
                <h6>System User</h6>
                <span>System Administrator</span>
              </div><!-- az-header-profile -->

              <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
              <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
              <a href="<?php echo base_url(); ?>Login" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->

    <div class="az-navbar az-navbar-dashboard-four">
      <div class="container">
<!--        <div class="az-navbar-header">
          <a href="index.html" class="az-logo">az<span>i</span>a</a>
        </div> az-navbar-header 
        <div class="az-navbar-search">
          <input type="search" class="form-control" placeholder="Search for anything...">
          <button class="btn"><i class="fas fa-search "></i></button>
        </div> az-navbar-search -->
        <ul class="nav">
          <li class="nav-label">Main Menu</li>
          <li class="nav-item active show">
            <a href="index.html" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Main Menu</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="<?php echo base_url(); ?>Members" class="nav-sub-link">Members</a></li>
              <li class="nav-sub-item"><a href="<?php echo base_url(); ?>Ministries" class="nav-sub-link">Ministries</a></li>
              <li class="nav-sub-item"><a href="<?php echo base_url(); ?>Lifegroups" class="nav-sub-link">Life Groups</a></li>
              <li class="nav-sub-item"><a href="<?php echo base_url(); ?>Calendar" class="nav-sub-link">Calendar of Activities</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="index.html" class="nav-link with-sub"><i class="typcn typcn-folder"></i>Reporting</a>
            <ul class="nav-sub">
              <li class="nav-sub-item">
                <a href="<?php echo base_url(); ?>Events" class="nav-sub-link">Attendance</a>
                <a href="<?php echo base_url(); ?>Lifegroup" class="nav-sub-link">Life Group</a>
                <a href="<?php echo base_url(); ?>Finance" class="nav-sub-link">Finances</a>
              </li>
            </ul>
          </li><!-- nav-item -->

<!--          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Pages</a>
            <ul class="nav-sub">
            <li class="nav-sub-item"><a href="page-profile.html" class="nav-sub-link">Profile</a></li>
            <li class="nav-sub-item"><a href="page-invoice.html" class="nav-sub-link">Invoice</a></li>
            <li class="nav-sub-item"><a href="page-signin.html" class="nav-sub-link">Sign In</a></li>
            <li class="nav-sub-item"><a href="page-signup.html" class="nav-sub-link">Sign Up</a></li>
            <li class="nav-sub-item"><a href="page-404.html" class="nav-sub-link">Page 404</a></li>
            <li class="nav-sub-item"><a href="page-faq.html" class="nav-sub-link">Faq</a></li>
            <li class="nav-sub-item"><a href="page-news-grid.html" class="nav-sub-link">News Grid</a></li>
            <li class="nav-sub-item"><a href="page-product-catalogue.html" class="nav-sub-link">Product Catalogue</a></li>
            <li class="nav-sub-item"><a href="page-project-list.html" class="nav-sub-link">Project List</a></li>
            <li class="nav-sub-item"><a href="page-order.html" class="nav-sub-link">Orders</a></li>
            <li class="nav-sub-item"><a href="page-pricing.html" class="nav-sub-link">Pricing</a></li>
            <li class="nav-sub-item"><a href="landing-sass.html" class="nav-sub-link">Landing Page</a></li>
            </ul>
          </li> nav-item -->
<!--          <li class="nav-item nav-item-mega">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i>Components</a>
            <div class="nav-sub nav-sub-mega">
              <div class="container-fluid">
                <div>
                  <ul class="nav">
                    <li><span>UI Elements</span></li>
                    <li class="nav-sub-item"><a href="elem-accordion.html" class="nav-sub-link active">Accordion</a></li>
                    <li class="nav-sub-item"><a href="elem-alerts.html" class="nav-sub-link">Alerts</a></li>
                    <li class="nav-sub-item"><a href="elem-avatar.html" class="nav-sub-link">Avatar</a></li>
                    <li class="nav-sub-item"><a href="elem-badge.html" class="nav-sub-link">Badge</a></li>
                    <li class="nav-sub-item"><a href="elem-breadcrumbs.html" class="nav-sub-link">Breadcrumbs</a></li>
                    <li class="nav-sub-item"><a href="elem-buttons.html" class="nav-sub-link">Buttons</a></li>
                    <li class="nav-sub-item"><a href="elem-cards.html" class="nav-sub-link">Cards</a></li>
                    <li class="nav-sub-item"><a href="elem-carousel.html" class="nav-sub-link">Carousel</a></li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-sub-item"><a href="elem-collapse.html" class="nav-sub-link">Collapse</a></li>
                    <li class="nav-sub-item"><a href="elem-dropdown.html" class="nav-sub-link">Dropdown</a></li>
                    <li class="nav-sub-item"><a href="elem-icons.html" class="nav-sub-link">Icons</a></li>
                    <li class="nav-sub-item"><a href="elem-images.html" class="nav-sub-link">Images</a></li>
                    <li class="nav-sub-item"><a href="elem-list-group.html" class="nav-sub-link">List Group</a></li>
                    <li class="nav-sub-item"><a href="elem-media-object.html" class="nav-sub-link">Media Object</a></li>
                    <li class="nav-sub-item"><a href="elem-modals.html" class="nav-sub-link">Modals</a></li>
                    <li class="nav-sub-item"><a href="elem-navigation.html" class="nav-sub-link">Navigation</a></li>
                  </ul>
                  <ul class="nav">
                    <li class="nav-sub-item"><a href="elem-pagination.html" class="nav-sub-link">Pagination</a></li>
                    <li class="nav-sub-item"><a href="elem-popover.html" class="nav-sub-link">Popover</a></li>
                    <li class="nav-sub-item"><a href="elem-progress.html" class="nav-sub-link">Progress</a></li>
                    <li class="nav-sub-item"><a href="elem-spinners.html" class="nav-sub-link">Spinners</a></li>
                    <li class="nav-sub-item"><a href="elem-toast.html" class="nav-sub-link">Toast</a></li>
                    <li class="nav-sub-item"><a href="elem-tooltip.html" class="nav-sub-link">Tooltip</a></li>
                  </ul>
                </div>
                <div>
                  <ul class="nav">
                    <li><span>Forms</span></li>
                    <li class="nav-sub-item"><a href="form-elements.html" class="nav-sub-link">Form Elements</a></li>
                    <li class="nav-sub-item"><a href="form-layouts.html" class="nav-sub-link">Form Layouts</a></li>
                    <li class="nav-sub-item"><a href="form-validation.html" class="nav-sub-link">Form Validation</a></li>
                    <li class="nav-sub-item"><a href="form-wizards.html" class="nav-sub-link">Form Wizards</a></li>
                    <li class="nav-sub-item"><a href="form-editor.html" class="nav-sub-link">WYSIWYG Editor</a></li>
                  </ul>
                </div>
                <div>
                  <ul class="nav">
                    <li><span>Charts</span></li>
                    <li class="nav-sub-item"><a href="chart-morris.html" class="nav-sub-link">Morris Charts</a></li>
                    <li class="nav-sub-item"><a href="chart-flot.html" class="nav-sub-link">Flot Charts</a></li>
                    <li class="nav-sub-item"><a href="chart-chartjs.html" class="nav-sub-link">ChartJS</a></li>
                    <li class="nav-sub-item"><a href="chart-sparkline.html" class="nav-sub-link">Sparkline</a></li>
                    <li class="nav-sub-item"><a href="chart-peity.html" class="nav-sub-link">Peity</a></li>
                  </ul>
                </div>
                <div>
                  <ul class="nav">
                    <li><span>Maps</span></li>
                    <li class="nav-sub-item"><a href="map-google.html" class="nav-sub-link">Google Maps</a></li>
                    <li class="nav-sub-item"><a href="map-leaflet.html" class="nav-sub-link">Leaflet</a></li>
                    <li class="nav-sub-item"><a href="map-vector.html" class="nav-sub-link">Vector Maps</a></li>
                    <li><span>Tables</span></li>
                    <li class="nav-sub-item"><a href="table-basic.html" class="nav-sub-link">Basic Tables</a></li>
                    <li class="nav-sub-item"><a href="table-data.html" class="nav-sub-link">Data Tables</a></li>
                  </nav>
                </div>
              </div> container 
            </div> nav-sub 
          </li> nav-item -->
        </ul><!-- nav -->
      </div><!-- container-fluid -->
    </div><!-- az-navbar -->