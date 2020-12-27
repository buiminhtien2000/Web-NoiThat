        <div class="row">
            <h2 class="custom-input">Thêm Sản Phẩm</h2>
          </div>
          <form action="./addProduct" method="post" enctype="multipart/form-data" autocomplete="off">
            <p><?php echo $data["message"]?></p>
            <div class="form-row">
              <div class="col-10 col-md-5 custom-input">
                <input type="text" class="form-control" placeholder="Tên Sản Phẩm" name="name">
              </div>
              <div class="col-10 col-md-5 custom-input">
                <input type="text" class="form-control" placeholder="Giá Sản Phẩm" name="price">
              </div>
              <div class="col-10 col-md-5 custom-input">
                <select name="category" class="form-control">
                  <option value="1" selected="selected">Ghế</option>
                  <option value="2">Tủ</option>
                  <option value="3">Giường</option>
                  <option value="4">Bàn</option>
                </select>
              </div>
              <div class="col-10 col-md-5 custom-input">
                <input type="number" class="form-control" min="1" name="quantity">
              </div>
              <div class="col-10 col-md-5 custom-input">
                <input type="file" class="form-control" name="file">
              </div>
              <div class="col-10 col-md-11 custom-input">
                <textarea class="form-control" placeholder="Mô Tả" name="description"></textarea>
              </div>
              <div class="col-10 col-md-5 custom-input text-center">
                <input type="submit" name="insert" Value="Thêm">
                <input type="reset" name="" Value="Mới">
              </div>
            </div>
          </form>
        </div>