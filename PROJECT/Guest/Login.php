<?php
include('../Assets/connection/connection.php');
session_start();
//include("Head.php");

if(isset($_POST['btn_login']))
{
	$email=$_POST['txt_email'];
	$pass=$_POST['txt_pass'];
	
	$sel1="select * from tbl_user where user_email='".$email."' and user_password='".$pass."'";
	$result=$con->query($sel1);
	
	$sel2="select * from tbl_admin where admin_email='".$email."' and admin_password='".$pass."'";
	$result2=$con->query($sel2);
	
	$sel3="select * from tbl_seller where seller_email='".$email."' and seller_password='".$pass."'";
	$result3=$con->query($sel3);

	if($data=$result->fetch_assoc())
	{
		$_SESSION['uid']=$data['user_id'];
		$_SESSION['uname']=$data['user_name'];
		header("location:../user/homepage.php");
	}
	else if($data1=$result2->fetch_assoc())
	{
		$_SESSION['aid']=$data1['admin_id'];
		header("location:../Admin/homepage.php");
	}
	else if($data2=$result3->fetch_assoc())
	{
		$_SESSION['sid']=$data2['seller_id'];
		$_SESSION['sname']=$data2['seller_name'];
		header("location:../Seller/Homepage.php");
	}
	else
	{
		?>
        <script>
        alert('Invalid');
        </script>
        <?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Background Login Form</title>
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap'); */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #0d402d; /* Dark Green */
        }

        img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: cover;
            z-index: -1;
        }

        .container {
            width: 400px;
            color: #ffffff; /* Light off-white */
            padding: 30px 40px;
            border-radius: 15px;
            background: rgba(13, 64, 45, 0.8); /* Semi-transparent Dark Green */
        }

        .input-box {
            position: relative;
            width: 100%;
            height: 100%;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border-radius: 5px;
            color: #ffffff;
            border: 2px solid #ffffff;
            font-size: 16px;
            padding: 10px;
        }

        .remember {
            display: flex;
            justify-content: space-between;
            font-size: 15px;
            margin: -10px 0 15px;
            color: #ffffff; /* White */
        }

        .btn {
            width: 100%;
            height: 40px;
            background: #9abf8a; /* Light Greenish */
            color: #0d402d; /* Dark Green */
            border: none;
            outline: none;
            border-radius: 20px;
            box-shadow: 0 0 20px #9abf8a; /* Soft green shadow */
            font-size: 15px;
            font-weight: 600;
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn:hover {
            background: transparent;
            border: 2px solid #9abf8a; /* Light Green border */
            color: #9abf8a;
            box-shadow: 0 0 20px #9abf8a;
        }

        .register {
            font-size: 14px;
            margin-top: 20px;
            text-align: center;
            color: #ffffff; /* White */
        }

        .register p a {
            font-weight: 600;
            color: #9abf8a; /* Light Green */
            font-size: 18px;
            cursor: pointer;
        }

        .register p a:hover {
            color: #ffffff; /* White */
        }

        /* Modal CSS */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #f4f7ed; /* Very Light Beige */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            margin: 15% auto;
            text-align: center;
            border-radius: 10px;
        }

        .close {
            color: #555; /* Darker Gray */
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #0d402d; /* Dark Green */
        }

        .modal-content a {
            display: block;
            margin: 20px 0;
            font-weight: bold;
            font-size: 18px;
            color: #9abf8a; /* Light Green */
            text-decoration: none;
        }

        .modal-content a:hover {
            color: #0d402d; /* Dark Green */
        }
    </style>
</head>

<body>
    <img src="../Assets/Photo/18246172_v986-bg-10.jpg" alt="Background Image">
    <div class="container">
        <form action="" method="post">
            <h1>Login</h1>

            <!-- Email and Password input form -->
            <table width="100%" border="0">
                <tr>
                    <td>
                        <div align="center">Email</div>
                    </td>
                    <td>
                        <div class="input-box">
                            <input required type="text" name="txt_email" id="txt_email" autocomplete="off" placeholder="Email">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div align="center">Password</div>
                    </td>
                    <td>
                        <div class="input-box">
                            <input  required type="password" name="txt_pass" id="txt_pass" autocomplete="off" placeholder="Password">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="remember">
                            <label>
                                <a href="ForgotPassword.php">Forgot Password?</a> 
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div align="center">
                            <button type="submit" name="btn_login" id="btn_login" class="btn">Login</button>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Register link -->
            <div class="register">
                <p>Don't have an account? <br> <a href="#" id="registerLink">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Modal for Registration -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Register as</h2>
            <a href="../Guest/Newuser.php">New User</a>
            <a href="../Guest/SellerRegistraction.php">Seller</a>
        </div>
    </div>

    <script>
        // Get modal and elements
        var modal = document.getElementById('registerModal');
        var registerLink = document.getElementById('registerLink');
        var closeModal = document.getElementById('closeModal');

        // Open modal when clicking the Register link
        registerLink.onclick = function(event) {
            event.preventDefault();
            modal.style.display = 'flex';
        }

        // Close modal when clicking the close button
        closeModal.onclick = function() {
            modal.style.display = 'none';
        }

        // Close modal when clicking outside the modal content
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>

</html>
