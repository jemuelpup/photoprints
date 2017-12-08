var loginEnabled = 1;
var strictModeEnabled = 1;

app.controller("buisnessManagement",function($scope,$http,dbOperations){
	/* Testing sessions */
	if(loginEnabled){
		dbOperations.getAccessID().then(function(res){
			if(res.data==='0'){ window.location.href = '/'; }
		});
	}
	if(strictModeEnabled){
		dbOperations.getAccessPosition().then(function(res){
			console.log(res.data);
			if(!(res.data==='3')){ window.location.href = '/'; }
		});
	}
	/* /Testing sessions */

	$scope.branchFields = {};
	$scope.branches = [];
	$scope.positionFields = {};
	$scope.positions = [];
	$scope.newBranch = function(){
		dbOperations.processData("AddBranch",$scope.branchFields).then(function(res){
			getBranches();
		});
	}
	$scope.newPosition = function(){
		dbOperations.processData("AddPosition",$scope.positionFields).then(function(res){
			getPositions();
		});
	}
	function getBranches(){
		dbOperations.views("getBranches","").then(function(res){
			$scope.branches = res;
		});
	}
	function getPositions(){
		dbOperations.views("getPositions","").then(function(res){
			$scope.positions = res;
		});
	}
	getBranches();
	getPositions();
});

app.controller("productManagement",function($scope,$http,dbOperations){
	$scope.categories = [];
	$scope.items = [];
	$scope.categoryFields = {};
	$scope.itemFields = {};
	$scope.editItemFields = {};
	$scope.addNewCategory = function(){
		dbOperations.processData("AddItem",$scope.categoryFields).then(function(res){getCategories();});
	}

	$scope.addNewItem = function(){
		$scope.itemFields.category = $("select#category").val();
		dbOperations.processData("AddItem",$scope.itemFields).then(function(res){getItems();});
	}

	$scope.itemIndex = function(i,id){
		$scope.editItemFields = ($scope.items)[i];
		// $(".categoryUpdate [value="+$scope.editItemFields.category_fk+"]").attr("selected='selected'");
	}

	$scope.editItemsTrigger = function(){
		$('#edit-item').modal('open');
	}

	$scope.editItem = function(){
		if($scope.editItemFields.category_fk){
			if(!isNaN($("select#categoryUpdate").val())){
				$scope.editItemFields.category_fk = $("select#categoryUpdate").val();
			}
			dbOperations.processData("EditItem",$scope.editItemFields).then(function(res){getItems();});
		}
		else{
			alert("Put Category");
		}
	}
	$scope.deleteItem = function(){
		if (confirm("Are you sure you want to delete this item?")) {
			dbOperations.processData("RemoveItem",$scope.editItemFields).then(function(res){
				console.log(res)
				getItems();
			});
		}
	}

	function getCategories(){
		$http({
			method:"POST", url:"/admin/view.php",
			data: { 'process': "getItemCategory",'data':'' }
		}).then(function success(res){
			$scope.categories = res.data;
			console.log(res.data,'nandit yun')
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
		dbOperations.views("getEmployees","").then(function(res){
			$scope.employees = res;
			formatData();
		});
	}
	function formatData(){
		($scope.employees).forEach(function(e){
			e.salary = parseFloat(e.salary);
			e.birth_day = formatDate(e.birth_day);
			$scope.employeeFields = e;
		});
	}
	$scope.deleteEmployee = function(){
		if (confirm("Area you sure you want to delete this employee?")) {
			$scope.employeeFields.id = employeeId;
			dbOperations.processData("RemoveEmployee",$scope.employeeFields).then(function(res){
				getEmployees();
				$scope.branches = res;
				alert("Employee deleted");
			});
		}
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
			$('select').material_select();
			$("#add-employee").modal("open");
		}
	}
	$scope.updateEmployeeData = function(){
		if(!isNaN($(".employee-management select[name='positionField']").val())){
			$scope.employeeFields.position_fk = $(".employee-management select[name='positionField']").val();
		}
		if(!isNaN($(".employee-management select[name='branchField']").val())){
			$scope.employeeFields.branch_fk = $(".employee-management select[name='branchField']").val();
		}
		// $scope.employeeFields.id = employeeId;
		console.log($scope.employeeFields);
		dbOperations.processData("EditEmployee",$scope.employeeFields).then(function(res){
			console.log(res)
			getEmployees();//$("#add-employee").modal("close");
		});
	}


	$scope.getEmployeeInfo = function(dataId){
		($scope.employees).forEach(function(e){// loop  to all the employee data
			if(e.id==dataId){
				if(employeeId==dataId){ $scope.employeeData = {}; employeeId = 0;}
				else{ employeeId = dataId; $scope.employeeData = e;}
				return false;
			}

		});
		$scope.employeeFields = $scope.employeeData;
		// console.log(employeeId);
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
		dbOperations.processData("AddAccess",$scope.employeeAccessFields).then(function(res){getEmployees();$("#add-access").modal("close");});
	}
	$scope.addEmployee = function(){
		$scope.employeeFields.position_fk = $(".employee-management select[name='positionField']").val();
		$scope.employeeFields.branch_fk = $(".employee-management select[name='branchField']").val();
		if($scope.employeeFields.position_fk==""||$scope.employeeFields.branch_fk ==""){
			alert("Incomplete information");
		}
		else{
			console.log($scope.employeeFields);
			dbOperations.processData("AddEmployee",$scope.employeeFields).then(function(res){getEmployees();$("#add-employee").modal("close");});
			$scope.employeeFields={};
		}
		// console.log($scope.employeeFields);

		// alert();
	}
	getEmployees();
	$scope.employeeManagementInit = function(){
		dbOperations.views("getBranches","").then(function(res){ $scope.branches = res; });
		dbOperations.views("getPositions","").then(function(res){ $scope.positions = res; });
	}
})

app.controller("reports",function($scope,$http,dbOperations,$interval){

	$scope.selectedDate = new Date();
	$scope.transactions = [];
	$scope.totalSales = 0;
	$scope.reportFilters = [
		{"name":"Daily","id":"d1","val":1},
		{"name":"Weekly","id":"d2","val":2},
		{"name":"Monthly","id":"d3","val":3},
		{"name":"Yearly","id":"d4","val":4},
	];


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
