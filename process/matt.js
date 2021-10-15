var app = angular.module('application', ['ngRoute']);
	app.controller('tech',function($scope,$http)
	{
		angular.element(document).ready(function()
		{
			$('.1').css({'background':'#DFDFDF', 'color':'#45526E'});
			$('.2,.3,.4,.5,.6').css({'background':'none', 'color':'white'});
			// fetch payment list
			$scope.fu={"fi":$scope.fi};
			$http({
				method:"POST",
				url:"process/fetch_due_list.php",
				data:$scope.fu,
			}).then(function mysuccess(dl)
			{				
				$scope.due_list=dl.data;
				 // alert(JSON.stringify($scope.due_list));
			});
			//fetch staff end	
			// fetch single staff
			$scope.fse={"fs":$scope.fs};
			$http({
				method:"POST",
				url:"process/fetch_staff_single.php",
				data:$scope.fse,
			}).then(function mysuccess(pov)
			{				
				$scope.staff_info=pov.data;
				 // alert(JSON.stringify($scope.staff_info));
			});
			//fetch staff end	
			// fetch all staff
			$scope.fsae={"fsa":$scope.fsa};
			$http({
				method:"POST",
				url:"process/fetch_staff.php",
				data:$scope.fsae,
			}).then(function mysuccess(psa)
			{				
				$scope.staff_list=psa.data;
				 // alert(JSON.stringify($scope.staff_list));
			});
			//fetch staff end	
			// fetch all user
			$scope.fue={"fu":$scope.fu};
			$http({
				method:"POST",
				url:"process/fetch_user.php",
				data:$scope.fue,
			}).then(function mysuccess(fu)
			{				
				$scope.user_list=fu.data;
				 // alert(JSON.stringify($scope.user_list));
			});
			//fetch staff end	

			$scope.popu= function(su)
			{
				$('#pdp').val('');
				var uc = su.user_id;
				var udc = su.id_card;
				var idn = su.id_number;
				var upn = su.phone;
				var uem = su.email;
				var urd = su.regdate;
				// var dr = '<div class="text-center"><img src="img/user_passport/'+udc+'" style="width:270px; height:270px"></div> <div class="table-responsive"><table class="table table-bordered"> <tr><th>Phone</th><th>Email</th><th>Date Registered</th></tr> <tr><td>'+upn+'</td><td>'+uem+'</td><td>'+urd+'</td></tr> </table></div>';
				var dr = '<div class=""><span class="grey-text small">Matric No: '+idn+'</span><br><img src="img/user_passport/'+udc+'" style="width:270px; height:270px"></div>';
				$('#scro').html(dr);

				$.post("process/fetch_due_payment.php", {du:uc}, function(dd){ 				
					$("#due").html(dd);
					$('#paydue').click(function()
					{ 	
						$('#pd').modal({'backdrop':'static'});						
						$('#padu').click(function()
						{
							var us = $("#user").html();
							var pau =$('#pdp').val();
							if(pau=='')
							{
								alert('select date of payment');
							}
							else
							{
								$.post("process/paydue.php", {u:us,p:pau}, function(pd){ 				
								// alert(pd);
								if(pd=='Saved')
								{
									alert('payment uploaded successfully');
									window.location.reload();
								}
								else
								{
									alert('Error');
								}
								});
							}
								
						});					
					});
				});			
			}


		});
	});

	app.controller('logi',function($scope,$http)
	{
		angular.element(document).ready(function()
		{
			$scope.log = function()
			{
				// alert('djff');
				var e = $scope.email;
				var p = $scope.pass;
				var t = e=="" || p=="";
				if(t)
				{
					alert('input cannot be empty');
				}
				else
				{
					$scope.log={"em":$scope.email,"pas":$scope.pass};
						// alert(JSON.stringify($scope.log));
						$http({
							method:"POST",
							url:"process/staff_log.php",
							data:$scope.log,
						}).then(function mysuc(slo)
						{	
							// alert(esto);
							$scope.stlo=slo.data;
							// alert(JSON.stringify($scope.stlo));
							if($scope.stlo!='welcome')
							{
								alert('Incorrect Email or Password');
								window.location.reload();
							}
							else
							{
								window.location="admin.php";
							}
							
						});
				}
				
			}
						
		});
	});

	app.controller('veri',function($scope,$http)
	{
		angular.element(document).ready(function()
		{
			$('.2').css({'background':'#DFDFDF', 'color':'#45526E'});
			$('.3,.4,.5,.1,.6').css({'background':'none', 'color':'white'});

			$("#search").click(function()
			{ 
				
				var c = $("#code").val();
				if(c=="")
				{
					alert('Enter Matric Number');
				}
				else
				{
					$(".sh").fadeIn();

					$.post("process/user_verification.php", {di:c}, function(dus){ 				
					$("#show").html(dus);
					});
				}				
				
			});
						
		});
	});

	app.controller('due',function($scope,$http)
	{
		angular.element(document).ready(function()
		{
			$('.3').css({'background':'#DFDFDF', 'color':'#45526E'});
			$('.2,.4,.5,.1,.6').css({'background':'none', 'color':'white'});
						
		});
	});
	app.controller('pro',function($scope,$http)
	{
		angular.element(document).ready(function()
		{
			$('.6').css({'background':'#DFDFDF', 'color':'#45526E'});
			$('.2,.4,.5,.1,.3').css({'background':'none', 'color':'white'});
				// fetch single staff
			$scope.fse={"fs":$scope.fs};
			$http({
				method:"POST",
				url:"process/fetch_staff_single.php",
				data:$scope.fse,
			}).then(function mysuccess(pov)
			{				
				$scope.staff_fo=pov.data;
				 // alert(JSON.stringify($scope.staff_fo));
			});
			//fetch staff end	
						
		});
	});
	
	app.controller('ureg',function($scope,$http)
	{
		angular.element(document).ready(function()
		{
			$('.4').css({'background':'#DFDFDF', 'color':'#45526E'});
			$('.2,.3,.5,.1,.6').css({'background':'none', 'color':'white'});

			$scope.subureg = function()
			{
				var idn= $('#idn').val();
				var em= $('#em').val();
				var pn= $('#pn').val();
				var im = $('#filePat').val();
				var v=	idn=="" || em=="" || pn=="" || im=="";
				if(v)
				{
					alert('input cannot be empty');					
				}
				else
				{				
					var fd = new FormData();
					var fila = document.getElementById('filePat').files[0];	
					fd.append("image",fila);
					fd.append("idn",idn);
					fd.append("em",em);
					fd.append("pn",pn);			
					
				$http({
					method:"POST",
					url:"process/user_reg.php",
					data:fd,
					headers: {'Content-Type': undefined},
					}).then(function mysucc(urr)

					{		
						$scope.urv=urr.data;
							// alert(JSON.stringify($scope.urv));
						if($scope.urv=='exist')
						{							
							alert('Retry! (Email or Phone Number or Matric Number already exist)');							
						}

						else if($scope.urv=='saved')
						{							
							alert('successfully saved');
							window.location.reload();
						}						
						else
						{
							alert('Error! Try again');
						}
						
					});
				}
			}
						
		});
	});
	app.controller('sreg',function($scope,$http)
	{
		angular.element(document).ready(function()
		{
			$('.5').css({'background':'#DFDFDF', 'color':'#45526E'});
			$('.2,.3,.4,.1,.6').css({'background':'none', 'color':'white'});

			$scope.subsreg = function()
			{

				var fn= $('#fn').val();
				var ln= $('#ln').val();
				var em= $('#em').val();
				var pn= $('#pn').val();
				var ph= $('#ph').val();
				var ps="";
				var ran="@12(3$4#56@789$0ASD@FGH$JKLZXC@VBN$MQW@ERTY$UIO$P12@345$678@90&&99993ZXCVBNMLA#K3J3H9G4F5D6S7A8PU91U2Y(ET(W";
					for (var i =0; i <= 7; i++)
					{			
						ps +=ran.charAt(Math.floor(Math.random()*ran.length));			
					}	
				var pass= ps;
				var im = $('#filePa').val();
				var v=	fn=="" || ln=="" || em=="" || pn=="" || ph=="" || im=="";
				if(v)
				{
					alert('input cannot be empty');					
				}
				else
				{				
					var fd = new FormData();
					var fila = document.getElementById('filePa').files[0];	
					fd.append("image",fila);
					fd.append("fn",fn);
					fd.append("ln",ln);
					fd.append("em",em);
					fd.append("pn",pn);	
					fd.append("ph",ph);
					fd.append("pass",pass);
					
				$http({
					method:"POST",
					url:"process/staff_reg.php",
					data:fd,
					headers: {'Content-Type': undefined},
					}).then(function mysucc(srr)
					{		
						$scope.star=srr.data;
							 // alert(JSON.stringify($scope.star));
						if($scope.star=='exist')
						{							
							alert('Retry! (Email or Phone Number already exist)');							
						}
						else if($scope.star=='saved')
						{							
							alert('successfully saved');
							window.location.reload();
						}						
						else
						{
							alert('Error! Try again');
						}
						
					});
				}

			}
						
		});
	});

	app.config(function($routeProvider)
		{
			$routeProvider
			.when("/",{
			templateUrl: "partials/verify.php"
			})	
			.when("/dashboard",{
			templateUrl: "partials/dashboard.php"
			})	
			.when("/verification",{
			templateUrl: "partials/verify.php"
			})	
			.when("/due-payment",{
			templateUrl: "partials/due_payment.php",
			})		
			.when("/student-registration",{
			templateUrl: "partials/uregister.php",
			})		
			.when("/admin-registration",{
			templateUrl: "partials/sregister.php",
			})
			.when("/profile",{
			templateUrl: "partials/profile.php",
			})

		});
