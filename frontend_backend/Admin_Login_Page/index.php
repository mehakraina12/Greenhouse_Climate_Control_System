<?php
    include("connect_admin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page | theuicode.com</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <div class="login">
        <form name="form" action="login.php" onsubmit="return isvalid()" method="get">
            <h3 class="title">Admin Login</h3>
            <div class="text-input">
                <i class="ri-user-fill"></i>
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" placeholder="Password" name="password">
            </div>
            <button class="login-btn" name="save">LOGIN</button>
        </form>
        </div>
    </div>
    <script>
        function isvalid(){
        var username = document.form.username.value;
        var password = document.form.password.value;
        if(username.length=="" && password.length==""){
            alert(" Username and password field is empty!!!");
                    return false;
        }
        else if(username.length==""){
            alert(" Username field is empty!!!");
                return false;
        }
        else if(password.length==""){
            alert(" Password field is empty!!!");
                                return false;
        }            
   }
    </script>
</body>

</html>