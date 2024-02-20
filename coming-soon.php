<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include('templates/header.php'); ?>
        <!-- navigation top -->

        <!-- navigation left -->

         <?php include('templates/menu.php'); ?>
        <!-- main content -->
        <div class="main-content pt-0 bg-white ps-0 pe-0">
            
            
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 d-none d-xl-block p-0 vh-100 bg-image-contain bg-image-center bg-no-repeat" style="background-image: url(https://via.placeholder.com/1210x950.png);"></div>
                    <div class="col-xl-6 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                        <div class="card shadow-none border-0 ps-lg--5 me-auto coming-soon-card">
                            <div class="card-body rounded-0 text-left pt-md-5 mt-md-5 ps-0 pe-0">
                                <div class="timer w-100 mb-3 bg-grey-time"><div class="time-count"><span class="text-time">04</span> <span class="text-day">Day</span></div> <div class="time-count"><span class="text-time">04</span> <span class="text-day">Hours</span> </div> <div class="time-count"><span class="text-time">39</span> <span class="text-day">Min</span> </div> <div class="time-count"><span class="text-time">13</span> <span class="text-day">Sec</span> </div> </div>
                                <h2 class="fw-700 text-grey-900 display3-size display4-md-size lh-2">We're under <span class="text-primary">construction.</span> Check back for an update soon.</h2>
                                <div class="form-group mt-4 p-1 border p-2 bg-white rounded-3">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group icon-input mb-0">
                                                <i class="ti-email font-xs text-grey-400"></i>
                                                <input type="text" class="style1-input bg-transparent border-0 ps-5 font-xsss mb-0 text-grey-500 fw-500" placeholder="Email Address">
                                            </div>
                                        </div>

                                        
                                        <div class="col-lg-5">
                                            <a href="#" class="w-100 d-block btn bg-current text-white font-xssss fw-600 ls-3 style1-input p-0 border-0 text-uppercase ">Notify</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>        
        </div>
        <!-- main content -->

        
        <div class="app-footer border-0 shadow-lg bg-primary-gradiant">
            <a href="default.php" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
            <a href="default-video.php" class="nav-content-bttn"><i class="feather-package"></i></a>
            <a href="default-live-stream.php" class="nav-content-bttn" data-tab="chats"><i class="feather-layout"></i></a>            
            <a href="shop-2.php" class="nav-content-bttn"><i class="feather-layers"></i></a>
            <a href="default-settings.php" class="nav-content-bttn"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 shadow-xss"></a>
        </div>

        <div class="app-header-search">
            <form class="search-form">
                <div class="form-group searchbox mb-0 border-0 p-1">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <i class="input-icon">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </i>
                    <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                        <i class="ti-close font-xs"></i>
                    </a>
                </div>
            </form>
        </div>

    </div> 


    
    <script src="js/plugin.js"></script>
    <script src="js/countdown.js"></script> 
    <script src="js/scripts.js"></script>

    <script>
        $(function () {

           $('.timer').countdown('2021/6/31', function(event) {
              var $this = $(this).php(event.strftime(''
                // + '<span>%w</span> weeks '
                + '<div class="time-count"><span class="text-time">%d</span> <span class="text-day">Day</span></div> '
                + '<div class="time-count"><span class="text-time">%H</span> <span class="text-day">Hours</span> </div> '
                + '<div class="time-count"><span class="text-time">%M</span> <span class="text-day">Min</span> </div> '
                + '<div class="time-count"><span class="text-time">%S</span> <span class="text-day">Sec</span> </div> '));
            });
        });
    </script>
    
</body>

</html>