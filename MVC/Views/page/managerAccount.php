<div class="article" style="background-color: #fafafa;">
    <p><?php echo $data["message"];?></p>
    <div class="managerAccount">
        <form action="http://localhost/Web-NoiThat/Home/UpdateAccount" method="post" enctype="multipart/form-data" class="formSubmit">
            <div class="field">
                <label><b>Username</b></label> 
                <input type="text" placeholder="Enter Username" name="name" required value="<?php echo $data['user'][0]['name']?>">
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required> 
                <label><b>Birthday</b></label>
                <input type="date" placeholder="Enter Password" name="birthday" required value="<?php echo $data['user'][0]['birthday']?>"> 
                <label><b>Phone or email</b></label>
                <input type="text" placeholder="Enter Password" name="phoneOrEmail" required value="<?php echo $data['user'][0]['phoneOrEmail']?>"> 
                <label><b>Address</b></label>a
                <input type="text" placeholder="Enter Password" name="adress" required value="<?php echo $data['user'][0]['adress']?>"> 
                <label><b>Picture</b></label>
                <input type="file" placeholder="Enter Password" name="file">
                <input type="text" style="display: none;" placeholder="Enter Password" name="defaultfile" value="<?php echo $data['user'][0]['picture']?>">              
                <button type="submit">Cập Nhật</button>
            </div>
        </form>
    </div>
</div>