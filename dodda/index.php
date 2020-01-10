<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'head_links.php'; ?>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">
    <?php include 'navigation.php'; ?>
    
    <div class="hero-slide owl-carousel site-blocks-cover">
      <?php
      $imagesArray = array('image_6.jpg','hero_1.jpg','bg_1.jpg');
      foreach ($imagesArray as $bannerImages) {
        $bannerUrls = "images/".$bannerImages ;
      ?>
      <div class="intro-section">
        <img src="<?php echo $bannerUrls ?>">
        <div class="overlay"></div>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center slider-text" data-aos="fade-up">
              <h1>Swami Vivekananda Jnana Kendra</h1>
            </div>
          </div>
        </div>
      </div>
      <?php }?>

    </div>
    

    <div></div>


    <div class="site-section basic-search" style="">
      <div class="container">        
        <section class="search-section">
          <form action="#" method="post" class="basic-search-form">
            <div class="row">
              <div class="col-md-12 ">
                <div class="search-title text-center">
                  <h3>For all your coaching needs!</h3>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3  p-0">
                    <select class="form-control search-slt search-field-1" id="">
                      <option value="">Select</option>
                      <option>Student one</option>
                      <option>Faculty one</option>
                    </select>
                  </div>

                  <div class="col-md-3  p-0">
                    <input type="text" class="form-control search-slt" placeholder="Enter Location">
                  </div>
                  <div class="col-md-3  p-0">
                    <select class="form-control search-slt" id="">
                      <option>Select Subject</option>
                      <option>Subject 1</option>
                      <option>Subject 2</option>
                    </select>
                  </div>
                  <div class="col-md-3  p-0">
                    <button type="button" class="btn btn-primary wrn-btn">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
    <!-- end basic search -->

    <!-- start medium search -->
    <div class="site-section medium-search">
      <div class="container">        
        <section class="">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6" style="">
                <div class="medium-search-title">
                  <h3>
                    Get the Best <br> Quality Teachers<br> Near You
                  </h3>
                  <p>
                    Our rigourous process and review mechanism separate best from the rest. You get only quality tutors at the convenience of your home.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="search-panel">
                  <form action="" method="" class="">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group form-check">                             
                            <label class="form-check-label checkbox-labels" for="home">
                              <input type="checkbox" class="form-check-input" id="home" checked> <i class="fas fa-home" style=""></i> Home Tuition
                            </label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-check">
                            <label class="form-check-label checkbox-labels" for="online">
                              <input type="checkbox" class="form-check-input" id="online"> <i class="fas fa-laptop" style=""></i> Online
                            </label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group form-check">                            
                            <label class="form-check-label checkbox-labels" for="center">
                              <input type="checkbox" class="form-check-input" id="center"> <i class="fab fa-centercode" style=""></i> Center
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <p class="text-center note-for-online">
                            <small>High speed internet is required for online tuition.</small>
                          </p>
                        </div>
                        <div class="col-md-12">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Category</label>
                              <select class="form-control">
                                <option value="">Select Category</option>
                                <option value="">Category List</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Subject</label>
                              <select class="form-control">
                                <option value="">Select Subject</option>
                                <option value="">Subject List</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Location</label>
                              <select class="form-control">
                                <option value="">Select Location</option>
                                <option value="">Location List</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="text-center">
                              <button class="btn btn-primary">
                                <i class="fas fa-search"></i> Get quality teachers
                              </button>
                            </div>
                          </div>
                        </div>                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- end medium search -->

    <!-- searched results -->
    <div class="site-section">
      <div class="container">
        <section class="results-section">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <div class="tutorial-locations" style="height: 550px;width: 100%;">
                  <div id="map" style="width: 100%;height: 100%;"></div>
                </div>
              </div>
              <div class="col-md-8"> 
                <section class="tutorial-list-section">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="searched-title">
                          <h5>
                            Searched Result Title
                          </h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <?php
                    for ($i=1; $i <=3 ; $i++) { 
                    ?>
                    <div class="row tuterial-list">
                      <div class="col-md-2">
                        <img src="images/person_2.jpg" class="img img-rounded img-fluid" style="border-radius: 50%;">
                        <p>
                          <i class="fa fa-map-marker"></i> Addrees
                        </p>
                      </div>
                      <div class="col-md-10">
                        <p>
                          <a class="float-left" href="#">
                            <strong>Maniruzzaman Akash</strong>
                            <small class="btn btn-sm btn-info">ID Number</small>
                          </a>

                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                          <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        </p>
                        <div class="clearfix"></div>
                        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>
                          <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> More action</a>  
                          <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Get Tuter</a>
                          <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i>Like</a>
                        </p>
                      </div>
                    </div>
                    <?php }?>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- end searched results -->

    <!-- achivements section -->
    <div class="site-section achivement-section" style="background-image: url(images/bg_4.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <section class="ftco-section ftco-counter img" id="section-counter">
          <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
              <h2 class="mb-4"><span>5 Years of</span> Experience</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
          <div class="row d-md-flex align-items-center justify-content-center">
            <div class="col-lg-10">
              <div class="row d-md-flex align-items-center">
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="icon"><span class="flaticon-doctor"></span></div>
                    <div class="text">
                      <strong class="number" data-number="18">0</strong>
                      <span>Certified Teachers</span>
                    </div>
                  </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="icon"><span class="flaticon-doctor"></span></div>
                    <div class="text">
                      <strong class="number" data-number="351">0</strong>
                      <span>Successful Kids</span>
                    </div>
                  </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="icon"><span class="flaticon-doctor"></span></div>
                    <div class="text">
                      <strong class="number" data-number="564">0</strong>
                      <span>Happy Parents</span>
                    </div>
                  </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="icon"><span class="flaticon-doctor"></span></div>
                    <div class="text">
                      <strong class="number" data-number="300">0</strong>
                      <span>Awards Won</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- end achivements section -->

    <!-- // 05 - Block -->
  <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-4">
            <h2 class="section-title-underline">
              <span>Our Customers Says</span>
            </h2>
          </div>
        </div>

        <div class="owl-slide owl-carousel">
          <?php
          for ($i=3; $i <=6 ; $i++) { 
          ?>
          <div class="ftco-testimonial-1">
            <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
              <div>
                <h3>Allison Holmes</h3>
                <span>Designer</span>
              </div>
            </div>
            <div>
              <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
            </div>
          </div>
          <?php }?>

        </div>
        
      </div>
    </div>

    <?php 
    include 'subscribe_form.php';
    include 'footer.php';
    ?>   
    

  </div>
  <!-- .site-wrap -->
  <?php include 'script_links.php'; ?>
  <script src="js/jquery.animateNumber.min.js"></script>
</body>

</html>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM_uULzojkkhIew706uqwf8KG75oEVuDQ  &callback=initMap">
</script><script>function initMap() {
  var bangalore = {lat: 12.9833, lng: 77.5833};
  var mark2 = {lat: 12.9933, lng: 77.6033};

  var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 13, center: bangalore});

  var marker = new google.maps.Marker({position: bangalore, label: 'B', map: map});
  var marker2 = new google.maps.Marker({position: mark2, label: 'A',map: map});
}</script>