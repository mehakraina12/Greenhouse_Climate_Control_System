<?php
    include("connect_admin.php");
    if (isset($_GET['save'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];

        $sql = "select * from admin where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: ../Device_Dashboard/index.html");

        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>