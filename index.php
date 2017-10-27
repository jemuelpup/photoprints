
<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
		<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="/common/css/login.css">
		<script src="/plugin/node_modules/angular/angular.min.js"></script>
	</head>
	<body ng-app="photoPrints">
		
		<main>
			<div class="container">
				<div class="row">
					<div class="login">
						<div class="login-card">
							<div class="col s12">
								<h1><img src="/common/images/logo.png" alt=""></h1>
							</div>
							<div class="input-field col s12">
			          <input id="first_name" type="text" class="validate">
			          <label for="first_name">First Name</label>
							</div>
			        <div class="input-field col s12">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Last Name</label>
			        </div>
			        <button class="btn waves-effect waves-light right login-button" type="submit" name="action">Submit
						    <i class="material-icons right">send</i>
						  </button>
			      </div>
		      </div>
				</div>
			</div>
		</main>
		<script src="/plugin/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="/plugin/node_modules/materialize-css/dist/js/materialize.min.js"></script>

	
	</body>
</html>