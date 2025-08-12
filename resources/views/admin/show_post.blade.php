<!DOCTYPE html>
<html>

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include ('admin.css')

    <style type="text/css">

        .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
         }

        .title_deg {
            font-size: 50px;
            font-weight: bold;
            text-align: center;

        }

        .table_deg {
            width: 100%;
            margin: auto;
            white-space: nowrap;
            

        }

        .th_deg {
            background-color: skyblue;
            color: black;
            padding: .75rem;
            vertical-align: middle;
            font-size: 18px;
        }

        .img_deg {
            height: 100%;
            width: 150px;
            padding: 10px;
        }
        .td_des {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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

            @if (session()->has('message'))
                <div class="alert alert-success">

                    <button type ="button" class="close" data-dismiss= "alert" area-hidden="true">x</button>

                    {{ session()->get('message') }}
                </div>
            @endif


        <div class= "table-responsive">
            <h1 class="title_deg"> All Posts</h1>

            <table class="table table-bordered table-striped">

                <tr class="th_deg">

                        <th>#</th>

                    <th>Post Title</th>

                    <th>Description</th>

                    <th>Post by</th>

                    <th>Post Status</th>

                    <th>UserType</th>

                    <th>Image</th>

                    <th>Delete</th>

                    <th>Edit</th>

                    <th>Status Accept</th>

                    <th>Status Reject</th>




                </tr>

                @foreach ($post as $post)
                    <tr>
                        <td class="td_des">{{ $post->id}}</td> 
                        <td class="td_des">{{ $post->title }}</td>
                        <td class="td_des">{{ $post->description }}</td>
                        <td class="td_des">{{ $post->name }}</td>
                        <td class="td_des">{{ $post->post_status }}</td>
                        <td class="td_des">{{ $post->usertype }}</td>
                        <td class="td_des">
                            <img class= "img_deg" src="/postimage/{{ $post->image }}"
                                style="width: 100px; height: 100px;">

                        </td>

                        <td class="td_des">

                            <a href= "{{ url('delete_post', $post->id) }}" class="btn btn-danger"
                                onClick= "confirmation(event)">Delete</a>
                        </td>

                        <td class="td_des">

                            <a href="{{ url('edit_page', $post->id) }}" class="btn btn-success">Edit</a>

                        </td>

                        <td class="td_des">

                            <a href="{{ url('accept_post', $post->id) }}" class="btn btn-outline-secondary">Accept</a>

                        </td>

                        <td class="td_des">

                            <a onClick= "return confirm('are you sure you want to reject?')" href="{{ url('reject_post', $post->id) }}" class="btn btn-primary">Reject</a>

                        </td>

                    </tr>
                @endforeach

                </div>

            </table>

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
