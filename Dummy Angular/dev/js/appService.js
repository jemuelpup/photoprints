app.service('animate', function() {

    
	this.animateLogo = function(){
	 //    var logoLayer1 = angular.element(document.querySelectorAll(".logo #Layer_1"));
		// var logoLayer2 = angular.element(document.querySelectorAll(".logo #Layer_2"));
		// var logoLayer3 = angular.element(document.querySelectorAll(".logo #Layer_3"));
	    angular.element(document.querySelectorAll(".logo #Layer_1")).css('width','10px');
		// logoLayer1.style.padding = 10 + 'px';
		// console.log("jemuel");
		// console.log(logoLayer1);
		// TweenMax.to(logoLayer1, 1, {x:100,rotation:360})
	}
  
});
