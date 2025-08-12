<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Administrator</h1>
            <p>Blog Audit</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class=""><a href="{{ url('show_post') }}"> <i class="icon-home {{ Request::is('editor/users') ? 'active' : ''}}"></i>Home </a></li>
                <li><a href="{{ url('post_page') }}"> <i class="icon-grid {{ Request::is('editor/users') ? 'active' : ''}}"></i>Add Post </a></li>
                <li><a href="{{ url('show_post') }}"> <i class="fa fa-bar-chart {{ Request::is('editor/users') ? 'active' : ''}}"></i>Show Post </a></li>
                <li><a href="{{ url('add_category') }}"> <i class="fa fa-bar-chart {{ Request::is('editor/users') ? 'active' : ''}}"></i>Categories </a></li>
                
        </ul>

      </nav>