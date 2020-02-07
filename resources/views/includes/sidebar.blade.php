    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#collapse_1" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">
          <i class="fas fa-fw fa-cog"></i>
          <span>Users</span>
        </a>
        <div id="collapse_1" class="collapse" aria-labelledby="headingTwo">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('user.index')}}">List</a>
            <a class="collapse-item" href="{{ route('user.create')}}">Add New</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#collapse_2" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" aria-controls="collapse_2">
          <i class="fas fa-fw fa-cog"></i>
          <span>Task</span>
        </a>
        <div id="collapse_2" class="collapse" aria-labelledby="headingTwo">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('task.index')}}">List</a>
            <a class="collapse-item" href="{{ route('task.create')}}">Add New</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" aria-controls="collapse_3">
          <i class="fas fa-fw fa-cog"></i>
          <span>Permissions</span>
        </a>
        <div id="collapse_3" class="collapse" aria-labelledby="headingTwo">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('workfromhome.index')}}">List</a>
            <a class="collapse-item" href="{{ route('workfromhome.create')}}">Add New</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
