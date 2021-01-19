<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
  <link rel="stylesheet" type="text/css" href="/Web-NoiThat/Public/css/style.css">
</head>
<body>
	<div id="FormRegister" class="formSubmit">
      <h2>Login Form</h2>
      <form action="http://localhost/Web-NoiThat/Home/Register" method="post" autocomplete="off">
        <a href="http://localhost/Web-NoiThat/Home/PageLogin"><?php echo $data["message"]?></a>
        <div class="field">
          <label for="uname"><b>FullName</b></label>
          <input type="text" placeholder="Enter FullName" name="name" required>
          <label for="uname"><b>Account</b></label>
          <input type="text" placeholder="Enter Account" name="account" required>
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <label for="psw"><b>Birthday</b></label>
          <input type="date" name="birthday" required>
          <label for="uname"><b>Phone or Email</b></label>
          <input type="text" placeholder="Enter Phone or Email" name="phoneOrEmail" required>
          <label for="psw"><b>Adress</b></label>
          <input type="text" placeholder="Enter Adress" name="adress" required>
          <button type="submit">Register</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>
        <div style="background-color:#f1f1f1">
          <button type="button" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>
    </div>
</body>
</html>