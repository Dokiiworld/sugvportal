
<div class="row p-2" ng-controller="sreg">			
			<div class="col-md-4  mb-3 mb-md-0 p-2">
				<div class="card p-2">
					<div class="p-2 text-info"><b>Register Admin</b></div>
					<form class="row mt-3 p-2" id="f1">
						<div class="col-md-6">Firstname:<br><input type="text" class="form-control" required="" id="fn"></div>
						<div class="col-md-6">Lastname:<br><input type="text" class="form-control" required="" id="ln"></div>
						<div class="col-md-6">Email:<br><input type="email" class="form-control" required="" id="em"></div>
						<div class="col-md-6">Phone Number:<br><input type="number" class="form-control" required="" id="pn"></div>
						<div class="col-md-6">Post Held:<br><select class="form-control" required="" id="ph"><option selected="" disabled="">Choose Post Held</option><option>Officer</option><option>Senior Officer</option><option>Admin</option></select></div>
						<div class="col-md-6">Upload passport:<br><input type="file" required="" id="filePa" class="form-control"></div>
						<div class="col-md-6"><input type="submit" value="Submit" class="btn btn-info ml-0 pl-4 pr-4 pt-2 pb-2" ng-click="subsreg()"></div>
					</form>
				</div>
			</div>
			<div class="col-md-8 mb-1 mb-md-0 p-2">
				<div class="card p-2">
					<div class="p-2 text-info"><b>Admin List</b></div>
					<div class="row">
						
						<div class="col-md-12 pt-2">
							<div class="row p-2 r2">
								<div class="col-md-3 pt-2 pb-2"><input type="text" placeholder="Search" class="form-control" ng-model="userSearch">
								</div>
								<div class="col-md-12 table-responsive" style="overflow-y: scroll;height: 385px">
									<table class="table table-bordered" >							
										<tr >
											<th>S/N</th><th>Passport</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Phone</th><th>Postheld</th><th>Date Created</th><th>Status</th>
										</tr>
										<tr ng-repeat="s in staff_list | filter: userSearch">
											<td>{{$index+1}}</td><td><img src="img/staff_passport/{{s.passport}}" style="width: 40px; height: 40px"></td><td>{{s.firstname}}</td><td>{{s.lastname}}</td><td>{{s.email}}</td><td>{{s.phone}}</td><td>{{s.postheld}}</td><td>{{s.regdate}}</td><td>{{s.status}}</td>
										</tr>												
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>				
			</div>			
</div>