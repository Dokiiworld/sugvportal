<?php
session_start();

if(isset($_SESSION['staff_id']))
 {      

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
.container{max-width: 100%}
#collapsible a span{background: none;color: white; font-size: 14px; padding: 7px;}
#ver input, #ver select, #f1 input, #f1 select{margin-bottom:7px; border-radius: 0px;font-size: 12px;color: grey}
form{font-size: 12px; color: grey}
/*#vt{font-size: 30px}*/
#radius{border-radius:0px;}
.r2 input, .r2 td, .r2 th{font-size: 12px; color:grey; border-radius:0px}

#lt{font-size: 14px;padding: 0px}
#scro th,#due th,#scro td,#due td, #show td, #show th{padding: 10px}
.card{border-radius: 0px}
.sh{display: none}
.xx table th,.xx table td{padding: 10px; font-size: 12px}

</style>
</head>
<body ng-app="application" ng-controller="tech">
	<div class="container">		
		<div class="row" ng-include="'partials/nav.php'">
			
		</div>
		<ng-view></ng-view>	

		<!-- Edit -->                                       
                                                            <div class="modal fade  md-effect-13 mt-5" id="pd">
                                                            <div class="modal-dialog modal-sm card" style=""> 
                                                             <div class="modal-header grey-text" style="font-size: 17px"><b>Pay Due</b></div>         
                                                            <div class="modal-content" style="">                      
                                                            <div class="modal-body"> 
                                                            <div id="ff"></div>
                                                              <form id="bfo">
                                                                 <div class="col-sm-12  m-b-15">
                                                                  <span>Select date of payment:</span>                                                  
                                                                    <input type="date" class="form-control form-control-info" id="pdp" required="">
                                                                </div>                              
                                                                <div class="col-sm-12 col-xs-12">
                                                                 <div class="row">
                                                                   <div class="col-md-6 col-sm-6 col-xs-6">
                                                                     <input type="button" class="form-control btn btn-default ml-0 p-2" value="Close" data-dismiss="modal">
                                                                   </div>
                                                                   <div class="col-md-6 col-sm-6 col-xs-6">
                                                                      <input type="submit" class="form-control btn btn-info ml-0 p-2" value="Submit" id="padu">
                                                                   </div>
                                                                 </div>
                                                                </div>
                                                              </form>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                      <!-- edit end -->         				
	</div>
</body>

</html>
<?php
}
 else
{   
    header('location:index.php');
}
?>