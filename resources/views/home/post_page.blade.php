<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->

      <base href="/public">
    
      @include('home.homecss')

        <style type="text/css">
    
        .div_des{

        text-align: center;
        }

        .img_deg{
          height: 150px;
          width: 150px;
          margin: auto
        }

        label{
          font-size: 18px;
          font-weight: bold;
          width: 200px;
          color:gray;
        }
        .input_deg
        {
            padding: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        textarea {
            width: 150%;
            max-width: 500px;
            padding: 10px;
            font-size: 14px;
        }

        .title_deg{

          padding: 30px;
          font-size: 30px;
          font-weight: bold;
        }
                 /* Force native select appearance */
         select {
            -webkit-appearance: menulist !important;
            -moz-appearance: menulist !important;
            appearance: menulist !important;
            display: block !important;
            /* width: 100% !important; */
            padding: 10px !important;
            font-size: 16px !important;
            border: 2px solid #ddd !important;
            border-radius: 4px !important;
            background-color: white !important;
            background-image: none !important;
         }

         /* Hide nice-select if it exists */
         .nice-select {
            display: none !important;
         }
        </style>
      
    </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        
        @include('home.header')

      </div>

        <div class="div_des">

           @if(session()->has('message'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{ session()->get('message') }}
        </div>

        @endif
        <div>
          <h1 class="services_taital">Update Post </h1>
        </div>
          @if ($errors->any())
          <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
          </div>
          @endif

            <form action="{{ url('update_post_data', $data->id) }}" method="POST" enctype= "multipart/form-data">

              @csrf
                
            <div class="input_deg">
                <label>Title</label>

                <input type="text" name="title" value="{{ $data->title }}">  
            </div>
            {{-- <div class="input_deg">
                <label>Slug</label>

                <input type="text" name="slug" value="{{ $data->slug }}">  
            </div> --}}

            <div class="input_deg" style="margin: 15px 0;">
                     <label style="display: block; margin-bottom: 8px;">Category</label>
                     <div style="justify-content: center;">
                        <select name="category_id" required>
                           <option value="">Select Category</option>
                           @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
              </div>
            

              <div class="input_deg">
                <label>Description</label>
                <textarea name="description">{{$data->description}}</textarea>
            </div>

             <div class="input_deg">
                <label>Current Image</label>
                <img class="img_deg" src="/postimage/{{ $data->image}}">
            </div>
            
             <div class="input_deg">
                <label>Change Current Image</label>

                <input type="file" name="image">  
            </div>
        
            <div class="input_deg">

                <input type="submit" class="btn btn-outline-secondary" value= "Update">  
            </div>

            </form>

        </div>        
      </div>
      
     
        @include('home.footer')
        
     
   </body>
</html>