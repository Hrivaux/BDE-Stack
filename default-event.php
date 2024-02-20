
<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include('templates/header.php'); ?>
        <!-- navigation top -->

        <!-- navigation left -->

         <?php include('templates/menu.php'); ?>
        <!-- main content -->
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card w-100 border-0 shadow-none rounded-xxl border-0 mb-3 overflow-hidden ">
                                <div id="map" class="rounded-3 h400"></div>
                                <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCOdKtT5fapH3_OfhV3HFeZjqFs4OfNIew&callback=mapinitialize" type="text/javascript"></script>
                                <script type="text/javascript">

                                    

                                
                                var icons = { parking: { icon: 'images/map-marker.png' } };


                                // REPLACE WITH DATA FROM API
                                //TITLE | POSITION - LAT , LNG | ICON | TITLE | CONTENT
                                var airports = [
                                    { 
                                        position: { 
                                            lat: 53.3588026, 
                                            lng: -2.274919 }, 
                                        icon: 'parking',    
                                        content: '<div id="content"><div id="siteNotice"></div><h5 id="firstHeading" class="firstHeading"><b>Right here Right Now - Improv Comedy</b> </h5></div>'
                                    },
                                    { 
                                        position: { 
                                            lat: 53.8679434, 
                                            lng: -1.6637193 }, 
                                        icon: 'parking',    
                                        content: '<div id="content"><div id="siteNotice"></div><h5 id="firstHeading" class="firstHeading"><b>Open Mic-Stand up Comedy and Poetry</b></h5></div>'
                                    },
                                    { 
                                        position: { 
                                            lat: 54.661781, 
                                            lng: -6.2184331 }, 
                                        icon: 'parking',    
                                        content: '<div id="content"><div id="siteNotice"></div><h5 id="firstHeading" class="firstHeading"><b>Mohd Suhels Guide to the Galaxy</b></h5></div>'
                                    },
                                    { 
                                        position: { 
                                            lat: 55.950785, 
                                            lng: -3.3636419 }, 
                                        icon: 'parking',    
                                        content: '<div id="content"><div id="siteNotice"></div><h5 id="firstHeading" class="firstHeading"><b>Charlotte De Witte India Tour- Goa</b></h5></div>'
                                    },
                                    { 
                                        position: { 
                                            lat: 51.3985498, 
                                            lng: -3.3416461 }, 
                                        icon: 'parking',    
                                        content: '<div id="content"><div id="siteNotice"></div><h5 id="firstHeading" class="firstHeading"><b>A Stand-up Comedy Show by Rahul Dua </b></h5></div>'
                                    },
                                    { 
                                        position: { 
                                            lat: 51.4700223, 
                                            lng: -0.4542955 }, 
                                        icon: 'parking',    
                                        content: '<div id="content"><div id="siteNotice"></div><h5 id="firstHeading" class="firstHeading"><b>Sunburn Holi Weekend 2021 ft Vini Vici- Goa </b></h5></div>'}
                                ];

                                function initMap() {
                                    
                                    var uk = { 
                                        lat: 53.990221, 
                                        lng: -3.911132 
                                    };
                                    
                                    var map = new google.maps.Map( document.getElementById('map'), {
                                      zoom: 6,
                                      center: uk, 
                                      disableDefaultUI: true,
                                      styles: [{"featureType":"all","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"color":"#cee9de"},{"saturation":"2"},{"weight":"0.80"}]},{"featureType":"poi.attraction","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#f5d6d6"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"road.highway.controlled_access","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway.controlled_access","elementType":"labels.icon","stylers":[{"visibility":"on"},{"hue":"#0064ff"},{"gamma":"1.44"},{"lightness":"-3"},{"weight":"1.69"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"weight":"0.31"},{"gamma":"1.43"},{"lightness":"-5"},{"saturation":"-22"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"all","stylers":[{"visibility":"on"},{"hue":"#ff0000"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#ff0045"}]},{"featureType":"transit.station.bus","elementType":"all","stylers":[{"visibility":"on"},{"hue":"#00d1ff"}]},{"featureType":"transit.station.bus","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"transit.station.rail","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#00cbff"}]},{"featureType":"transit.station.rail","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"weight":"1.61"},{"color":"#cde2e5"},{"visibility":"on"}]}]
                                    });
                                          
                                    var InfoWindows = new google.maps.InfoWindow({});
                                    
                                    airports.forEach(function(airport) {    
                                        var marker = new google.maps.Marker({
                                          position: { lat: airport.position.lat, lng: airport.position.lng },
                                          map: map,
                                          icon: icons[airport.icon].icon,
                                          title: airport.title
                                        });
                                        marker.addListener('mouseover', function() {
                                          InfoWindows.open(map, this);
                                          InfoWindows.setContent(airport.content);
                                        });
                                    });
                                }

                                initMap();




                                </script>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                    <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                        <div class="card-image w-100">
                                            <img src="https://via.placeholder.com/400x300.png" alt="event" class="w-100 rounded-3">
                                        </div>
                                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg"><h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span class="ls-3 d-block font-xsss text-grey-500 fw-500">FEB</span>22</h4></div>
                                            <h2 class="fw-700 lh-3 font-xss">Right here Right Now -  Comedy 
                                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i class="ti-location-pin me-1"></i> Goa, Mumbai </span>
                                            </h2>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="memberlist mt-4 mb-2 ms-0 d-inline-block">
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss ls-3 text-center">+2</a></li>
                                            </ul>
                                            <a href="#" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">APPLY</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                    <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                        <div class="card-image w-100">
                                            <img src="https://via.placeholder.com/400x300.png" alt="event" class="w-100 rounded-3">
                                        </div>
                                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg"><h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span class="ls-3 d-block font-xsss text-grey-500 fw-500">FEB</span>22</h4></div>
                                            <h2 class="fw-700 lh-3 font-xss">Open Mic-Stand up Comedy and Poetry
                                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i class="ti-location-pin me-1"></i> Goa, Mumbai </span>
                                            </h2>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="memberlist mt-4 mb-2 ms-0 d-inline-block">
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss ls-3 text-center">+2</a></li>
                                            </ul>
                                            <a href="#" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">APPLY</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                    <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                        <div class="card-image w-100">
                                            <img src="https://via.placeholder.com/400x300.png" alt="event" class="w-100 rounded-3">
                                        </div>
                                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg"><h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span class="ls-3 d-block font-xsss text-grey-500 fw-500">FEB</span>22</h4></div>
                                            <h2 class="fw-700 lh-3 font-xss">Mohd Suhel's Guide to the Galaxy
                                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i class="ti-location-pin me-1"></i> Goa, Mumbai </span>
                                            </h2>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="memberlist mt-4 mb-2 ms-0 d-inline-block">
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss ls-3 text-center">+2</a></li>
                                            </ul>
                                            <a href="#" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">APPLY</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                    <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                        <div class="card-image w-100">
                                            <img src="https://via.placeholder.com/400x300.png" alt="event" class="w-100 rounded-3">
                                        </div>
                                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg"><h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span class="ls-3 d-block font-xsss text-grey-500 fw-500">FEB</span>22</h4></div>
                                            <h2 class="fw-700 lh-3 font-xss">Charlotte De Witte India Tour
                                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i class="ti-location-pin me-1"></i> Goa, Mumbai </span>
                                            </h2>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="memberlist mt-4 mb-2 ms-0 d-inline-block">
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss ls-3 text-center">+2</a></li>
                                            </ul>
                                            <a href="#" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">APPLY</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                    <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                        <div class="card-image w-100">
                                            <img src="https://via.placeholder.com/400x300.png" alt="event" class="w-100 rounded-3">
                                        </div>
                                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg"><h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span class="ls-3 d-block font-xsss text-grey-500 fw-500">FEB</span>22</h4></div>
                                            <h2 class="fw-700 lh-3 font-xss">A Stand-up Comedy Show by Rahul
                                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i class="ti-location-pin me-1"></i> Goa, Mumbai </span>
                                            </h2>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="memberlist mt-4 mb-2 ms-0 d-inline-block">
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss ls-3 text-center">+2</a></li>
                                            </ul>
                                            <a href="#" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">APPLY</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 pe-2 ps-2">
                                    <div class="card p-3 bg-white w-100 hover-card border-0 shadow-xss rounded-xxl border-0 mb-3 overflow-hidden ">
                                        <div class="card-image w-100">
                                            <img src="https://via.placeholder.com/400x300.png" alt="event" class="w-100 rounded-3">
                                        </div>
                                        <div class="card-body d-flex ps-0 pe-0 pb-0">
                                            <div class="bg-greylight me-3 p-3 border-light-md rounded-xxl theme-dark-bg"><h4 class="fw-700 font-lg ls-3 text-grey-900 mb-0"><span class="ls-3 d-block font-xsss text-grey-500 fw-500">FEB</span>22</h4></div>
                                            <h2 class="fw-700 lh-3 font-xss">Sunburn Holi Weekend 2021  
                                                <span class="d-flex font-xssss fw-500 mt-2 lh-3 text-grey-500"> <i class="ti-location-pin me-1"></i> Goa, Mumbai </span>
                                            </h2>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="memberlist mt-4 mb-2 ms-0 d-inline-block">
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li><a href="#"><img src="https://via.placeholder.com/50x50.png" alt="user" class="w30 d-inline-block"></a></li>
                                                <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss ls-3 text-center">+2</a></li>
                                            </ul>
                                            <a href="#" class="font-xsssss fw-700 ps-3 pe-3 lh-32 float-right mt-4 text-uppercase rounded-3 ls-2 bg-success d-inline-block text-white me-1">APPLY</a>
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

        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 days</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Ana Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-4 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">GROUPS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Studio Express</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 min</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Design</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-mini-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">De fabous</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-0 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">Pages</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Entropio Inc</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>

            </div>
        </div>

        
        <!-- right chat -->
        
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

    

    <div class="modal-popup-chat">
        <div class="modal-popup-wrap bg-white p-0 shadow-lg rounded-3">
            <div class="modal-popup-header w-100 border-bottom">
                <div class="card p-3 d-block border-0 d-block">
                    <figure class="avatar mb-0 float-left me-2">
                        <img src="https://via.placeholder.com/50x50.png" alt="image" class="w35 me-1">
                    </figure>
                    <h5 class="fw-700 text-primary font-xssss mt-1 mb-1">Hendrix Stamp</h5>
                    <h4 class="text-grey-500 font-xsssss mt-0 mb-0"><span class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                    <a href="#" class="font-xssss position-absolute right-0 top-0 mt-3 me-4"><i class="ti-close text-grey-900 mt-2 d-inline-block"></i></a>
                </div>
            </div>
            <div class="modal-popup-body w-100 p-3 h-auto">
                <div class="message"><div class="message-content font-xssss lh-24 fw-500">Hi, how can I help you?</div></div>
                <div class="date-break font-xsssss lh-24 fw-500 text-grey-500 mt-2 mb-2">Mon 10:20am</div>
                <div class="message self text-right mt-2"><div class="message-content font-xssss lh-24 fw-500">I want those files for you. I want you to send 1 PDF and 1 image file.</div></div>
                <div class="snippet pt-3 ps-4 pb-2 pe-3 mt-2 bg-grey rounded-xl float-right" data-title=".dot-typing"><div class="stage"><div class="dot-typing"></div></div></div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-popup-footer w-100 border-top">
                <div class="card p-3 d-block border-0 d-block">
                    <div class="form-group icon-right-input style1-input mb-0"><input type="text" placeholder="Start typing.." class="form-control rounded-xl bg-greylight border-0 font-xssss fw-500 ps-3"><i class="feather-send text-grey-500 font-md"></i></div>
                </div>
            </div>
        </div> 
    </div>

     

    

   


    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>

</html>