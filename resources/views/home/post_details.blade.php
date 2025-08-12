<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    <style>
    .services_img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 100%;
        height: auto;
        padding: 20px;
    }
    
    .container {
        margin-top: 30px;
    }
</style>

        <base href="/public">
        
      @include('home.homecss')
      
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

            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          @if ($post->image)
          
            <div><img src="/postimage/{{$post->image}}" class="services_img"></div>
             @endif
            <h2><b>{{$post->title}}</b></h2>
            <h4>{!! nl2br(e($post->description)) !!}</h4>

            <p>Post By: <b>{{$post->name}}</b></p>
            <p>Posted In: {{ $post->category?->name ?? 'Uncategorized' }}</p>
        
        </div>
        </div>
        </div>


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