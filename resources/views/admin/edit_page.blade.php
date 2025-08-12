<!DOCTYPE html>
<html>
  <head> 

    <base href="/public">

     
    @include ('admin.css')

        <style type="text/css">
      .post_title 
      {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color: gray;
      }


        .div_center
        {
            padding: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }
        textarea {
  width: 100%;
  max-width: 500px;
  padding: 10px;
  font-size: 14px;
}
      </style>

    </head>
  <body>
   
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      
      @include('admin.sidebar')


      <!-- Sidebar Navigation end-->

      <div class="page-content">

        @if(session()->has('message'))

         <div class ="alert alert-success">

          <button type="button" class="close" data-dismiss="alert" area-hidden="true">x</button>

          {{session()->get('message')}}

         </div>

        @endif

        <h1 class= "post_title" > Update Post</h1>


        <form action="{{url('update_post', $post->id) }}" method= "POST" enctype="multipart/form-data">

            @csrf  
            @method('POST') <!-- or 'PUT' if using PUT route -->
    <!-- form fields -->
            
                <div  class="div_center">

                    <label>Post Title</label>
                    <input type="text" name="title" value="{{ $post->title }}">

                </div>

                {{-- <div  class="div_center">

                    <label>Slug</label>
                    <input type="text" name="slug">

                </div> --}}

                <!-- New Category Dropdown -->
                <div class="div_center">
                    <label style="display: inline-block; margin-bottom: 8px; font-weight: bold;">Category</label>
                    <div style=" justify-content: center;">
                        <select name="category_id" required 
                              style="-webkit-appearance: menulist !important;
                                -moz-appearance: menulist !important;
                               appearance: menulist !important;
                               display: block !important;
                               /* width: 100% !important; */
                               padding: 10px !important;
                               font-size: 16px !important;
                               border: 1px solid #ddd !important;
                               border-radius: 4px !important;
                               background-color: white !important;
                                background-image: none !important;
                               text-align: center !important;">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                   <div class="div_center">

                    <label>Post Description</label>
                    <textarea name="description">{{$post->description}}</textarea>

                </div>

                <div class="div_center">

                   <label>Old Image</label>
                    <img style="margin:auto" height="150" width="150" src="/postimage/{{ $post->image }}" alt="Post Image" class="img_deg">


                </div>

                   <div class="div_center">

                    <label>Update Old Image</label>
                    <input type="file" name="image">

                </div>

                    <div class="div_center">

                    <input type="submit" value="Update" class= "btn btn-primary" >

                </div>
        </form>

      </div>
        
      @include('admin.footer')
  </body>
</html>