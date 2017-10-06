

app.service('stringLib', function() {
    this.count = function (x) {
       return x + x.length;
    }
});


app.service('renderinglib', function() {


	/*
	This function sets the height of the selected img to the smallest img
	selected by the selector
	*/
  this.autoheight = function (selector) {
    var images = angular.element(document.querySelectorAll(selector));
		var minHeight = images[0].offsetHeight;
		angular.forEach(images,function(elem,index){ 
			minHeight = Math.min(minHeight, elem.offsetHeight) 
		})
		console.log("height "+minHeight);
		angular.forEach(images,function(elem,index){
			angular.element(elem).css({height: minHeight + 'px'})
		}) 
  }
	/*
	Default is the default height you set.
	This function returns the smallest value of img in pixin px
	*/
  this.minImgHeight = function (defaultHeight,selector) {
		console.log("dumaan");
    var images = angular.element(document.querySelectorAll(selector));
		var minHeight = images[0].offsetHeight;
		angular.forEach(images,function(elem,index){ 
			minHeight = Math.min(minHeight, elem.offsetHeight) 
		})
		if(minHeight!=0)
			return minHeight + "px";
		return defaultHeight + "px";
  }
  
});


