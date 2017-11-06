/*
@param:
process(String),
dataInputs(Object), -like in serialize array in jqueyr
callback(Function) - function call after the request
*/
operations.service('dbOperations',function($http){
	// this is responsible for insertion and updating of data
	this.processData = function(process,dataInputs,callback){
		return $http({
			method:"POST",
			url:"/common/functions.php",
			data: {
				'process': process,
				'data': dataInputs
			}
		}).then(function success(res){
			callback();
			console.log(res);
			return res.data;
		}, function myError(response) {
			// console.log("Error");
	    });
	}
	this.view = function(process,dataInputs){
		return $http({
			method:"POST",
			url:"/common/views.php",
			data: {
				'process': process,
				'data': dataInputs
			}
		}).then(function success(res){
			return res.data;
		}, function myError(response) {
			return "Something wrong in the system";
	    });
	}

	this.unclaimedOrders = function(process,dataInputs){
		return $http({
			method:"POST",
			url:"/common/views.php",
			data: {
				'process': process,
				'data': dataInputs
			}
		}).then(function success(res){
			return res.data;
		}, function myError(response) {
			return "Something wrong in the system";
	    });
	}



	this.items = function(process,dataInputs){
		return $http({
			method:"POST",
			url:"/common/views.php",
			data: {
				'process': process,
				'data': dataInputs
			}
		}).then(function success(res){
			var categorieInQueries = [];
			var prevVal = 0;
			var itemArray = [];
			var categoryID = "";
			var categoryName = "";
			(res.data).forEach(function(e, idx, array){
				if(prevVal==0){
					prevVal=e.category_fk;
					categoryID = e.category_fk;
					categoryName = e.category_name;
				}
				if (idx === array.length - 1){// check if last iteration
					itemArray.push(e);
					categorieInQueries.push({categoryID:categoryID,categoryName:categoryName,items:itemArray});
				}
				else if(prevVal!=e.category_fk){
					categorieInQueries.push({categoryID:categoryID,categoryName:categoryName,items:itemArray});
					itemArray = [];
					categoryID = e.category_fk;
					categoryName = e.category_name;
					prevVal=e.category_fk;
					itemArray.push(e);
				}
				else{// first iteration and equal categories
					itemArray.push(e);
				}
			});
			return categorieInQueries;
		}, function myError(response) {
			// console.log("Error");
	    });
	}
	// function categoryBasedJsonFormat(data){
	// 	data.
	// }
});