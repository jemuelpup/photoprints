/*
@param:
process(String),
dataInputs(Object), -like in serialize array in jqueyr
callback(Function) - function call after the request
*/
app.service('dbOperations',function($http){
	this.processData = function(process,dataInputs,callback){
		$http({
			method:"POST",
			url:"/admin/functions.php",
			data: {
				'process': process,
				'data': dataInputs
			}
		}).then(function success(res){
			callback();
			console.log(res,"ito yun");
		}, function myError(response) {
			// console.log("Error");
	    });
	},
	this.getData = function(process,date){
		return $http({
			method:"POST",
			url:"/admin/view.php",
			data: {
				'process': process,
				'data': date
			}
		}).then(function success(res){
			return res;
		}, function myError(response) {
			return 0;
	    });
	}
	// this.getSalesOn = function(process,date){
	// 	return $http({
	// 		method:"POST",
	// 		url:"/admin/view.php",
	// 		data: {
	// 			'process': process,
	// 			'data': date
	// 		}
	// 	}).then(function success(res){
	// 		return res;
	// 	}, function myError(response) {
	// 		return 0;
	//     });
	// }
});
