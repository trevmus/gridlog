       <!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    
      @include('home.homecss')
      
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        
        @include('home.header')

{{-- 
         <!-- banner section start -->
         
        @include('home.banner')
        
         <!-- banner section end --> --}}
      </div>
   
      
    <div class="about_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <h1 class="about_taital">About Us</h1>
                     <p class="about_text">GridLog is a collaborative space for built environment professionals—architects, engineers, planners, and changemakers—who believe in shaping more than skylines. We tackle real-world challenges, spotlight emerging technologies, and share solutions that uplift communities. At the core of every post is a simple goal: to build smarter, more sustainable spaces that care for people and the planet.

 </p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
               <div class="col-md-6 padding_right_0">
                  <div><img src="images/Nai.png" class="about_img"></div>
               </div>
            </div>
         </div>
      </div>
      
     
        @include('home.footer')
        
     
   </body>
</html>