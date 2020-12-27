<div class="article" style="background-color: #fafafa;">
    <div class="content">
        <div class="product-detail">
            <div class="description">
                <div class="image-product">
                    <div class="large-image">
                        <img src="/Web-NoiThat/Public/upload/<?php echo $data["product"][0]["picture"];?>" alt="">
                    </div>
                    <!-- <div class="thumbnail">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                    </div> -->
                </div>
                <div class="info-product">
                    <p style="display: none" id="idProduct"><?php echo $data["product"][0]["id"]?></p>
                    <p id="price" style="display: none"><?php echo $data["product"][0]["price"]?></p>
                    <div class="product-name">
                        <p id="product_name"><?php echo $data["product"][0]["name"];?></p>
                    </div>
                    <div class="star-rating">
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="product-price">
                        <p id="price"><?php echo $data["product"][0]["price"];?>đ</p>
                    </div>
                    <div class="short-description">
                        <p><?php echo $data["product"][0]["description"];?></p>
                    </div>
                    <div class="quantity-product">
                        <input type="number" name="" value="1" min="1" max="20" id="quantity">
                    </div>
                    <div class="totalMoney">
                        <p id="total"><?php echo $data["product"][0]["price"];?> đ</p>
                    </div>
                    <div class="group-button">
                        <button class="button-buy" >Mua Ngay</button>
                        <button class="add-cart" id="add-cart">Thêm Vào Giỏ Hàng</button>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="description-detail">
              <h3>Thông tin chi tiết</h3>
                <table>
                    <tr>
                        <th colspan="2">CO-SPENCER Giường 6 Ft. 190x220x90 cm Màu Nâu Đậm</th>
                    </tr>
                    <tr>
                        <td>Chất liệu</td>
                        <td>Gỗ Ván Dăm</td>
                    </tr>
                    <tr>
                        <td>Thương Hiệu</td>
                        <td>Index</td>
                    </tr>
                    <tr>
                        <td>Màu sắc</td>
                        <td>Màu Nâu Đậm</td>
                    </tr>
                    <tr>
                        <td>Kích thước</td>
                        <td>120cm x 57cm x 190 cm</td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>
            <div class="feedback">
                <h3>Phản hồi và đánh giá</h3>
                <div class="star-rating">
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star checked" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <div class="comment">
                    <form>
                        <textarea placeholder="Nhận xét của bạn" name="content" id="content"></textarea>
                        <input type="hidden" name="idComment" id="idComment">
                        <input type="button" name="submit" value="Gửi" id="comment">
                    </form>
                    <div class="clear"></div>
                    <div class="comment-content">
                        <ul>
                            <?php foreach ($data["comment"] as $comment) {
                                if($comment["parent_id"] == 0){
                            ?>
                            <li>
                                <div class="comment-row">
                                    <div class="comment-info">
                                        <span class="img-user"><img src="/Web-NoiThat/Public/upload/120021290_1.jpg"></span>
                                        <span class="posted-by"><?php echo $comment["user_name"]?></span>
                                        <span class="posted-at">| Ngày: <?php echo $comment["date"]?></span>
                                    </div>
                                    <div class="comment-text">
                                        <p><?php echo $comment["content"]?></p>
                                    </div>
                                </div>
                                <ul style="padding:0 0 0 40px;">
                                    <?php foreach ($data["comment"] as $comment_parent) {
                                        if($comment_parent["parent_id"]==$comment["id"]){?>
                                    <li>
                                        <div class="comment-row">
                                            <div class="comment-info">
                                                <span class="img-user"><img src="/Web-NoiThat/Public/image/user.jpg"></span>
                                                <span class="posted-by"><?php echo $comment_parent["user_name"]?></span>
                                                <span class="posted-at">| Ngày: <?php echo $comment_parent["date"]?></span>
                                            </div>
                                            <div class="comment-text">
                                                <p><?php echo $comment_parent["content"]?></p>
                                            </div>
                                            <div class="activety">
                                                <a onclick="reply(<?php echo $comment["id"]?>)">Trả Lời</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </ul>
                            </li>
                            <?php 
                                    }
                                }
                            ?> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="aside">
            <h3>Sản phẩm nổi bật</h3>
            <div class="product">
                <div class="img-product">
                    <a href="">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                    </a>
                </div>
                <div class="info-product">
                    <a href="">
                        <p>CO-SPENCER Giường 6 Ft. 190x220x90 cm Màu Nâu Đậm</p>
                    </a>
                    <p>200.000.000đ</p>
                </div>
            </div>
            <div class="product">
                <div class="img-product">
                    <a href="">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                    </a>
                </div>
                <div class="info-product">
                    <a href="">
                        <p>CO-SPENCER Giường 6 Ft. 190x220x90 cm Màu Nâu Đậm</p>
                    </a>
                    <p>200.000.000đ</p>
                </div>
            </div>
            <div class="product">
                <div class="img-product">
                    <a href="">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                    </a>
                </div>
                <div class="info-product">
                    <a href="">
                        <p>CO-SPENCER Giường 6 Ft. 190x220x90 cm Màu Nâu Đậm</p>
                    </a>
                    <p>200.000.000đ</p>
                </div>
            </div>
            <div class="product">
                <div class="img-product">
                    <a href="">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                    </a>
                </div>
                <div class="info-product">
                    <a href="">
                        <p>CO-SPENCER Giường 6 Ft. 190x220x90 cm Màu Nâu Đậm</p>
                    </a>
                    <p>200.000.000đ</p>
                </div>
            </div>
            <div class="product">
                <div class="img-product">
                    <a href="">
                        <img src="/Web-NoiThat/Public/upload/120021290_1.jpg" alt="">
                    </a>
                </div>
                <div class="info-product">
                    <a href="">
                        <p>CO-SPENCER Giường 6 Ft. 190x220x90 cm Màu Nâu Đậm</p>
                    </a>
                    <p>200.000.000đ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="new-product">
        <h3>Sản phẩm liên quan</h3>
        <?php foreach ($data["productByCate"] as $productByCate) {?>
        <div class="product">
            <div class="card-header">
                <a href="../page/<?php echo $productByCate["id"]?>">
                    <img src="/Web-NoiThat/Public/upload/<?php echo $productByCate["picture"]?>" alt="">
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
                <a href="../page/<?php echo $productByCate["id"]?>">
                    <p><?php echo $productByCate["name"]?></p>
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
                    <p><?php echo $productByCate["price"]?>đ</p>
                </div>
                <div class="button-buy">
                    <button>Mua Ngay</button>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var listCart = {
            "idProduct":0,
            "productName":"",
            "price":"",
            "quantity":"",
            "totalMoney":0
        }
        $("#add-cart").click(function cart(){
            listCart.idProduct = $("#idProduct").text();
            listCart.productName = $("#product_name").text();
            listCart.price = Number($("#price").text());
            listCart.quantity = Number($("#quantity").val());
            listCart.totalMoney = listCart.price*listCart.quantity;
            let listItem = [];
            if (localStorage.getItem('listCart') != null) {
                listItem = JSON.parse(localStorage.getItem('listCart'));
                var result = true;
                for (i = 0; i < listItem.length; i++) {
                    if (listCart.idProduct == listItem[i].idProduct) {
                        listItem[i].quantity += listCart.quantity;
                        listItem[i].totalMoney += listCart.totalMoney;
                        result = true;
                        break;
                    } else {
                        result = false;
                    }
                }
                if (result == false) {
                    listItem.push(listCart);
                }
            } else {
                listItem.push(listCart);
            }
            localStorage.setItem('listCart', JSON.stringify(listItem));
            alert("Sản Phẩm Đã Được Thêm Vào Giỏ Hàng!")
        })
        $("#quantity").change(function(){
            var quantity = Number($("#quantity").val());
            var price = Number($("#price").text());
            var totalMoney = quantity*price;
            $("#total").html(totalMoney+" đ");
        })
        $("#comment").click(function comment(){
            var id_parent = $("#idComment").val()
            var content = $("#content").val();
            var id_product = $("#idProduct").text();
            $.ajax({
                url:"http://localhost/Web-NoiThat/Ajax/Comment",
                method:"post",
                data:{content:content,idProduct:id_product,parentId:id_parent},
                success:function(data){
                    console.log(data);
                  if(data == true){
                    location.reload()
                  }else{
                    alert("Cập Nhật Thất Bại!")
                  }
                }
            })
        })  
    });
    function reply(parent_id){
            $("#idComment").val(parent_id);
    }
</script>