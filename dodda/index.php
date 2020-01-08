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


    <div class="site-section" style="background: rgb(172, 255, 82);">
      <div class="container">        
        <section class="search-section">
          <form action="#" method="post" class="basic-search-form">
            <div class="row">
              <div class="col-md-12 ">
                <div class="row">
                  <div class="search-title text-center">
                    <h3>For all your coaching needs!</h3>
                  </div>                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3  p-0">
                    <select class="form-control " id="">
                      <option value="">Select</option>
                      <option>Student one</option>
                      <option>Faculty one</option>
                    </select>
                  </div>

                  <div class="col-md-3  p-0">
                    <input type="text" class="form-control " placeholder="Enter Location">
                  </div>
                  <div class="col-md-3  p-0">
                    <select class="form-control " id="">
                      <option>Select Subject</option>
                      <option>Subject 1</option>
                      <option>Subject 2</option>
                    </select>
                  </div>
                  <div class="col-md-3  p-0">
                    <button type="button" class="btn btn-primary">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
    <!-- end basic search -->

    <!-- start adance search -->
    <div class="site-section" style="background: rgb(172, 255, 82, .5);">
      <div class="container">        
        <section>
          <div class="row">
            <div class='col-md-6 col-sm-12 col-xs-6'>
              <div class="" style="">
                <h1 class="display-2">Get the Best <br> Quality Teachers<br> Near You</h1>
                <br>
                <p>
                  Our rigourous process and review mechanism separate best from the rest. You get only quality tutors at the convenience of your home.
                </p>
              </div>
            </div>
            <!-- search panel -->
            <div class='col-md-6 col-sm-12 col-xs-6' id="search-panel">
              <div class='form-search' style="">
                <div clas='search-detail' style="">
                  <div class="form-check" style="">
                    <input type="checkbox" class="form-check-input" id="home" checked><i class="fas fa-home" style="opacity:0.7"></i>
                    <label class="form-check-label" for="home" style="">Home Tuition</label>
                    <input type="checkbox" class="form-check-input" id="online"><i class="fas fa-laptop" style="opacity:0.7"></i>
                    <label class="form-check-label" for="online" style="">Online</label>
                    <input type="checkbox" class="form-check-input" id="center"><i class="fab fa-centercode" style="opacity:0.7"></i>
                    <label class="form-check-label" for="center">Center</label>
                  </div>
                  <p id="text-info-search">High speed internet is required for online tuition.</p>
                  <form class="form-group">
                    <h4 class="display-4">Category</h4>
                    <div class="form-group">
                      <select class="form-controls">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <h4 class="display-4">Subject:</h4>
                    <div class="form-group">
                      <select class="form-controls">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <h4 class="display-4">Location</h4>
                    <div class="form-group">
                      <select class="form-controls">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                      </select>
                    </div>
                    <button type="submit" id="btn"  style="width:100%;margin-left:-2px;"><i class="fas fa-search"></i>&nbsp;&nbsp;Get quality teachers</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- end search panel -->
          </div>
        </section>
      </div>
    </div>
    <!-- end advanced search -->

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

</body>

</html>