<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    
      @include('home.homecss')
      <style>
      /* Ensure the row uses flexbox for even distribution */
      .services_section_2 .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 30px;
      }

      /* Style each post container */
      .services_section_2 .col-md-5 {
        flex: 1 1 calc(33.333% - 30px); /* 3 per row with spacing */
        box-sizing: border-box;
        padding: 20px;
        text-align: center;
        background-color: #f9f9f9; /* Optional: subtle background */
        border-radius: 8px;
      }

      /* Responsive fallback for smaller screens */
      @media (max-width: 768px) {
        .services_section_2 .col-md-5 {
          flex: 1 1 100%;
        }
      }

      /* Smaller Read More button */
      .btn_main a {
        display: inline-block;
        padding: 6px 12px;
        font-size: 0.875rem;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease;
      }

      .btn_main a:hover {
        background-color: #0056b3;
      }

      </style>
      
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        
        @include('home.header')


         <!-- banner section start -->
        
        @include('home.banner')
        
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      
      @include('home.services')
      <!-- services section end -->
      <!-- about section start -->
      
      @include('home.about_us')

      <!-- about section end -->
      <!-- blog section start -->
      
      {{-- @include('home.blogsection') --}}
      
      <!-- blog section end -->
      <!-- client section start -->
      
      {{-- @include('home.client') --}}

      <!-- client section start -->
      <!-- choose section start -->

     {{-- @include('home.whychooseus') --}}
      
     <!-- choose section end -->
      <!-- footer section start -->
     
        @include('home.footer')
        
     
   </body>
</html>