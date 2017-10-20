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
			url:"/functions.php",
			data: {
				'process': process,
				'data': dataInputs
			}
		}).then(function success(res){
			callback();
			console.log(res);
		}, function myError(response) {
			// console.log("Error");
	    });
	}
});