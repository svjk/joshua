
<!DOCTYPE html>
<html  >
<head>
  <?php include 'header_links.php'; ?>
  
  <style>
  .form-controls{
display:block;
width:100%;
height:39px;
padding:6px 12px;
font-size:14px;
line-height:1.42857143;
color:#555;
background-color:#fff;
background-image:none;
border:1px solid #ccc;
border-radius:4px;
-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s;
box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s.  
}  
.form-controls:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}
  .selectpicker{
  border:none;
	padding: 10px 30px 0 0;
	font-size: 35px;
	margin: 0 10px;
	color: #1d2050;
	 font-family: arimo-bold;
	 -webkit-appearance: none;  /*Removes default chrome and safari style*/
			-moz-appearance: none;
	background: transparent url(images/down-arrow.png) no-repeat 100% 70%;
 }
 #map {
  height: 400px;  /* The height is 400 pixels */
  width: 100%;  /* The width is the width of the web page */
 }
 .form-check-input::before {
    background-color: lightgreen;
}
#text-info-search{
  margin-top:13px;
  margin-bottom:35px;
}
#btn-search{
  background:#ffb833;
}
.testimonia{
  border-top:1px solid lightgray;
  border-bottom:1px solid lightgray;
  height:350px;
  margin-top:140px;
  background:#fff;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#progress{
  margin-top:50px;
  height:350px;
  background:#fff;
}
.progress-bar{
  background-color:#ffb833;
}
#testimoni_top{
  margin-top:-110px;
  background-color:#ffb833;
  height:320px;
  color:#fff;
}
#btn{
width:100%;
height:45px;
color:#fff;
background-color:#4285F4;
border:1px solid #4285F4;
border-radius:5px;
margin-bottom:25px;
cursor:pointer;
}
  </style>
  
   <script type="text/javascript">
   $(document).ready(function(){
   $(".owl-carousel").owlCarousel({
     items: 1,
     autoplay: true,
     smartSpeed: 700,
     loop: true,
     autoplayHoverPause: true,
     nav:true,
     dots: false,
     navText: ['<i class="fa fa-angle-left" style="font-size:40px;color:#fff"></i>','<i class="fa fa-angle-right" style="font-size:40px;color:#fff"></i>']
   });
   });
   </script>
</head>
<body>
  <?php include 'navBar.php';  ?>

  <section class="engine">
    <a href="https://mobirise.info/z">best css templates</a>
  </section>

  <section class="carousel slide cid-rm0qSWIqEB" data-interval="false" id="slider1-1l">
    <div class="full-screen">
		  <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="false" data-interval="false">
  			<ol class="carousel-indicators">
  				<li data-app-prevent-settings="" data-target="#slider1-1l" class=" active" data-slide-to="0"></li>
  				<li data-app-prevent-settings="" data-target="#slider1-1l" data-slide-to="1"></li>
  				<li data-app-prevent-settings="" data-target="#slider1-1l" data-slide-to="2"></li>
  			</ol>
  		  <div class="carousel-inner" role="listbox">
          <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url(assets/images/background1.jpg);">
            <div class="container container-slide">
              <div class="image_wrapper">
                <div class="mbr-overlay"></div>
                <img src="assets/images/background1.jpg">
                <div class="carousel-caption justify-content-center">
                  <div class="col-10 align-center">
                    <h2 class="mbr-fonts-style display-1">Swami Vivekananda Jnana Kendra</h2>
      							<div class="mbr-section-btn" buttons="0">
      								<a class="btn  display-4" href="index.php#search-panel" style="background-color:#ffb833;">Find Near Coach</a>
      							</div>
  						    </div>
  					    </div>
  					  </div>
  				  </div>
          </div>			
    			<div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url(assets/images/background3.jpg);">
    				<div class="container container-slide">
    					<div class="image_wrapper">
    						<div class="mbr-overlay"></div>
    						<img src="assets/images/background3.jpg">
      					<div class="carousel-caption justify-content-center">
      						<div class="col-10 align-right">
      							<h2 class="mbr-fonts-style display-1">For all your coaching needs! Register here</h2>
      							<div class="mbr-section-btn" buttons="0">
      							<a class="btn  display-4" href="index.php#search-panel" style="background-color:#ffb833;">Find Near Coach</a>
      							</div>
      						</div>
      					</div>
    					</div>
    				</div>
    			</div>
  		  </div>
  			<a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-1l">
  				<span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
  				<span class="sr-only">Previous</span></a>
  			<a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-1l">
  				<span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
  				<span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>

<br/>

<!-- Search Section -->
<section class="bg-dark" style='height:650px;color:#fff;'> 
    <div class="container-fluid">
        <div class='row'>
          <div class='col-md-6 col-sm-12 col-xs-6'>
          <div class="" style="margin:110px 15%;">
         <h1 class="display-2">Get the Best <br> Quality Teachers<br> Near You</h1>
         <br>
         <p>
          Our rigourous process and review mechanism separate best from the rest. You get only quality tutors at the convenience of your home.
         </p>
         </div>
          </div>
           <div class='col-md-6 col-sm-12 col-xs-6' id="search-panel">
           <div class='form-search' style="width:70%;background-color:#fff;height:435px;color:#000;margin-top:100px;border:1px solid lightgray;border-radius:5px;">
           <div clas='search-detail' style="margin:10px 8%;">
           <div class="form-check" style="margin-bottom:9px;">
            <input type="checkbox" class="form-check-input" id="home" checked><i class="fas fa-home" style="opacity:0.7"></i>
            <label class="form-check-label" for="home" style="Margin-right:38px;">Home Tuition</label>
            <input type="checkbox" class="form-check-input" id="online"><i class="fas fa-laptop" style="opacity:0.7"></i>
            <label class="form-check-label" for="online" style="Margin-right:38px;">Online</label>
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
        </div>
    </div>
</section>


</br>
<!-- Search result section -->
<div class="container-fluid">
<div class="row">
<div class="col-md-5">
<!-- Map section -->
<section class="map1 cid-rm0r1meH5H" id="map1-1m">
    <div class="google-map">
		<div id="map" style="border:1px solid lightgray;height:550px;background:#fff;"></div>
<!-- Replace the value of the key parameter with your own API key. -->
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
	</div>
</section>
</div>

<div class="col-md-7">
<section class="box" style="border:1px solid lightgray;height:550px;background:#fff;">
<div style="padding:15px 20px;border:1px solid lightgray;background:#f4f4f4;">
Home tuition
</div>
<div class="user-search" style="margin-left:20px;margin-top:20px;">
<div class="img-search">
<img src="assets/images/user.png" style="width:100;height:90px;border-radius:50%;border:1px solid lightgray;float:left">
</div>
<div class='name-search' style="width:150px;float:left;margin-left:15px;margin-top:8px;">
<h1 class="display-4">sombo josue</h1>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
</div>
<div class="salary" style="width:200px;float:left;margin-left:5px;margin-top:4px;">
<span style="display:block;width:80px;background-color:green;padding:5px;margin-bottom:5px;color:#fff;">₹ 750/hr</span>
<p><i class="fas fa-user"></i>&nbsp;ID proved</p>
</div>
<div class="clear" style="clear:both;">
<div>
<div class="name-about" style="width:100%;">
<h1 class="display-4">sombo josue</h1>
<button class="btn-primary" style="border:none;">More about Me</button>
</div>
</div>
<div>
<!-- second Tutors -->  
<div class="user-search" style="margin-left:1px;margin-top:20px;">
<div class="img-search">
<img src="assets/images/user.png" style="width:100;height:90px;border-radius:50%;border:1px solid lightgray;float:left">
</div>
<div class='name-search' style="width:150px;float:left;margin-left:15px;margin-top:8px;">
<h1 class="display-4">sombo josue</h1>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
</div>
<div class="salary" style="width:200px;float:left;margin-left:5px;margin-top:4px;">
<span style="display:block;width:80px;background-color:green;padding:5px;margin-bottom:5px;color:#fff;">₹ 750/hr</span>
<p><i class="fas fa-user"></i>&nbsp;ID proved</p>
</div>
<div class="clear" style="clear:both;">
<div>
<div class="name-about" style="width:100%;">
<h1 class="display-4">sombo josue</h1>
<button class="btn-primary" style="border:none;">More about Me</button>
</div>
</div>
<!-- Third totos -->
<div class="user-search" style="margin-left:1px;margin-top:20px;">
<div class="img-search">
<img src="assets/images/user.png" style="width:100;height:90px;border-radius:50%;border:1px solid lightgray;float:left">
</div>
<div class='name-search' style="width:150px;float:left;margin-left:15px;margin-top:8px;">
<h1 class="display-4">sombo josue</h1>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
<i class="far fa-star"></i>
</div>
<div class="salary" style="width:200px;float:left;margin-left:5px;margin-top:4px;">
<span style="display:block;width:80px;background-color:green;padding:5px;margin-bottom:5px;color:#fff;">₹ 750/hr</span>
<p><i class="fas fa-user"></i>&nbsp;ID proved</p>
</div>
<div class="clear" style="clear:both;">
<div>
<div class="name-about" style="width:100%;">
<h1 class="display-4">sombo josue</h1>
<button class="btn-primary" style="border:none;">More about Me</button>
</div>
</div>
<div>
<div>
</div>
</div>
</section>
</div>
</div>
</div>
</br>

<!-- Testimony -->
<section class="testimonia" style="">
  <div class="container-fluid">
   <div class="row">
   <!-- Left customer information -->
   <div class="col-md-5 col-sm-12 col-xs-12">
      <div style="position:relative;margin:100px 90px;">
        <p style="position:absolute;left:-70px;top:30px;transform:rotate(-90deg);color:#ffb833;">WHO WE ARE</p>
        <h4 class="display-2">
       What our <br>Customers Say
      </h4>
      </div>
   </div>
   <!-- Right customer information -->
  <div class="col-md-7 owl-carousel owl-theme" id="testimoni_top">
          <!-- First testimoni -->
           <div class="row" style="margin-top:11px;">
           <br>
          <div class="col-md-9" >
           <h3 class="display-2" style="font-size:28px;color:#fff;">Quality Support</h3>
          </div>
          <div class="col-md-3">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <div class="col-md-12">
           <p cite="">"Easy learn gave me step-by-step guidance on how to grow my business and make more money. My first major launch brought in $50,000 in one work"</p>
           </div>
           <div class="col-md-2">
           <img src="assets/images/user.png" alt="" class="">
           </div>
           <div class="col-md-10" style="line-height:8px;margin-top:30px;">
           <p>Sarah Jenks</p>
           <p>Master in MBA</p>
          </div>
          </div>

         <!-- Second testimoni -->
         <div class="row" style="margin-top:11px;">
         <br>
          <div class="col-md-9" >
           <h3 class="display-2" style="font-size:28px;color:#fff;">Quality Support</h3>
          </div>
          <div class="col-md-3">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <div class="col-md-12">
           <p cite="">"Easy learn gave me step-by-step guidance on how to grow my business and make more money. My first major launch brought in $50,000 in one work"</p>
           </div>
           <div class="col-md-2">
           <img src="assets/images/user.png" alt="" class="">
           </div>
           <div class="col-md-10" style="line-height:8px;margin-top:30px;">
           <p>Sarah Jenks</p>
           <p>Master in MBA</p>
          </div>
          </div>

         <!-- Third testimoni -->
        <div class="row" style="margin-top:11px;">
        <br>
           <div class="col-md-9" >
           <h3 class="display-2" style="font-size:28px;color:#fff;">Quality Support</h3>
          </div>
          <div class="col-md-3">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <div class="col-md-12">
           <p cite="">"Easy learn gave me step-by-step guidance on how to grow my business and make more money. My first major launch brought in $50,000 in one work"</p>
           </div>
           <div class="col-md-2">
           <img src="assets/images/user.png" alt="" class="">
           </div>
           <div class="col-md-10" style="line-height:8px;margin-top:30px;">
           <p>Sarah Jenks</p>
           <p>Master in MBA</p>
          </div>
          </div>
          <!-- Fourth testimoni -->
          <div class="row" style="margin-top:11px;">
           <br>
           <div class="col-md-9">
           <h3 class="display-2" style="font-size:28px;color:#fff;">Quality Support</h3>
          </div>
          <div class="col-md-3">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <div class="col-md-12">
           <p cite="">"Easy learn gave me step-by-step guidance on how to grow my business and make more money. My first major launch brought in $50,000 in one work"</p>
           </div>
           <div class="col-md-2">
           <img src="assets/images/user.png" alt="" class="">
           </div>
           <div class="col-md-10" style="line-height:8px;margin-top:30px;">
           <p>Sarah Jenks</p>
           <p>Master in MBA</p>
          </div>
          </div>
      <!-- End of testimony -->
   </div>
  </div>
</section>

<!-- Progress Bar -->
<section id="progress" class="container">
   <h2 class="display-2 " style="text-align:center;margin-top:15px;">Our Achievements</h2>
   <hr>
   <div class="row">
   <!-- Teachers pregress bar -->
   <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom:50px;">
   <!-- Number of teacher -->
   <div style="font-size:30px;">
    <i class="fas fa-chalkboard-teacher" style="margin-right:17px;color:#4285F4;"></i><span style=" color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">256</span>&nbsp;Teachers
   </div>
   <div class="progress" style="width:60%">
     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
   </div>
   </div>
   <!-- Student pregress bar -->
   <div class="col-md-6 col-sm-12 col-xs-12">
   
     <!-- Number of students -->
   <div style="font-size:30px;">
    <i class="fas fa-chalkboard-teacher" style="margin-right:17px;color:#4285F4"></i><span style=" color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">400</span>&nbsp;Students
   </div>
   <div class="progress" style="width:60%">
     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
   </div>
   </div>
   <!-- Center progress -->
   <div class="col-md-6 col-sm-12 col-xs-12">
    <!-- Number of students -->
   <div style="font-size:30px;">
    <i class="fas fa-school" style="margin-right:17px;color:#4285F4"></i><span style=" color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">30</span>&nbsp;Centers
   </div>
   <div class="progress" style="width:60%">
     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
   </div>
   </div>
   <!-- Experience people -->
   <div class="col-md-6 col-sm-12 col-xs-12">
   <!-- Number of students -->
   <div style="font-size:30px;">
    <i class="fab fa-accusoft" style="margin-right:17px;color:#4285F4"></i><span style=" color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">+300</span>&nbsp;Experts 
   </div>
   <div class="progress" style="width:60%">
     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
   </div>
   </div>
   </div>
</section>
<!-- End of progress bar -->
<!-- Footer Data -->
<section class="cid-rm0rlkkphC" id="footer1-1r">
    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    <a href="#">
                        <img src="assets/images/Logo.png" alt="Mobirise">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">
                    #184, Hennur Cross, Near Indian Academy College,Off Ring Road, Bengaluru-560043 Karnataka, India.
                </p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contacts
                </h5>
                <p class="mbr-text">
                    Email: svj.kendra@gmail.com
                    <br>Phone: 080-41722223
                    <br>Mobile No: 9741264243, 9731663600
                </p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Quick Links
                </h5>
                <p class="mbr-text">
                    <a class="text-primary" href="about.html">About</a>
                    <br><a class="text-primary" href="services.php">Services</a>
                    <br><a class="text-primary" href="contact.php">Contact</a>
                    <br><a class="text-primary" href="privacy.php">Privacy Policy</a>
                    <br><a class="text-primary" href="term.php">Term of Use</a>
                </p>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-8 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2019 Swami Vivekananda Jnana Kendra - All Rights Reserved
                    </p>
                </div>
               
            </div>
        </div>
    </div>
</section>

  <?php include 'script_links.php'; ?>
  
  
</body>
</html>