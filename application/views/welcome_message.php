<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Superadmin Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="./assets/css/login/style.css" rel="stylesheet" type="text/css" media="all">
		<link href="./assets/css/login/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	</head>
	<body>
		<div class="w3layouts-main">
         <div class="bg-layer">
            <h1>Super Admin Login</h1>
            <div class="header-main">
               <div class="main-icon">
                  <span class="fa fa-eercast"></span>
               </div>
               <div class="header-left-bottom">
                  <form action="<?= base_url('login') ?>" method="post">
                     <div class="icon1">
                        <input type="text" placeholder="Username" name="username" value="shubham" required="">
                     </div>
                     <div class="icon1">
                        <input type="password" placeholder="Password" name="password" value="shubham" required="">
                     </div>
                     <div class="bottom">
                        <button class="btn">Log In</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="copyright">
               <p>© 2021 CopyRight <a href="#" target="_blank">Text</a></p>
            </div>
         </div>
      </div>
	</body>
</html>