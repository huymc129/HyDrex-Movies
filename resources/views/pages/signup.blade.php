<!doctype html>
<html lang="en-US">
<head>
   <!-- Required meta tags -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Streamit - Responsive Bootstrap 4 Template</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.ico"/>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css"/>
   <!-- Typography CSS -->
   <link rel="stylesheet" href="css/typography.css">
   <!-- Style -->
   <link rel="stylesheet" href="css/style.css"/>
   <!-- Responsive -->
   <link rel="stylesheet" href="css/responsive.css"/>
</head>
<body>
<div id="loading">
   <div id="loading-center">
   </div>
</div>

<!-- MainContent -->
<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-7 col-md-12 align-self-center">
            <div class="sign-user_card ">                    
               <div class="sign-in-page-data">
                  <div class="sign-in-from w-100 m-auto">
                     <form class="" action="index.html">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" name="customer_name" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter Full Name" autocomplete="off" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                               <label>Phone</label>
                               <input type="text" name="customer_phone" class="form-control mb-0" id="exampleInputEmail2" placeholder="Phone" autocomplete="off" required>
                            </div>
                         </div>
                           <div class="col-md-6">
                              <div class="form-group">  
                                 <label>E-mail</label>                               
                                 <input type="email" name="customer_email" class="form-control mb-0" id="exampleInputEmail3" placeholder="Enter email" autocomplete="off" required>
                              </div>
                           </div>
                           {{-- <div class="col-md-6">
                              <div class="form-group">
                                 <label>First Name</label>
                                 <input type="text" name="customer_name" class="form-control mb-0" id="exampleInputEmail2" placeholder="First Name" autocomplete="off" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">  
                                 <label>Last Name</label>                               
                                 <input type="email" name="customer_name" class="form-control mb-0" id="exampleInputEmail3" placeholder="Last Name" autocomplete="off" required>
                              </div>
                           </div> --}}
                           <div class="col-md-6">
                              <div class="form-group">   
                                 <label>Password</label>                              
                                 <input type="password" name="customer_password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required>
                              </div>
                           </div>
                           {{-- <div class="col-md-6">
                              <div class="form-group"> 
                                 <label>Repeat Password</label>                                
                                 <input type="password" name="customer_password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password" required>
                              </div>
                           </div> --}}
                           
                        </div>
                        {{-- <div class="custom-control custom-radio mt-2">
                           <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                           <label class="custom-control-label" for="customRadio1">Premium-$39 / 3 Months
                              with a 5 day free trial</label>
                         </div>
                         <div class="custom-control custom-radio mt-2">
                           <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                           <label class="custom-control-label" for="customRadio2"> Basic- $19 / 1 Month</label>
                         </div>
                         <div class="custom-control custom-radio mt-2">
                           <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                           <label class="custom-control-label" for="customRadio3">Free-Free</label>
                         </div> --}}
                      
                        <button type="submit" class="btn btn-hover my-2">Sign Up</button>
                                                            
                     </form>
                  </div>
               </div>    
               <div class="mt-3">
                  <div class="d-flex justify-content-center links">
                     Already have an account? <a href="{{route('login')}}" class="text-primary ml-2">Sign In</a>
                  </div>                        
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- MainContent End-->
<!-- jQuery, Popper JS -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Slick JS -->
<script src="js/slick.min.js"></script>
<!-- owl carousel Js -->
<script src="js/owl.carousel.min.js"></script>
<!-- select2 Js -->
<script src="js/select2.min.js"></script>
<!-- Magnific Popup-->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Slick Animation-->
<script src="js/slick-animation.min.js"></script>
<!-- Custom JS-->
<script src="js/custom.js"></script>
</body>
</html>