<div ng-controller="managerBill">
  <div class="row">
    <h2 class="custom-input">Quản Lý Đơn Hàng</h2>
  </div>
  <div class="row mt-2 list-cart">
    <div class="col-sm-12 col-md-12 m-auto backg-white p-0">
      <div class="col-2 col-md-2 float-left text-center">Mã Hóa Đơn</div>
      <div class="col-4 col-md-3 float-left text-center">Tên KH</div>
      <div class="col-md-2 float-left text-center hidden-value d-md-block">Ngày Mua</div>
      <div class="col-3 col-md-2 float-left text-center">Tổng Tiền</div>
      <div class="col-3 col-md-3 float-left text-center"></div>
    </div>
    <?php foreach ($data["list_bill"] as $bill) { ?>
    <div class="col-sm-12 col-md-12 m-auto row-align backg-white">
      <div class="col-2 col-sm-2 col-md-2 float-left text-center">
        <p class="text-dark"><?php echo $bill["id"]?></p>
      </div>
      <div class="col-4 col-md-3 float-left text-center">
        <p class="text-dark"><?php echo $bill["user_name"]?></p>
      </div>
      <div class="col-3 col-md-2 float-left text-center hidden-value d-md-block">
        <p class="text-dark"><?php echo $bill["date"]?></p>
      </div>
      <div class="col-2 col-md-2 float-left text-center">
        <p class="text-danger"><?php echo $bill["total_money"]?></p>
      </div>
      <div class="col-4 col-md-3 float-left text-center"><a href="./ManagerBill/BillDetail/<?php echo $bill["id"]?>/<?php echo $bill["id_user"]?>" class="nav-link">Chi Tiết Hóa Đơn</a></div>
    </div>
    <?php } ?>
  </div>
</div>