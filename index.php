<?php
if(session_id()=='')
{
    session_start();
}
    if (ISSET($_SESSION['staff_id'])) {
    $_SESSION['staff_id']=array();
    unset($_SESSION['staff_id']);
    session_destroy();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>SUG Verification Portal</title>
	<meta name="viewport" content="width=device-width" initial-scale="1.0">
<link rel="stylesheet" type="text/css" href="mdb/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="mdb/css/mdb.css">
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">

<script type="text/javascript" src="process/angular.js"></script>
<script type="text/javascript" src="process/angular-route.min.js"></script>

<script type="text/javascript" src="mdb/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
<script type="text/javascript" src="process/matt.js"></script>
<style>

html, body{height: 100%}
body{background-image: url(img/logo.jpg); background-repeat: no-repeat; background-size:cover; background-attachment: fixed; background-position: center;}
.container{background:rgba(71,114,141, 0.85); max-width: 100%; display: flex; align-items: center; justify-content: center}
.row{width: 100%}
#inp input{border-radius: 0px; margin-bottom:10px; color: grey; font-size: 14px}
#isu{text-align: left; margin-top: 0px}
#lo{font-size: 18px; font-weight: 600}
.tit{font-size: 14px}


</style>
</head>
<body ng-app="application" ng-controller="tech">
	<div class="container full-height">
		
		<div class="row p-3 justify-content-center">
		<div class="col-md-4 col-12 z-depth-1 grey lighten-4 pt-5 pb-3">
			<div><p class="text-center grey-text p-1 tit"><b>Student Union Government Due Payment Verification Portal</b></p></div>
			<div class="text-center text-info p-1" id="lo">ADMIN LOGIN<hr></div>
			<form ng-controller="logi">
			<div class="p-1 pl-3 pr-3" id="inp">
				<input type="email" name="" placeholder="Enter Email" class="form-control" ng-model="email" required="">
				<input type="password" name="" placeholder="Enter Password" class="form-control" ng-model="pass" required="">
			</div>
			<div id="isu" class=" pl-3 pr-3" ><input type="submit" class="btn btn-info p-2 pl-4 pr-4 ml-0" value="Login" ng-click="log()"></div>
			</form>
			<div class="text-center small grey-text mt-4">Developed By: <a href="tel:+2348067382624">O. Matthew Idepefo</a></div>
		</div>
	</div>
	</div>	
</body>

</html>