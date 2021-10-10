
<div class="row p-2" ng-controller="pro">			
			<div class="col-md-4  mb-3 mb-md-0 p-2">
				<div class="card p-2">
					<div class="p-2 text-info"><b>My Profile</b></div>
					<form class="row p-2" id="f1" ng-repeat="fo in staff_fo">
						<div class="col-md-12 text-center">
							<img src="img/staff_passport/{{fo.passport}}" style="width: 150px; height: 150px"><br>
							<div>Post held: {{fo.postheld}}</div>
						</div>
						<div class="col-md-12 xx">
							<div class="table-responsive">
							<table class="table ">
								<tr>
									<th class="grey-text">Firstname:</th><td class="text-info">{{fo.firstname}}</td>
								</tr>
								<tr>
									<th class="grey-text">Lastname:</th><td class="text-info">{{fo.lastname}}</td>
								</tr>
								<tr>
									<th class="grey-text">Phone Number:</th><td class="text-info">{{fo.phone}}</td>
								</tr>
								<tr>
									<th class="grey-text">Email:</th><td class="text-info">{{fo.email}}</td>
								</tr>
								<tr>
									<th class="grey-text">Registration Date:</th><td class="text-info">{{fo.regdate}}</td>
								</tr>
								<tr>
									<th></th><td ></td>
								</tr>

							</table>
						</div>
						</div>
						
						
					</form>
				</div>
			</div>
		
</div>