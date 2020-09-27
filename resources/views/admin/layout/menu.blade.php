<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{Route('IndexAdmin')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <!-- <li class="nav-item active">
    <a class="nav-link" href="{{Route('IndexAdmin')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Quản lí cửa hàng</span></a>
  </li> -->

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
        Interface
      </div> -->

  <!-- Nav Item - Pages Collapse Menu -->
  <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li> -->

  <!-- Nav Item - Utilities Collapse Menu -->
  <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <!-- <div class="sidebar-heading">
        Addons
      </div> -->

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <!-- data-toggle="collapse" -->
    <a class="nav-link collapsed" href="{{route('getAdmin')}}" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Cập nhật tài khoản</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="admin/users/lists">Danh sách tài khoản</a>
        <a class="collapse-item" href="{{Route('getAdd')}}">Thêm tài khoản</a>
        <!-- <a class="collapse-item" href="">Kho hàng</a>
            <a class="collapse-item" href="">Đơn hàng</a>
            <a class="collapse-item" href="">Doanh thu</a>
            <a class="collapse-item" href="">Đơn hàng</a> -->
        <!-- <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a> -->
      </div>
    </div>
  </li>
  <li class="nav-item">
    <!-- data-toggle="collapse" -->
    <a class="nav-link collapsed" href="{{route('getProduct')}}" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Cập nhật sẩn phẩm</span>
    </a>
    <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{Route('getProduct')}}">Danh sách sản phẩm</a>
        <a class="collapse-item" href="{{Route('getTypeProduct')}}">Thêm sản phẩm</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <!-- data-toggle="collapse" -->
    <a class="nav-link collapsed" href="{{route('listOrder')}}" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Xử lí đơn hàng</span>
    </a>
    <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('listOrder')}}">Danh sách đơn hàng</a>
        <a class="collapse-item" href="{{route('orderCancel')}}">Danh sách đơn hàng trả</a>
        <!-- <a class="collapse-item" href="">aaaa</a> -->

        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>
  <!-- <li class="nav-item">
    data-toggle="collapse"
    <a class="nav-link collapsed" href="{{route('importProduct')}}" data-target="#collapsePages7" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Nhập hàng</span>
    </a>
    <div id="collapsePages7" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('importProduct')}}">Phiếu nhập hàng</a>
        <a class="collapse-item" href="{{route('importList')}}">Danh sách phiếu nhập</a>
        <div class="collapse-divider"></div>
      </div>
    </div>
  </li> -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('reportSale')}}"  data-target="#collapsePages6" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Xem doanh thu theo ngày</span>
    </a>
    <div id="collapsePages6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('reportSale')}}">Doanh thu theo ngày</a>
        <a class="collapse-item" href="{{route('reportMonth')}}">Doanh thu theo tháng</a>
        <a class="collapse-item" href="{{route('reportYear')}}">Doanh thu theo năm</a>
        <!-- <a class="collapse-item" href="">aaaa</a> -->

        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('reportMonth')}}"  data-target="#collapsePages6" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Xem doanh thu theo tháng</span>
    </a>
    <div id="collapsePages6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('reportSale')}}">Doanh thu theo ngày</a>
        <a class="collapse-item" href="{{route('reportMonth')}}">Doanh thu theo tháng</a>
        <a class="collapse-item" href="{{route('reportYear')}}">Doanh thu theo năm</a>
        <!-- <a class="collapse-item" href="">aaaa</a> -->

        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('reportYear')}}"  data-target="#collapsePages6" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Xem doanh thu theo năm</span>
    </a>
    <div id="collapsePages6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('reportSale')}}">Doanh thu theo ngày</a>
        <a class="collapse-item" href="{{route('reportMonth')}}">Doanh thu theo tháng</a>
        <a class="collapse-item" href="{{route('reportYear')}}">Doanh thu theo năm</a>
        <!-- <a class="collapse-item" href="">aaaa</a> -->

        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>
  
  <!-- menu products -->
  <li class="nav-item">
    <!-- data-toggle="collapse" -->
    <a class="nav-link collapsed" href="{{route('listType')}}" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Cập nhật danh mục</span>
    </a>
    <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('listType')}}">Danh sách danh mục</a>
        <a class="collapse-item" href="{{route('getType')}}">Thêm danh mục</a>

        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('listBrand')}}"  data-target="#collapsePages5" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Cập nhật thương hiệu</span>
    </a>
    <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('listBrand')}}">Danh sách thương hiệu</a>
        <a class="collapse-item" href="{{route('formAddBrand')}}">Thêm thương hiệu</a>

        <div class="collapse-divider"></div>
      </div>
    </div>
  </li>
  <!-- xử lí bình luận -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('listCmt')}}"  data-target="#collapsePages5" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Xử lí bình luận</span>
    </a>
    <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('listBrand')}}">Danh sách thương hiệu</a>
        <a class="collapse-item" href="{{route('formAddBrand')}}">Thêm thương hiệu</a>

        <div class="collapse-divider"></div>
      </div>
    </div>
  </li> -->


  <!-- Nav Item - Charts -->
  <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>