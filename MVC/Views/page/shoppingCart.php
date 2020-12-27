<div class="article" style="background-color: #fafafa;min-height: 250px">
    <div class="cart">
        <table id="tabl">
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
            </tr>
        </table>
        <div class="group-button">
            <p id="totalMoney"></p>
            <button id="buy">Thanh Toán</button>
        </div>
    </div>
    <h1 id="kq"></h1>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var listItem = JSON.parse(localStorage.getItem('listCart'));
        let totalMoney = 0;
        for (i =0; i < listItem.length; i++) {
            var price = Number(listItem[i].price);
            var quantity = Number(listItem[i].quantity);
            var total = price * quantity;
            var val = " <tr class='onRow'><td>"+listItem[i].productName+"</td><td style='display:none'>"+listItem[i].idProduct+"</td><td>"+listItem[i].price+" đ</td><td><input type='number' value='"+listItem[i].quantity+"' min='1'></td><td>"+total+" đ</td></tr>"
           $("table").append(val)
           totalMoney += total;
        }
        $("#totalMoney").text("Tổng Tiền: "+totalMoney+" đ")
        $("#tabl tr td input").change(function(e){
            var quantity = Number($(this).closest('.onRow').find('td:nth-child(4) input').val());
            var price = Number($(this).closest('.onRow').find('td:nth-child(3)').text().trim().split(" ",1));
            var idProduct = Number($(this).closest('.onRow').find('td:nth-child(2)').text());
            var total = price * quantity;
            if (localStorage.getItem('listCart') != null) {
                var listItem = JSON.parse(localStorage.getItem('listCart'));
                var result = true;
                for (i = 0; i < listItem.length; i++) {
                    if (idProduct == listItem[i].idProduct) {
                        listItem[i].quantity=quantity;
                        listItem[i].totalMoney=total;
                        break;
                    } else {
                        result = false;
                    }
                }
                console.log(typeof total)
                localStorage.setItem('listCart', JSON.stringify(listItem));
            }
            $(this).closest('.onRow').find('td:nth-child(5)').text(total+" đ")
            totalMoney = 0;
            for (i =0; i < listItem.length; i++) {
                var price = Number(listItem[i].price);
                var quantity = Number(listItem[i].quantity);
                var total = price * quantity;
                totalMoney += total;
            }
            $("#totalMoney").text("Tổng Tiền: "+totalMoney+" đ")
        })
        $('#buy').click(function() {
            var listBill = localStorage.getItem('listCart');
            $.ajax({
                url:"http://localhost/Web-NoiThat/Ajax/pay",
                method:"post",
                data:{bill:listBill},
                success:function(data){
                    console.log(data)
                    if(data == true){
                        alert("Thanh Toán Thành Công, Đơn Hàng Sẽ Được Xác Nhận Trong Vòng 24 Giờ!")
                        localStorage.removeItem("listCart");
                        location.reload();
                    }else{
                        alert("Vui Lòng Đăng Nhập Để Thanh Toán!")
                    }
                }
            })
        });
    });

</script>