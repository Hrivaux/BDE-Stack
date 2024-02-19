<?php
@session_start();
require('global.php');

connected_only();

include('templates/meta.php');
?>
<body class="color-theme-blue mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include('templates/header.php'); ?>
        <!-- navigation top -->

        <!-- navigation left -->

         <?php include('templates/menu.php'); ?>
        <!-- main content -->
        <div class="main-content bg-white right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12 cart-wrapper mb-4">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                        <div class="bg-pattern-div"></div>
                                        <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Cart <span class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">4 PRODUCT FOUND</span></h2>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-lg-8 mb-3">
                                    <div class="table-content table-responsive">
                                        <table class="table text-center">
                                            <thead class="bg-greyblue rounded-3">
                                                <tr>
                                                    <th class="border-0 p-4">&nbsp;</th>
                                                    <th class="border-0 p-4 text-left">Product</th>
                                                    <th class="border-0 p-4">Price</th>
                                                    <th class="border-0 p-4">Quantity</th>
                                                    <th class="border-0 p-4">Total</th>
                                                    <th class="border-0 p-4">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-thumbnail text-left ps-0">
                                                        <img src="https://via.placeholder.com/70x100.png" alt="Product Thumnail" class="w75 rounded-3">
                                                    </td>
                                                    <td class="product-headline text-left wide-column">
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">Super skinny blazer</a>
                                                        </h3>
                                                    </td>
                                                    <td class="product-p">
                                                        <span class="product-price-wrapper">
                                                            <span class="money text-grey-500 fw-600 font-xsss"><span class="font-xsssss">$</span> 49.00</span>
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="quantity">
                                                            <input type="number" class="quantity-input open-font fw-600" name="qty" id="qty-1" value="1" min="1">
                                                        <div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                                    </td>
                                                    <td class="product-total-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money fmont"><strong><span class="font-xsssss">$ </span>49.00</strong></span>
                                                        </span>
                                                    </td>
                                                    <td class="product-remove text-right"><a href="#"><i class="ti-trash font-xs text-grey-500"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail text-left ps-0">
                                                        <img src="https://via.placeholder.com/70x100.png" alt="Product Thumnail" class="w75 rounded-3">
                                                    </td>
                                                    <td class="product-headline text-left wide-column">
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss"> Jogging trousers</a>
                                                        </h3>
                                                    </td>
                                                    <td class="product-p">
                                                        <span class="product-price-wrapper">
                                                            <span class="money text-grey-500 fw-600 font-xsss"><span class="font-xsssss">$</span> 49.00</span>
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="quantity">
                                                            <input type="number" class="quantity-input open-font fw-600" name="qty" id="qty-2" value="1" min="1">
                                                        <div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                                    </td>
                                                    <td class="product-total-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money fmont"><strong><span class="font-xsssss">$ </span>49.00</strong></span>
                                                        </span>
                                                    </td>
                                                    <td class="product-remove text-right"><a href="#"><i class="ti-trash font-xs text-grey-500"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail text-left ps-0">
                                                        <img src="https://via.placeholder.com/70x100.png" alt="Product Thumnail" class="w75 rounded-3">
                                                    </td>
                                                    <td class="product-headline text-left wide-column">
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss"> Grey blue leather backpack</a>
                                                        </h3>
                                                    </td>
                                                    <td class="product-p">
                                                        <span class="product-price-wrapper">
                                                            <span class="money text-grey-500 fw-600 font-xsss"><span class="font-xsssss">$</span> 49.00</span>
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="quantity">
                                                            <input type="number" class="quantity-input open-font fw-600" name="qty" id="qty-3" value="1" min="1">
                                                        <div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                                    </td>
                                                    <td class="product-total-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money fmont"><strong><span class="font-xsssss">$ </span>49.00</strong></span>
                                                        </span>
                                                    </td>
                                                    <td class="product-remove text-right"><a href="#"><i class="ti-trash font-xs text-grey-500"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail text-left ps-0">
                                                        <img src="https://via.placeholder.com/70x100.png" alt="Product Thumnail" class="w75 rounded-3">
                                                    </td>
                                                    <td class="product-headline text-left wide-column">
                                                        <h3>
                                                            <a href="#" class="text-grey-900 fw-600 font-xsss">Dress with belt</a>
                                                        </h3>
                                                    </td>
                                                    <td class="product-p">
                                                        <span class="product-price-wrapper">
                                                            <span class="money text-grey-500 fw-600 font-xsss"><span class="font-xsssss">$</span> 49.00</span>
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="quantity">
                                                            <input type="number" class="quantity-input open-font fw-600" name="qty" id="qty-4" value="1" min="1">
                                                        <div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                                    </td>
                                                    <td class="product-total-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money fmont"><strong><span class="font-xsssss">$ </span>49.00</strong></span>
                                                        </span>
                                                    </td>
                                                    <td class="product-remove text-right"><a href="#"><i class="ti-trash font-xs text-grey-500"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="coupon float-left mb-2">
                                        <input type="text" class="input-code form-control h60 p-3" placeholder="Coupon Code..">
                                        <a href="#" class="bg-dark text-white fw-600 text-uppercase font-xssss border-dark border rounded-3 border-size-md d-inline-block w175 p-3 text-center ls-3">Apply Coupon</a>
                                    </div>
                                    <a href="#" class="update-cart bg-dark float-right text-white fw-600 text-uppercase font-xssss border-dark border rounded-3 border-size-md d-inline-block w175 p-3 text-center ls-3">Update Cart</a>
                                </div>
                                <div class="col-lg-4">
                                    <div class="checkout-payment card border-0 mb-3 bg-greyblue p-4">
                                        <div class="cart-totals">
                                            <h4 class="mont-font fw-600 font-md mb-5">Cart totals</h4>
                                            <div class="table-content table-responsive">
                                                <table class="table order-table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="font-xsss pt-2 fw-600">Subtotal</td>
                                                            <td class="font-xssss fw-700 text-grey-600 pt-2 text-right">$196.00</td>  
                                                        </tr>
                                                        <tr>
                                                            <td class="font-xsss pt-2 fw-600">Shipping</td>
                                                            <td class="font-xssss fw-700 text-grey-600 pt-2 text-right">
                                                                <span>Flat rate: $20.00</span>
                                                            </td>  
                                                        </tr>
                                                        <tr class="order-total">
                                                            <td class="font-xsss pt-2 fw-600">Total</td>
                                                            <td class="font-xssss fw-700 text-grey-600 pt-2 text-right">
                                                                <span class="product-price-wrapper">
                                                                    <span class="money fmont">$226.00</span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <a href="#" class="bg-dark float-right text-white fw-600 text-uppercase font-xsss border-dark border rounded-3 border-size-md d-inline-block w-100 p-3 text-center ls-3">Proceed To Checkout</a>
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
            <a href="default-follower.php" class="nav-content-bttn"><i class="feather-package"></i></a>
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