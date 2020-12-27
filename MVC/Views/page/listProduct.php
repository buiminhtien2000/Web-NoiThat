<div class="slide">
        <img class="slide-img" src="/Web-NoiThat/Public/image/banner_2.png" alt="">
        <img class="slide-img" src="/Web-NoiThat/Public/image/banner_4.png" alt="">
        <img class="slide-img" src="/Web-NoiThat/Public/image/banner_5.jpg" alt="">
    <button class="button-left" id="btn-prev"> < </button>
    <button class="button-right" id="btn-next"> > </button>
</div>
<div class="article">
    <div class="menus">
        <ul>
            <li><a href="">Sofa</a></li>
            <li><a href="">Bàn Ăn</a></li>
            <li><a href="">Tủ Quần Áo</a></li>
            <li><a href="">Giường</a></li>
            <li><a href="">Nệm</a></li>
            <li><a href="">Bàn Làm Việc</a></li>
        </ul>
    </div>
    <div class="new-product">
        <h3>Sản phẩm mới nhất</h3>
        <?php foreach ($data["product"] as $product) {?>
        <div class="product">
            <div class="card-header">
                <a href="../ProductDentail/<?php echo $product["id"]?>">
                    <img src="/Web-NoiThat/Public/upload/<?php echo $product["picture"];?>" alt="">
                </a>
                <div class="group-icon">
                    <div>
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <a href="http://localhost/Web-NoiThat/ProductDetail/page/<?php echo $product["id"]?>">
                    <p><?php echo $product["name"];?></p>
                </a>
                <div>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card-footer">
                <div class="price-product">
                    <p><?php echo $product["price"];?> đ</p>
                </div>
                <div class="button-buy">
                    <button>Mua Ngay</button>
                </div>
            </div>
        </div>
    <?php }?>
        <div class="clear"></div>
        <div class="pagination">
           <?php for ($i=0; $i < $data["totalPage"]; $i++) { 
                $page = $i+1;
                echo "<a href='http://localhost/Web-NoiThat/Home/Page/$page'>$page</a>";
            }?> 
        </div>
    
    </div>
    <!-- <div class="new-product">
        <h3>Sản phẩm bán chạy</h3>
        <div class="product">
            <div class="card-header">
                <a href="">
                    <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                </a>
                <div class="group-icon">
                    <div>
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                    <div>
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <a href="">
                    <p>CO-SPENCER Giường 6 Ft. 190x220x90 cm Màu Nâu Đậm</p>
                </a>
                <div>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
            </div>
            <div class="card-footer">
                <div class="price-product">
                    <p>200.000.000đ</p>
                </div>
                <div class="button-buy">
                    <button>Mua Ngay</button>
                </div>
            </div>
        </div>
    </div> -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var img = document.getElementsByClassName('slide-img');
        var index=0;
        var auto = setInterval(function(){$("#btn-next").click()},3000);
        var x = img.length;
        show(index);
        $("#btn-next").click(function next(){
            index++;
            if(index > x-1){
                index = 0;
            }
            show(index);
        });
        $("#btn-prev").click(function prev(){
            index--;
            if(index < 0){
                index= 0;
            }
            show(index);
        });
        function show(index){
            img[0].style.display = 'none';
            img[1].style.display = 'none';
            img[2].style.display = 'none';
            img[index].style.display = 'block';
        }
        $("#login").click(function LoginForm(){
            $("#FormLogin").css("display","block");
            $("#FormRegister").css("display","none");
        })
        $("#register").click(function LoginForm(){
            $("#form").css("display","none");
            $("#FormRegister").css("display","block");
        })
        $()
    })
</script>
