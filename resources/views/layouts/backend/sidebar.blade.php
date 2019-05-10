<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ Auth::user()->gravatar }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

<!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li>
        <a href="{{ url('/dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li><a href="#"><i class="fa fa-group"></i> Users </a></li>

<!-- Manage the pages for FrontEnd -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Pages</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('backend/blog/') }}"><i class="fa fa-circle-o"></i> All Posts</a></li>
          <li><a href="{{ url('backend/blog/create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
        </ul>
      </li>

<!--      Manage Students -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Students</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> All Students</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Add New</a></li>
        </ul>
      </li>

<!--      Manage Teachers -->
       <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Teachers</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> All Teachers</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Add New</a></li>
        </ul>
      </li>


      <li><a href="#"><i class="fa fa-folder"></i> <span>Categories</span></a></li>



    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
