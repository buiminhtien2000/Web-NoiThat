<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
  <link rel="stylesheet" type="text/css" href="/Web-NoiThat/Public/css/style.css">
</head>
<body>
	<div id="FormLogin" class="formSubmit">
        <h2>Login Form</h2>
        <form action="http://localhost/Web-NoiThat/Home/Login" method="post" autocomplete="off">
          <p><?php echo $data["message"]?></p>
        <div class="field">
        <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="account" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
                          
          <button type="submit">Login</button>
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