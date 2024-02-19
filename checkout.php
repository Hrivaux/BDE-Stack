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
                        <div class="col-xl-12 mb-4">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="card p-lg-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                        <div class="bg-pattern-div"></div>
                                        <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Checkout  </h2>
                                    </div>
                                </div>                                 
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card bg-greyblue border-0 p-4 mb-5">
                                        <p class="mb-0 mont-font font-xssss text-uppercase fw-600 text-grey-500"><i class="fa fa-exclamation-circle"></i> Have A Coupon? <a class="expand-btn text-grey-500 fw-700" href="#coupon_info">Click Here To Enter Your Code.</a></p>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div class="page-title">
                                        <h4 class="mont-font fw-600 font-md mb-lg-5 mb-4">Billing address</h4>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">First Name</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Last Name</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Email</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Phone</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Country</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Address</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Twon / City</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-gorup">
                                                        <label class="mont-font fw-600 font-xssss">Postcode</label>
                                                        <input type="text" name="comment-name" class="form-control">
                                                    </div>        
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-check text-left mb-3">
                                                        <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1">
                                                        <label class="pt--1 form-check-label fw-600 font-xsss text-grey-700" for="exampleCheck1">Create an acount ?</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <h4 class="mont-font fw-600 font-md mb-5">Shipping address</h4>
                                        <div class="form-check text-left mb-3 mt-2">
                                            <input type="checkbox" class="form-check-input mt-2" id="exampleCheck2">
                                            <label class="pt--1 form-check-label fw-600 font-xsss text-grey-700" for="exampleCheck2">Ship to a different address ?</label>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="col-xl-5 offset-xl-1 col-lg-6">
                                     <div class="order-details">
                                         <h4 class="mont-font fw-600 font-md mb-5">Order Details</h4>
                                         <div class="table-content table-responsive mb-5 card border-0 bg-greyblue p-lg-5 p-4">
                                            <table class="table order-table order-table-2 mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="border-0">Product</th>
                                                        <th class="text-right border-0">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th class="text-grey-500 fw-500 font-xsss">Aliquam lobortis est 
                                                            <strong><span>✕</span>1</strong>
                                                        </th>
                                                        <td class="text-right text-grey-500 fw-500 font-xsss">$80.00</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-grey-500 fw-500 font-xsss">Auctor gravida enim 
                                                            <strong><span>✕</span>1</strong>
                                                        </th>
                                                        <td class="text-right text-grey-500 fw-500 font-xsss">$60.00</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td class="text-right text-grey-700 font-xsss fw-700">$56.00</td>
                                                    </tr>
                                                    <tr class="shipping">
                                                        <th>Shipping</th>
                                                        <td class="text-right">
                                                            <span class="text-grey-700 font-xsss fw-700">Flat Rate; $20.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Order Total</th>
                                                        <td class="text-right text-grey-700 font-xsss fw-700"><span class="order-total-ammount">$56.00</span></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="checkout-payment card border-0 mb-3 bg-greyblue p-lg-5 p-4">
                                            <form action="#" class="payment-form">
                                                <div class="payment-group mb-4">
                                                    <div class="payment-radio">
                                                        <input type="radio" value="bank" name="payment-method" id="bank" checked="">
                                                        <label class="payment-label fw-600 font-xsss text-grey-900 ms-2" for="cheque">Direct Bank Transfer</label>
                                                    </div>
                                                    <div class="payment-info" data-method="bank" >
                                                        <p class="font-xssss lh-24 text-grey-500 ps-4">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                                <div class="payment-group mb-4">
                                                    <div class="payment-radio">
                                                        <input type="radio" value="cheque" name="payment-method" id="cheque">
                                                        <label class="payment-label fw-600 font-xsss text-grey-900" for="cheque">
                                                            Cheque payments
                                                        </label>
                                                    </div>
                                                    <div class="payment-info cheque hide-in-default" data-method="cheque" style="display: none;">
                                                        <p class="font-xssss lh-24 text-grey-500 ps-4">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                                <div class="payment-group mb-0">
                                                    <div class="payment-radio">
                                                        <input type="radio" value="cash" name="payment-method" id="cash">
                                                        <label class="payment-label fw-600 font-xsss text-grey-900" for="cash">
                                                            Cash on Delivary
                                                        </label>
                                                    </div>
                                                    <div class="payment-info cash hide-in-default" data-method="cash" style="display: none;">
                                                        <p class="font-xssss lh-24 text-grey-500 ps-4">Pay with cash upon delivery.</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="card shadow-none border-0">
                                            <a href="#" class="w-100 p-3 mt-3 font-xsss text-center text-white bg-current rounded-3 text-uppercase fw-600 ls-3">Place Order</a>    
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