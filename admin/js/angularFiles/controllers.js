app.controller("productManagement",function($scope,$http,dbOperations){
	$scope.categories = [];
	$scope.items = [];
	$scope.categoryFields = {};
	$scope.itemFields = {};
	$scope.editItemFields = {};
	$scope.addNewCategory = function(){
		dbOperations.processData("AddItem",$scope.categoryFields,function(){getCategories();});
	}

	$scope.addNewItem = function(){
		$scope.itemFields.category = $("select#category").val();
		dbOperations.processData("AddItem",$scope.itemFields,function(){getItems();});
	}

	$scope.itemIndex = function(i,id){ $scope.editItemFields = ($scope.items)[i]; }

	$scope.editItemsTrigger = function(){
		$('#edit-item').modal('open');
	}

	$scope.editItem = function(){
		console.log($scope.editItemFields.category_fk," - problem");
		if($scope.editItemFields.category_fk){
		$scope.editItemFields.category_fk = $("select#categoryUpdate").val();
		// $scope.editItemFields.category = $("select#categoryUpdate").val();
		dbOperations.processData("EditItem",$scope.editItemFields,function(){getItems();});
		// console.log($scope.editItemFields);

		}
		else{
			alert("Put Category");
		}
	}

	function getCategories(){
		$http({
			method:"POST", url:"/admin/view.php",
			data: { 'process': "getItemCategory",'data':'' }
		}).then(function success(res){
			$scope.categories = res.data;
		}, function myError(response) {
	    });
    }
	function getItems(){
		$http({
			method:"POST", url:"/admin/view.php",
			data: { 'process': "getItems",'data':'' }
		}).then(function success(res){
			(res.data).map(function(e){
				e.price = Number(e.price);
				e.category_fk = Number(e.category_fk);
				return e
			});
			$scope.items = res.data;
			// $scope.items.price = Number(res.data.price);
		}, function myError(response) {
	    });
    }
	getCategories();
	getItems();


	$scope.sendMessage = function(){

	}
	// $http({
	// 	method:"GET", url:"http://localhost:3000/",
	// }).then(function(r){
	// 	console.log(r);
	// });
});

app.controller("buisnessManagement",function($scope,$http,dbOperations){
	$scope.branchFields = {};
	$scope.branches = [];
	$scope.positionFields = {};
	$scope.positions = [];
	$scope.newBranch = function(){
		dbOperations.processData("AddBranch",$scope.branchFields,function(){getBranches();});
	}
	$scope.newPosition = function(){
		dbOperations.processData("AddPosition",$scope.positionFields,function(){getPositions();});
	}
	function getBranches(){
		$http({
			method:"POST", url:"/admin/view.php",
			data: { 'process': "getBranches",'data':'' }
		}).then(function success(res){
			// console.log(res.data)
			$scope.branches = res.data;
		},function error(){
			alert("something went wrong.");
		});
	}
	function getPositions(){
		$http({
			method:"POST", url:"/admin/view.php",
			data: { 'process': "getPositions",'data':'' }
		}).then(function success(res){
			$scope.positions = res.data;
		},function error(){
			alert("something went wrong.");
		});
	}
	getBranches();
	getPositions();
});

app.controller("employeeManagement",function($scope,$http,dbOperations){
	$scope.employeeFields = {};
	$scope.employeeAccessFields = {};
	$scope.employees = [];
	$scope.employeeFields.gender = 1;
	$scope.employeeFields.checked = 1;

	$scope.employeeData = {};
	var employeeId = 0;

	
	function formatDate(inputDate) {
		return  new Date(inputDate);
	}
	
	function getEmployees(){
		$http({
			method:"POST", url:"/admin/view.php",
			data: { 'process': "getEmployees",'data':'' }
		}).then(function success(res){
			// console.log(res.data)
			$scope.employees = res.data;
			formatData();
		},function error(){
			alert("something went wrong.");
		});
	}
	function formatData(){
		($scope.employees).forEach(function(e){
			e.salary = parseFloat(e.salary);
			e.birth_day = formatDate(e.birth_day);
			$scope.employeeFields = e;
		});
	}
	$scope.newEmployee = function(){
		$scope.employeeFields = {};
		$("#add-employee").modal("open");
	}
	$scope.editEmployeeData = function(){
		if(employeeId==0){
			alert("Select employee");
		}
		else{
			$scope.employeeFields = $scope.employeeData;
			$('select').material_select();
			$("#add-employee").modal("open");
		}
	}
	$scope.updateEmployeeData = function(){
		$scope.employeeFields.position_fk = $(".employee-management select[name='positionField']").val();
		$scope.employeeFields.branch_fk = $(".employee-management select[name='branchField']").val();
		$scope.employeeFields.id = employeeId;
		console.log($scope.employeeFields);
		dbOperations.processData("EditEmployee",$scope.employeeFields,function(){getEmployees();$("#add-employee").modal("close");});
	}
	$scope.getEmployeeInfo = function(dataId){
		console.log(employeeId);
		($scope.employees).forEach(function(e){// loop  to all the employee data
			if(e.id==dataId){
				if(employeeId==dataId){ $scope.employeeData = {}; employeeId = 0;}
				else{ employeeId = dataId; $scope.employeeData = e;}
				return false;
			}

		});
	}
	$scope.newEmployeeAccess = function(){
		if(employeeId==0){
			alert("Select employee");
		}
		else{
			$scope.employeeFields = $scope.employeeData;
			$('select').material_select();
			$("#add-access").modal("open");
		}
	}
	$scope.addEmployeeAccess = function(){
		$scope.employeeAccessFields.id = employeeId;
		dbOperations.processData("AddAccess",$scope.employeeAccessFields,function(){getEmployees();$("#add-access").modal("close");});
		// console.log($scope.employeeAccessFields);
	}
	
	$scope.addEmployee = function(){
		$scope.employeeFields.position_fk = $(".employee-management select[name='positionField']").val();
		$scope.employeeFields.branch_fk = $(".employee-management select[name='branchField']").val();
		if($scope.employeeFields.position_fk==""||$scope.employeeFields.branch_fk ==""){
			alert("Incomplete information");
		}
		else{
			console.log($scope.employeeFields);
			dbOperations.processData("AddEmployee",$scope.employeeFields,function(){getEmployees();$("#add-employee").modal("close");});
			$scope.employeeFields={};
		}
		// console.log($scope.employeeFields);

		// alert();
	}
	getEmployees();
})

app.controller("reports",function($scope,$http,dbOperations){

	$scope.selectedDate = new Date();
	$scope.transactions = [];
	$scope.totalSales = 0;	


	getTotalSalesOn($scope.selectedDate);
	getTransationsOn($scope.selectedDate);
	function getTotalSalesOn(selectedDate){
		dbOperations.getData('getTotalSales',selectedDate).then(function(res) {
			$scope.totalSales = res.data;
		});
	}
	function getTransationsOn(selectedDate){
		dbOperations.getData('getTransationsData',selectedDate).then(function(res) {
			$scope.transactions = res.data;
			console.log(res);
		});
	}
	$scope.getTransactionData = function(){
		getTotalSalesOn($scope.selectedDate);
		getTransationsOn($scope.selectedDate);
	}
});
