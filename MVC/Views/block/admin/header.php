<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/Web-NoiThat/Public/css/adminCss.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head> 
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4 col-md-3 col-lg-3 col-xl-2 menu-left float-left p-0" id="hiddenMenus">
        <div class="card">
          <button onclick="show_hidden()" class="float-right">x</button>
          <div class="card-body text-center">
            <img src="/Web-NoiThat/Public/image/user.png">
          </div>
          <div class="card-footer">
            <ul>
              <li data-toggle="collapse" data-target="#Profile-user">
                <?php echo $_SESSION["SessionUser"][1]?> <i class="fas fa-angle-down"></i>
                <ul class="collapse" id="Profile-user">
                  <li class="nav-link"><a href="#!updateAccount">Cài Đặt</a></li>
                  <li class="nav-link"><a href="http://localhost/Web-NoiThat/Home/Logout">Đăng Xuất</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <ul class="navbar-nav">
          <li data-toggle="collapse" data-target="#productManager" class="nav-item "><i
              class="fas fa-clipboard-list"></i> Quản Lý Sản Phẩm <i class="fas fa-angle-down"></i>
            <ul class="navbar-nav collapse" id="productManager">
              <li class="nav-item"><a class="text-white nav-link" href="http://localhost/Web-NoiThat/ManagerProduct/Page">Thêm Sản Phẩm</a></li>
              <li class="nav-item"><a class="text-white nav-link" href="http://localhost/Web-NoiThat/ManagerProduct/listProduct">Danh Sách Sản Phẩm</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="http://localhost/Web-NoiThat/ManagerBill/Page" class="nav-link"><i class="fas fa-file-invoice-dollar"></i>
              Quản Lý Đơn Hàng</a></li>
          <li class="nav-item"><a href="http://localhost/Web-NoiThat/ManagerComment/ListComment" class="nav-link"><i class="fas fa-comments"></i> Quản Lý Bình Luận</a></li>
          <li class="nav-item"><a href="http://localhost/Web-NoiThat/Statistics/Page" class="nav-link"><i class="fas fa-chart-area"></i>Thống Kê</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-question-circle"></i> Trợ Giúp</a></li>
        </ul>
      </div>
      <div class="col-md-12 col-lg-12 col-xl-10 float-right" id="fullScreen">
        <div class="col-2 col-md-2 col-lg-2 float-left menu-top">
          <button class="navbar-toggler float-left" onclick="show_menu()">
            <i class="fas fa-bars"></i>
          </button>
        </div>
        <ul class="nav col-10 col-md-10 col-lg-10 justify-content-end menu-top float-left mb-2">
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fas fa-search"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="far fa-bell"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fas fa-cog"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="/Web-NoiThat/Public/image/user.png"></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown"><?php echo $_SESSION["SessionUser"][1]?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="!#managerAccount">Cài Đặt</a>
              <a class="dropdown-item" href="http://localhost/Web-NoiThat/Home/Logout">Đăng Xuất</a>
            </div>
          </li>
        </ul>