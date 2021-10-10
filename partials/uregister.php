
<div class="row p-2" ng-controller="ureg">			
			<div class="col-md-3  mb-3 mb-md-0 p-2">
				<div class="card p-2">
					<div class="p-2 text-info"><b>Register Student</b></div>
					<form class="row mt-3 p-2" id="f1">

						<div class="col-md-12">Matric Number:<br><input type="text" class="form-control" required="" id="idn"></div>
						<div class="col-md-12">Email:<br><input type="email" class="form-control" required="" id="em"></div>
						<div class="col-md-12">Phone Number:<br><input type="number" class="form-control" required="" id="pn"></div>
						<div class="col-md-12">Upload ID Card:<br><input type="file" required="" id="filePat" class="form-control"></div>
						<div class="col-md-12"><input type="submit" value="Submit" class="btn btn-info ml-0 pl-4 pr-4 pt-2 pb-2" ng-click="subureg()"></div>
				
					</form>
				</div>
			</div>
			<div class="col-md-9 mb-1 mb-md-0 p-2">
				<div class="card p-2">
					<div class="p-2 text-info"><b>Student List</b></div>
					<div class="row">
						
						<div class="col-md-12 pt-2">
							<div class="row p-2 r2">
								<div class="col-md-3 pt-2 pb-2"><input type="text" placeholder="Search" class="form-control" ng-model="userSearch">
								</div>
								<div class="col-md-12 table-responsive" style="overflow-y: scroll;height: 385px">
									<table class="table table-bordered" >							
										<tr >
											<th>S/N</th><th>ID Card</th><th>Matric Number</th><th>Email</th><th>Phone Number</th><th>Date Created</th>
										</tr>
										<tr ng-repeat="u in user_list | filter: userSearch">
											<td>{{$index+1}}</td><td><img src="img/user_passport/{{u.id_card}}" style="width: 40px; height: 40px"></td><td>{{u.id_number}}</td><td>{{u.email}}</td><td>{{u.phone}}</td><td>{{u.regdate}}</td>
										</tr>												
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>				
			</div>	

</div>