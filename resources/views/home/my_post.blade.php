<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    
      @include('home.homecss')
      <style type="text/css">
       
       .post_deg
       {
            padding: 30px;
            text-align: center;
            
        }

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: gray;
        }

        .des_deg
        {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            color: gray;
        }

        .img_des
        {

           height: 400px;
           width: 400px;
           padding: 30px;
           margin-left: auto;
           margin-right: auto;
           

        }


    </style>
      
    </head>
    <body>
      <!-- header section start -->
      <div class="header_section">
        
        @include('home.header')

        @include('home.banner')
        
         <!-- banner section end -->
      </div>

        @if(session()->has('message'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{ session()->get('message') }}
        </div>
                
        @endif

        @foreach($data as $data)

        <div class= "post_deg">
        @if ($data->image)
 
            <div><img class= "img_des" src="/postimage/{{$data->image}}" alt=""></div>
        @endif
            <h4 class= "title_deg">{{$data->title}}</h4>
            <h4>{!! nl2br(e($data->description)) !!}</h4>
            <p>Posted In: {{ $data->category?->name ?? 'Uncategorized' }}</p>

            <a onClick="return confirm('are you sure to delete this?')" href="{{ url('my_post_del', $data->id) }}" class="btn btn-danger">Delete</a>

            <a href="{{ url('post_update_page', $data->id) }}"  class="btn btn-primary">Update</a>
        </div>

        @endforeach
      
      </div>
     
    
     
        @include('home.footer')
        
     
   </body>
</html>