app.filter('capitalized',function(){
	return function(x){
		var capitalizedText = "";
		for(var i=0;i<x.length;i++){
			capitalizedText += x[i].toUpperCase();
		}
		return capitalizedText;
	}
});


app.filter('capitalizedWithCount',["stringLib", function(stringLib){
	return function(x){
		var capitalizedText = "";
		for(var i=0;i<x.length;i++){
			capitalizedText += x[i].toUpperCase();
		}
		return stringLib.count(capitalizedText);
	}
}])

