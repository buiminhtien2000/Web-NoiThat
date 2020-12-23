<div class="backg-white billDeltail">
  <div class="col-md-5 col-lg-8" style="color: #1fecb3">
    <h5 style="color: #1dd9a5">Chi Tiết Đơn Hàng:</h5>
  </div>
  <div class="col-md-4 float-left">
    <div>
      <div class="col-md-12 float-left">
        <p class="text-dark font-weight-bold">Tên Khách Hàng: </p>
        <p class="text-dark"><?php echo $data["user"][0]["name"];?></p>
      </div>
      <div class="col-md-12 float-left">
        <p class="text-dark font-weight-bold">Số Điện Thoại: </p>
        <p class="text-dark"><?php echo $data["user"][0]["phoneOrEmail"];?></p>
      </div>
      <div class="col-md-12 float-left">
        <p class="text-dark font-weight-bold">Địa Chỉ: </p>
        <p class="text-dark"><?php echo $data["user"][0]["adress"]?></p>
      </div>
      <div class="col-md-12 float-left">
        <p id="idBill" style="display: none;"><?php echo $data["bill"][0]["id"]?></p>
        <p class="text-dark font-weight-bold">Trạng Thái: </p>
        <div>
          <select id="status">
            <option value="1" <?php echo ($data["bill"][0]["status"]==1)?"selected='selected'":"" ?>>Chờ Xử Lý</option>
            <option value="0" <?php echo ($data["bill"][0]["status"]==0)?"selected='selected'":"" ?>>Hủy</option>
            <option value="2" <?php echo ($data["bill"][0]["status"]==2)?"selected='selected'":"" ?>>Đang Giao Hàng</option>
            <option value="3" <?php echo ($data["bill"][0]["status"]==3)?"selected='selected'":"" ?>>Hoàn Thành</option>
          </select>
        </div>
      </div>
    </div>

  </div>
  <div class="col-md-8 float-left">
    <table style="width:100%;">
      <tr>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Thành Tiền</th>
      </tr>
      <?php foreach ($data["bill_detail"] as $bill_detail) {?>
      <tr>
        <td><?php echo $bill_detail["product_name"]?></td>
        <td><?php echo $bill_detail["quantity"]?></td>
        <td><?php echo ($bill_detail["quantity"]*$bill_detail["price"])?></td>
      </tr>
      <?php }?>
    </table>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var id_bill = Number($("#idBill").text());
    $("#status").change(function updateStatus(){
      var new_status = $("#status").val();
      $.ajax({
        url:"http://localhost/Web-NoiThat/ManagerBill/UpdateBill",
        method:"post",
        data:{id:id_bill,status:new_status},
        success:function(data){
          if(data == true){
            alert("Cập Nhật Thành Công!")
          }else{
            alert("Cập Nhật Thất Bại!")
          }
        }
      })
    })
  })
</script>