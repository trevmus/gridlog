<!DOCTYPE html>
<html lang="en">
  <head> 
    @include ('admin.css')
    </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')
      <div class="page-content">
        <div class="row">
          <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                      <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{$category->id}}</td> 
                      <td>{{ $category->name }}</td>
                      <td class="td_des">

                            <a href= "{{ url('destroy_category', $category->id) }}" class="btn btn-danger"
                                onClick= "confirmation(event)">Delete</a>
                      </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          
          @if(session('success'))
              <div class="alert alert-success">
                  {{-- {{ session('success') }} --}}
                  <button type ="button" class="close" data-dismiss= "alert" area-hidden="true">x</button>
                {{ session()->get('success') }}
              </div>
          @endif
          
          <div class="col-md-3">
             <div class="well">
              <form action="{{ route('admin.store_category') }}" method="POST">
              @csrf
              <h2>New Category</h2>
          
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          
              <br>
              <button type="submit" class="btn btn-success btn-block">Create Category</button>
              </form>
            </div> 
                
            @if($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
          </div>
        </div>
      </div>
      @include('admin.footer')

      <script type="text/javascript">
            function confirmation(ev) {

                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href'); // getting the url from the href attribute
                // using sweet alert to show the confirmation alert

                console.log(urlToRedirect); // logging the url to the console for debugging purposes

                swal({
                        title: "Are you sure?",
                        text: "Once deleted You can not recover this post!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }) // showing the alert
                    .then((willCancel) => {
                        if (willCancel) {

                            window.location.href = urlToRedirect; /// redirecting to the url

                        }

                    });
            }
            /// This function is used to show the confirmation alert when the delete button is clicked
        </script>
  </body>
</html>