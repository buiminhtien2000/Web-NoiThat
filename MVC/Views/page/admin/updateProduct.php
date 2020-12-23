        <div class="row">
            <h2 class="custom-input">Cập Nhật Sản Phẩm</h2>
          </div>
          <form action="../updateProduct" method="post" enctype="multipart/form-data">
            <?php foreach ($data["product"] as $product) {?>
            <div class="form-row">
              <input type="hidden" class="form-control" name="id" value="<?php echo $product["id"];?>">
              <div class="col-10 col-md-5 custom-input">
                <input type="text" class="form-control" placeholder="Tên Sản Phẩm" name="name" value="<?php echo $product["name"];?>">
              </div>
              <div class="col-10 col-md-5 custom-input">
                <input type="text" class="form-control" placeholder="Giá Sản Phẩm" name="price" value="<?php echo $product["price"];?>">
              </div>
              <div class="col-10 col-md-5 custom-input">
                <select name="category" class="form-control">
                  <?php foreach ($data["category"] as $category) {?>
                  <option value="<?php echo $category["id"];?>" <?php echo ($category["id"] == $product["id_category"])?"selected='selected'":''; ?> ><?php echo $category["name"];?></option>
                  <?php }?>
                </select>
              </div>
              <div class="col-10 col-md-5 custom-input">
                <input type="number" class="form-control" min="1" name="quantity" value="<?php echo $product["quantity"];?>">
              </div>
              <div class="col-10 col-md-5 custom-input">
                <input type="file" class="form-control" name="file" value="">
              </div>
              <div class="col-10 col-md-11 custom-input">
                <textarea class="form-control" placeholder="Mô Tả" name="description"><?php echo $product["description"];?></textarea>
              </div>
              <div class="col-10 col-md-5 custom-input text-center">
                <input type="submit" name="update" Value="Cập Nhật" id="update">
                <input type="reset" name="" Value="Mới">
              </div>
            </div>
            <?php } ?>
          </form>
        </div>