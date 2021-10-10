<nav class="navbar navbar-expand-sm mdb-color" style="width: 100%">
				<div class="navbar-brand white-text text-center pr-2 z-depth-1s" ng-repeat="info in staff_info"><img src="img/logo.png" style="width: 50px"><br><span><img src="img/staff_passport/{{info.passport}}" style="width: 20px"> <span style="font-size: 14px; font-weight: 400">{{info.lastname | uppercase}} {{info.firstname |uppercase}}</span></div>
				
				<button class="navbar-toggler grey lighten-3" type="button" data-toggle="collapse" data-target="#collapsible">
					<span class="grey-text">---</span>
					
				</button>
				<div class="collapse navbar-collapse" id="collapsible">
						<ul class="navbar-nav">
							<li class="nav-item" ng-repeat="info in staff_info" ng-if="info.postheld=='Admin' || info.postheld=='Senior Officer'"><a class="nav-link" href="#!dashboard"><span class="1">Dashboard</span></a></li>	
							<li class="nav-item"><a class="nav-link" href="#!verification"><span class="2">Verification</span></a></li>	
							<li class="nav-item" ng-repeat="info in staff_info" ng-if="info.postheld=='Admin' || info.postheld=='Senior Officer'"><a class="nav-link" href="#!due-payment"><span class="3">Due Payment</span></a></li>			
							<li class="nav-item" ng-repeat="info in staff_info" ng-if="info.postheld=='Admin' || info.postheld=='Senior Officer'"><a class="nav-link" href="#!student-registration"><span class="4">Student Registration</span></a></li>							
							<li class="nav-item" ng-repeat="info in staff_info" ng-if="info.postheld=='Admin'"><a class="nav-link" href="#!admin-registration"><span class="5">Admin Registration</span></a></li>
							<li class="nav-item"><a class="nav-link" href="#!profile"><span class="6">Profile</span></a></li>	
							<li class="nav-item"><a class="nav-link orange-text" href="index.php" style="font-size: 14px">Logout</a></li>
						</ul>
				</div>
			</nav>