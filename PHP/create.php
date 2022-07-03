<?php
    $connection = mysqli_connect("localhost", "root", "", "amr");
    if ($connection === false) {
        die("Error: Could not connect. ". mysqli_connect_error());
    }

        if (isset($_POST['submit_create'])) {
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
        if (empty($_POST['user_name'])) {
            $em_last_na = "<span classe='error'>Last Name field is required</span>";
        }
        elseif (empty($_POST['email'])) {
            $em_email = "<span classe='error'>Email field is required</span>";
        }
        elseif (empty($_POST['password'])) {
            $em_password = "<span classe='error'>password field is required</span>";
        }
        else {
            $sql = "INSERT INTO table1 (UserName, Email, Passwords) VALUES ('$user_name', '$email', '$password')";
                    if (mysqli_query($connection, $sql)) {
                        $msseg = "<h1>تم انشاء الحساب</h1>";
                    }else {
                        echo "ERROR: Could not able to execute $sql " . mysqli_error($connection);
                    }
        }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style.css">
    <title> Create Account </title>
    
</head>
<body>
    <p style="text-align: center; font-size: 30px; color: rgba(255, 208, 0, 0.938); ">
            <marquee direction="lift" width="50%" > Welcome to Site AMA.Web </marquee>
    </p>
    <div class="create_new">
        <form class='form_create_new' action='' method='post' >
        <table>
            <caption> Create Account </caption>
            <tr>
                <th><?php if(isset($msseg)){ echo $msseg; }?></th>
            </tr>
            <tr>
                <td>User Name :<font color="red" >*</font><br><?php if(isset($em_last_na)){echo $em_last_na; }?><input type="text" name="user_name" ></td>
            </tr>
            <tr>
                <td>Email :<font color="red" >*</font><br><?php if(isset($em_email)){echo $em_email; }?><input type="text" name="email" ></td>
            </tr>
            <tr>
                <td>password:<font color="red" >*</font><br><?php if(isset($em_password)){echo $em_password; }?><input type="password" name="password" ></td>
            </tr>
            <tr>
                <td class="boutton_create">
                    <input type="Submit" value="Create " name="submit_create">
                    <a href="../index.html"><input type="button" value="cancel "></a>
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
