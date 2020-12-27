
          <div class="row">
            <h2 class="custom-input">Quản Lý Bình Luận</h2>
          </div>
          <div class="row mt-2 list-cart">
            <?php foreach ($data["comment"] as $comment) {?>
            <div class="col-12 col-md-12 m-auto row-align backg-white">
              <div class="col-4 col-md-4 float-left text-center">
                <p class="text-dark"><?php echo $comment["user_name"]?></p>
              </div>
              <div class="col-5 col-md-4 float-left text-center">
                <p class="text-dark"><?php echo $comment["content"]?></p>
                <p style="display: none;"><?php echo $comment["id_product"]?></p>
              </div>
              <div class="col-3 col-md-4 float-left text-center">
                <a href="#" class="d-inline">Xóa</a> | <a data-toggle="collapse" data-target="#displayDeltail1" class="nav-link d-inline p-0" onclick="reply(<?php echo $comment["id"]?>)">Trả Lời</a>
              </div>
            </div>
            <?php }?>
            <div class="form-comment">
              <div style="float: right;cursor:pointer;" onclick="hiddenForm()">X</div>
              <form>
                <textarea placeholder="Nhận xét của bạn" name="content" id="content"></textarea>
                <input type="hidden" name="idComment" id="idComment">
                <input type="button" name="submit" value="Gửi" id="comment">
              </form>
            </div>
             <!------------*********************--------------------->
          </div>
      <script type="text/javascript">
    $(document).ready(function(){
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
                    alert("Trả Lời Thành Công!")
                    $(".form-comment").css("display","none");
                  }else{
                    alert("Trả Lời Thất Bại!")
                  }
                }
            })
        })  
    });
    function reply(parent_id){
      $("#idComment").val(parent_id);
      $(".form-comment").css("display","block");
    }
    function hiddenForm(){
      $(".form-comment").css("display","none");
    }
</script>
        