<div class="article" style="background-color: #fafafa; min-height: 250px">
    <div class="cart">
        <table id="tabl">
            <tr>
                <th>Mã Hóa Đơn</th>
                <th>Trạng Thái</th>
                <th>Ngày Đặt Hàng</th>
                <th>Tổng Tiền</th>
            </tr>
            <?php foreach ($data["bill"] as $bill) {?>
                <tr class='onRow'>
                    <td><?php echo $bill["id"];?></td>
                    <td>
                        <?php if($bill["status"]==1){?>
                            <select id="status">
                                <option value="1" selected="selected">Đang chờ xử lý</option>
                                <option  value="0">Hủy</option>
                            </select>
                        <?php }?>
                        <?php if($bill["status"]==2){?>
                            <p>Đang giao hàng</p>
                        <?php }?>
                        <?php if($bill["status"]==3){?>
                            <p>Hoàn thành</p>
                        <?php }?>
                    </td>
                    <td><?php echo date('d-m-Y',strtotime($bill["date"]));?></td>
                    <td><?php echo $bill["total_money"];?></td>
                </tr>
            <?php }?>
        </table>
    </div>
    <h1 id="kq"></h1>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#tabl tr td select").change(function(e){
            var id_bill = Number($(this).closest('.onRow').find('td:nth-child(1)').text());
            var new_status = Number($(this).closest('.onRow').find('td:nth-child(2) select').val());
            $.ajax({
                url:"http://localhost/Web-NoiThat/Home/UpdateBill",
                method:"post",
                data:{id:id_bill,status:new_status},
                success:function(data){
                  if(data == true){
                    alert("Hủy Thành Công!")
                    location.reload();
                  }else{
                    alert("Hủy Thất Bại!")
                  }
                }
            })
        })
    });

</script>