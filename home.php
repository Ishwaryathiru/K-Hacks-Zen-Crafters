<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Appointment Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    
</head>
<body style="background-color:#93999c">
    <div class="header">
        <div class="sub">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/021/809/795/small/doctors-day-illustration-png.png">
        </div>
        <div class="sub">
            <h1>Zen Hospitals</h1>
            <h6>Madurai,Tamilnadu</h6>
        </div>
    </div>

    <div class="specialists">
        <a href="appointment.php"><button class="specialistssub"><h4>Gynaecologists</h4></button></a>
        <a href="appointment.php"><button class="specialistssub"><h4>Cardiologists</h4></button></a>
        <a href="appointment.php"><button class="specialistssub"><h4>Dermatologists</h4></button></a>
        <a href="appointment.php"><button class="specialistssub"><h4>Physicians</h4></button></a>
        <a href="appointment.php"><button class="specialistssub"><h4>ENT</h4></button></a>
        
    </div>
    <br><br>
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="https://ehealth.eletsonline.com/wp-content/uploads/2009/07/best-hospital-in-south-india.jpg" style="width:100%">
          
        </div>
      
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="https://th-thumbnailer.cdn-si-edu.com/F6MN7vfNd8zeHpNYi58PzoC_OAo=/1000x750/filters:no_upscale()/https://tf-cmsv2-smithsonianmag-media.s3.amazonaws.com/filer/b4/c6/b4c65fd0-01ba-4262-9b3d-f16b53bca617/istock-172463472.jpg" style="width:100%">
        
        </div>
      
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="https://www.who.int/images/default-source/wpro/health-topic/hospitals/f8-11102016-my-6042.tmb-1024v.jpg?Culture=en&sfvrsn=57e1f33d_4" style="width:100%">
        
        </div>
      
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
   
      <br>
      
      <!-- The dots/circles -->
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
    </div>
    
    </div>
    <br><br>
    <div class="extras">
        <div class="extrassub">
            <centre><img src="https://cdn-icons-png.freepik.com/512/2/2306.png"></centre>
            <h3>WORKING HOURS</h3>
            <br>
            <centre><h6>SUN-SAT   8:00am-8.00pm</h6></centre>
        </div>
        <div class="extrassub">
            <centre><img src="https://cdn-icons-png.flaticon.com/512/1572/1572132.png"></centre>
            <h3>BOOK YOUR APPOINTMENTS HERE</h3>
            <h6>Striving towards excellence</h6>
            <h6>and working for the wellness of patients</h6>
            <a href="appointment.php"><button style="color:black;background-color: transparent;border:transparent"><h5>click here to book your appointmet</a>
        </div>
        <div class="extrassub">
            <centre><img src="https://i.pinimg.com/originals/74/84/ff/7484ff511b1fd025895d4985b54afd0a.png"></centre>
            <h3>EMERGENCY RESPONSE</h3>
            <h6>Get all time support in </h6>
            <h6>case of emergency.</h6>
        </div>
      
    </div>
   
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>
      <footer>
        <div class="icon">
              <div class="icondiv"><i class="fa fa-phone"> +918903871283</i></div>
              <div class="icondiv"><a href="mailto:nirutthyushasri@gmail.com"><i class="fa fa-google"></i></a></div>
        </div>
      </footer>
</body>