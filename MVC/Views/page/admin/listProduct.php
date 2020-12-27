
          <div class="row justify-content-end">
            <form class="mt-2 mr-2">
              <input type="text" placeholder="Tìm kiếm" id="textSearch">
              <input type="submit" value="Tìm Kiếm">
            </form>
          </div>
          <p><?php echo $data["message"];?></p>
          <div class="row mt-2 list-cart">
            <div class="col-sm-12 col-md-12 m-auto backg-white p-0">
              <div class="col-2 col-md-2 float-left text-center">Hình</div>
              <div class="col-3 col-md-2 float-left text-center">Tên</div>
              <div class="col-2 col-md-2 float-left text-center hidden-value d-md-block">Đơn Giá</div>
              <div class="col-2 col-md-2 float-left text-center">Ngày Nhập</div>
              <div class="col-2 col-md-2 float-left text-center">Số Lượng</div>
              <div class="col-2 col-md-2 float-left text-center">Thao Tác</div>
            </div>
            <?php foreach ($data["listProduct"] as $product) { ?>
            <div class="col-sm-12 col-md-12 m-auto row-align m-auto backg-white">
              <div class="col-md-2 col-sm-2 float-left"><img src="/Web-NoiThat/Public/upload/<?php echo $product["picture"]; ?>"></div>
              <div class="col-3 col-md-2 float-left">
                <p class="float-left text-dark"><?php echo $product["name"]; ?></p>
              </div>
              <div class="col-md-2 col-sm-2 float-left d-md-block hidden-value">
                <p class="text-danger"><?php echo $product["price"]; ?> đ</p>
              </div>
              <div class="col-md-2 col-sm-2 float-left">
                <p><?php echo $product["date"]; ?></p>
              </div>
              <div class="col-md-2 col-sm-2 float-left"><?php echo $product["quantity"]; ?></div>
              <div class="col-2 col-md-2 float-left"><a href="http://localhost/Web-NoiThat/ManagerProduct/deleteProduct/<?php echo $product["id"]?>">Xóa</a> | <a href="http://localhost/Web-NoiThat/ManagerProduct/pageUpdateProduct/<?php echo $product["id"]?>">Sửa</a> </div>
            </div>
          <?php }?>
            
          </div>
      