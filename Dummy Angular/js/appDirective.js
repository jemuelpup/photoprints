// directives are templates

app.directive("cardDirective",function(){
	return {
		template: "<p>{{employee.name}}</p>"
	}
})


app.directive("cardListStyle01",function(){
	return {
		template: `
			<li class='contentContainer02 card' ng-click="cardClicked($event)" ng-repeat='d in data'>
				<div class='imageBlock'>
					<div class='logo' style='height: {{minImgHeight}}'><img class='card-img' src='/images/img0{{$index%5+1}}.jpg' alt=''></div>
					<h3 class='cardTitle cWhite'>{{d.name}}</h3>
				</div>
				<div class='cardContentBlock'>
					<p class='cardPar'>{{d.employeeNum}}</p>
				</div>
			</li>
		`
	}
	
})

