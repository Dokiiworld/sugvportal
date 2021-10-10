
<div class="row p-2" ng-controller="due">			
			
			<div class="col-md-2 mb-1 mb-md-0 p-2">
				<div class="card p-2">
					<div class="p-2 text-info"><b>Matric Number List</b></div>
					<div class="row">
						
						<div class="col-md-12 pt-2">
							<div class="row p-2 r2">
								<div class="col-12 pt-2 pb-2"><input type="text" placeholder="Search Matric Number" class="form-control" ng-model="userSearch">
								</div>
								<div class="col-md-11 table-responsive" style="overflow-y: scroll;height: 385px">
									<table class="table table-bordered" >										
										<tr ng-repeat="u in user_list | filter: userSearch">
											<th class="hoverable" ng-click="popu(u)">{{u.id_number}}</th>
										</tr>												
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>				
			</div>	

			<div class="col-md-3 mb-1 mb-md-0 p-2">
				<div class="card p-2"  style="height: 100%">
					
					<div class="row">
						
						<div class="col-md-12 pt-2">
							<div id="scro" class="table-responsive"> <marquee> <span class="pink-text">Student payment status will appear here</span></marquee></div>	
							<div id="due" class="table-responsive"></div>	
						</div>

					</div>
				</div>				
			</div>

			<div class="col-md-7 mb-1 mb-md-0 p-2">
				<div class="card p-2">
					<div class="p-2 text-info"><b>Due Payment List</b></div>
					<div class="row">
						
						<div class="col-md-12 pt-2">
							<div class="row p-2 r2">
								<div class="col-md-3 pt-2 pb-2"><input type="text" placeholder="Search" class="form-control" ng-model="userSearch">
								</div>
								<div class="col-md-12 table-responsive" style="overflow-y: scroll;height: 385px">
									<table class="table table-bordered">							
										<tr>
											<th>S/N</th><th>Matric Number</th><th>Date of Payment</th><th>Validity</th><th>Status</th><th>Date Created</th>
										</tr>
										<tr ng-repeat="dp in due_list | filter: userSearch">
											<td>{{$index+1}}</td><td>{{dp.id_number}}</td><td>{{dp.paid_date}}</td><td>{{dp.expired_date}}</td><td>{{dp.dstatus}}</td><td>{{dp.dateuploaded}}</td>
										</tr>												
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>				
			</div>	
			
</div>
