<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Web-NoiThat/Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Web-NoiThat/Public/css/detail.css">
    <link rel="stylesheet" type="text/css" href="/Web-NoiThat/Public/css/cart.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <div class="header">
            <div class="header-top">
                <div class="logo">
                    <img src="/Web-NoiThat/Public/image/logo.png">
                </div>
                <div class="search">
                    <form>
                        <input type="text" name="text_search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="header-icon">
                    <?php if(!isset($_SESSION["SessionUser"])){?>
                    <ul>
                        <li><a id="login" href="http://localhost/Web-NoiThat/Home/PageLogin"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng Nhập</a></li>
                        <li>|</li>  
                        <li><a id="register" href="http://localhost/Web-NoiThat/Home/PageRegister"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a></li>
                    </ul>
                    <?php }else{?>
                    <ul>
                        <li><a href="http://localhost/Web-NoiThat/Home/ManagerBill">Quản lý đơn hàng</a></li>
                        <li>|<li><a><?php echo $_SESSION["SessionUser"][1]?></a>
                          <div class="dropitem">
                            <div class="dropdown"></div>
                            <ul>
                              <li><a href="http://localhost/Web-NoiThat/Home/Account"> Quản lý tài khoản </a></li>
                              <li><a href="http://localhost/Web-NoiThat/Home/Logout">Đăng xuất</a></li>
                            </ul>
                          </div>
                        </li>
                    </ul>
                    <?php }?>
                </div>
            </div>
            <div class="header-bottom">
                <ul>
                    <li><a href="http://localhost/Web-NoiThat/Home">Trang Chủ</a></li>
                    <li><a href="">website</a></li>
                    <li><a href="">Bán Hàng</a></li>
                    <li><a href="">Marketing</a></li>
                    <li><a href="">Bảng Giá</a></li>
                    <li><a href="">Hỗ Trợ</a></li>
                    <li><a href="http://localhost/Web-NoiThat/ShoppingCart/page">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
        <!-- <script type="text/javascript">
            $(document).ready(function(){
              $("#login").click(function display_login(){
                $("#FormLogin").css({"display":"block"});
                $("#FormRegister").css({"display":"none"});
              })
              $("#register").click(function display_login(){
                $("#FormLogin").css({"display":"none"});
                $("#FormRegister").css({"display":"block"});
              })
            })
        </script> -->