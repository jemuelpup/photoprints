app.filter('shortDateFromat',function(){
	return function(date){
		return date.toString().substring(4,15);;
	}
});

app.filter('gender',function(){
	return function(gender){
		return gender==1 ? "Male" : "Female";
	}
});

app.filter('position',function($http){
	var positions = [{name:"cashier",val:1},{name:"operator",val:2},{name:"admin",val:3}];
	var poitionName = "";
	return function(positionNum){
		positions.forEach(function(p){
			if(p.val==positionNum){
				poitionName = p.name;
				return false;
			}
		});
		return poitionName;
	}
});

app.filter("branch", function(){
	var branches = [{name:"UST Branch",val:1},{name:"Lassale branch",val:2}];
	var branchName = "";
	return function(branchNum){
		branches.forEach(function(b){
			if(b.val==branchNum){
				branchName = b.name;
				return false;
			}
		});
		return branchName;
	}
});