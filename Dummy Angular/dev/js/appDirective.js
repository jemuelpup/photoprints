/*
Note:
The camel case will become lowercase all separated by "-"
ex: profileCard01 will become profile-card01
*/

app.directive("profileCard01",function(){
	return {
		template: `
			<div class="card">
				<div class="profileCard01 {{profileCard01Active}}" ng-click="setActive()">
					<div class="profilePictureBlock">
						<div class="cardBanner">
							<img src="images/img01.jpg" alt="">
						</div>
						<div class="profilePicture">
							<img src="images/profilePix.jpg" alt="">
						</div>
					</div>
					<div class="info">
						<p class="name">Karen Joy Talla</p>
						<p class="desc">Designer</p>
					</div>
				</div>
			</div>
		`
	}
});

app.directive("articleCard01",function(){
	return {
		template: `
			<div class="card">
				<div class="articleCard01">
					<div class="cardBanner">
						<img src="images/img01.jpg" alt="">
					</div>
					<div class="info">
						<p class="daysPast">1 Day ago</p>
						<p class="title">Title here</p>
						<p class="article">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita possimus ipsum voluptatem dolore magni. Modi voluptas...</p>
						<div class="socialMedia">
						<p class="postBy">By: Jemuel</p>
						<ul class="share">
							<li><a href="#"><i>a</i></a></li>
							<li><a href="#"><i>b</i></a></li>
							<li><a href="#"><i>c</i></a></li>
						</ul>
					</div>
					</div>
					
				</div>
			</div>
		`
	}
});

app.directive("articleCard02",function(){
	return{
		template: `
			<div class="card">
				<div class="articleCard02">
					<div class="info-block">
						<div class="info">
							<p class="writer">Jemuel</p>
							<p class="title">Title Here</p>
							<p class="article-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
						<button class="theme-round">Click</button>
					</div>
					<div class="cardBanner">
						<img src="images/portraitPix.jpg" alt="">
					</div>
				</div>
			</div>
		`
	}
})