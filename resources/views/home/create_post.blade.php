<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss')

      <style type="text/css">
         .div_deg {
            text-align: center;
         }

         .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: rgb(63, 59, 59);
         }

         label {
            display: inline-block;
            width: 200px;
            color: rgb(56, 50, 50);
            font-size: 20px;
            font-weight: bold;
         }

         .field_deg {
            padding: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
         }
         textarea {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            font-size: 14px;
        }

         /* Force native select appearance */
         select {
            -webkit-appearance: menulist !important;
            -moz-appearance: menulist !important;
            appearance: menulist !important;
            display: block !important;
            width: 100% !important;
            padding: 10px !important;
            font-size: 16px !important;
            border: 1px solid #ddd !important;
            border-radius: 4px !important;
            background-color: white !important;
            background-image: none !important;
            text-align: center !important;
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
         @include('home.banner')
      </div>
         <div class="div_deg">
         
            @include('sweetalert::alert')

         
        <h1 class="services_taital">Add New Post </h1>
         </div>
         <div class="field_deg">
               <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="field_deg">
                     <label>Title</label>
                     <input type="text" name="title">
                  </div>

                  {{-- <div class="field_deg">
                     <label>Slug</label>
                     <input type="text" name="slug">
                  </div> --}}

                  <!-- Category Dropdown -->
                  <div class="field_deg" >
                     <label style="display: inline-block; margin-bottom: 8px; font-weight: bold;">Category</label>
                     <div style=" justify-content: center;">
                        <select name="category_id" required>
                           <option value="">Select Category</option>
                           @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>

                  <div class="field_deg">
                     <label>Description</label>
                     <textarea name="description"></textarea> 
                  </div>

                  <div class="field_deg">
                     <label>Add Image</label>
                     <input type="file" name="image">
                  </div>

                  <div class="field_deg">
                     <input type="submit" value="Add Post" class="btn btn-secondary">
                  </div>
               </form>
            </div>
         </div>
      </div>
     
      @include('home.footer')
   </body>
</html>