<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
		<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		
		<main>
			<div class="container">
				<h1>Admin</h1>
			</div>
			<section class="product-management">
				<div class="container">
					<h2>Product management</h2>
					<div class="row">
						<div class="col s6">
							<div class="row">
								<div class="col s12">
									<div class="category">
										<h3>Category</h3>
						        <div class="input-field">
						          <input placeholder="Category" id="category-code" type="text" class="validate">
						          <label for="category-code">category-code</label>
						        </div>
						        <div class="input-field">
						          <input placeholder="Category" id="category-name" type="text" class="validate">
						          <label for="category-name">category-name</label>
						        </div>
						        <a class="waves-effect waves-light btn">Add</a>
					        </div>
				        </div>
				        <div class="col s12">
					        <div class="item">
					        	<h3>Item</h3>
					        	<div class="input-field">
					        		<input placeholder="item" id="item-category" type="text" class="validate">
						          <label for="item-category">item-category</label>
					        	</div>
					        	<div class="input-field">
					        		<input placeholder="item" id="item-name" type="text" class="validate">
						          <label for="item-name">item name</label>
					        	</div>
						        <div class="input-field">
						          <input placeholder="price" id="price" type="text" class="validate">
						          <label for="price">price</label>
						        </div>
						        <a class="waves-effect waves-light btn">Add</a>
					        </div>
				        </div>
				      </div>
						</div>
						<div class="col s6">
							<div class="row">
								<div class="col s12">
									<div id="category-list">
										<h3>Item category</h3>
										<table>
											<tr><th>Category</th></tr>
											<tr><td>Category name01</td></tr>
											<tr><td>Category name01</td></tr>
											<tr><td>Category name01</td></tr>
										</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div id="item-list">
										<h3>Item list</h3>
										<table>
											<tr><th>Id</th><th>Name</th><th>Price</th><th>Category</th><th>Code</th></tr>
											<tr><td>1</td><td>item 1</td><td>10php</td><td>cat name here</td><td>I1</td></tr>
											<tr><td>2</td><td>item 2</td><td>10php</td><td>cat name here</td><td>I2</td></tr>
											<tr><td>3</td><td>item 3</td><td>10php</td><td>cat name here</td><td>I3</td></tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="employee-management">
				<div class="container">
					<h2>Employee management</h2>
					<div class="row">
						<div class="col s6">
							<h3>Add employee</h3>
							<div class="input-field">
			          <input name="name" type="text" class="validate">
			          <label for="name">name</label>
			        </div>
							<div class="input-field">
			          <input name="age" type="text" class="validate">
			          <label for="age">age</label>
			        </div>
							<div class="input-field">
			          <input name="gender" type="text" class="validate">
			          <label for="gender">gender</label>
			        </div>
							<div class="input-field">
			          <input name="address" type="text" class="validate">
			          <label for="address">address</label>
			        </div>
							<div class="input-field">
			          <input name="contact-number" type="text" class="validate">
			          <label for="contact-number">contact-number</label>
			        </div>
							<div class="input-field">
			          <input name="department" type="text" class="validate">
			          <label for="department">department</label>
			        </div>
							<div class="input-field">
			          <input name="username" type="text" class="validate">
			          <label for="username">username</label>
			        </div>
							<div class="input-field">
			          <input name="password" type="password" class="validate">
			          <label for="password">password</label>
			        </div>
			        <button class="btn waves-effect waves-light" name="action">delete<i class="material-icons right">send</i></button>
						</div>
						<div class="col s6">
							<h3>Employee list</h3>
							<table class="employee-tbl">
								<tr><th>name</th><th>age</th><th>gender</th><th>address</th><th>contact-number</th><th>department</th><th>department</th><th>action</th></tr>
								<tr>
								<td>name</td>
								<td>age</td>
								<td>gender</td>
								<td>address</td>
								<td>contact-number</td>
								<td>department</td>
								<td>department</td>
								<td>
						      <input name="group1" type="radio" id="test1" />
						      <label for="test1"></label>
						    </td>
						    </tr>
								<tr>
								<td>name</td>
								<td>age</td>
								<td>gender</td>
								<td>address</td>
								<td>contact-number</td>
								<td>department</td>
								<td>department</td>
								<td>
									<input name="group1" type="radio" id="test2" />
						      <label for="test2"></label>
								</td></tr>
								<tr>
								<td>name</td>
								<td>age</td>
								<td>gender</td>
								<td>address</td>
								<td>contact-number</td>
								<td>department</td>
								<td>department</td>
								<td>
									<input name="group1" type="radio" id="test3" />
						      <label for="test3"></label>
								</td></tr>
								<tr>
								<td>name</td>
								<td>age</td>
								<td>gender</td>
								<td>address</td>
								<td>contact-number</td>
								<td>department</td>
								<td>department</td>
								<td>
									<input name="group1" type="radio" id="test4" />
						      <label for="test4"></label>
								</td></tr>
							</table>
							<div class="actions">
								<button class="btn waves-effect waves-light" name="action">Submit<i class="material-icons right">send</i></button>
								<button class="btn waves-effect waves-light" name="action">edit<i class="material-icons right">send</i></button>
								<button class="btn waves-effect waves-light" name="action">delete<i class="material-icons right">send</i></button>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="branch-management">
				<div class="container">
					<h2>Branch management</h2>
					<div class="row">
						<div class="col s6">
							<h3>Add Branch</h3>
							<div class="row">
				        <div class="input-field col s12">
				          <input placeholder="Placeholder" id="department-name" type="text" class="validate">
				          <label for="department-name">department-name</label>
				        </div>
				        <div class="input-field col s12">
				          <input placeholder="Placeholder" id="branch-code" type="text" class="validate">
				          <label for="branch-code">branch-code</label>
				        </div>
				        <button class="btn waves-effect waves-light" name="action">delete<i class="material-icons right">send</i></button>
				      </div>
						</div>
						<div class="col s6">
							<h3>Branch list</h3>
							<table>
								<tr>
									<th>id</th>
									<th>name</th>
									<th>code</th>
								</tr>
								<tr>
									<td>id</td>
									<td>name</td>
									<td>code</td>
								</tr>
								<tr>
									<td>id</td>
									<td>name</td>
									<td>code</td>
								</tr>
								<tr>
									<td>id</td>
									<td>name</td>
									<td>code</td>
								</tr>
								<tr>
									<td>id</td>
									<td>name</td>
									<td>code</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</section>
		</main>


		<script src="/plugin/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="/plugin/node_modules/materialize-css/dist/js/materialize.min.js"></script>
		<script src="/plugin/node_modules/angular/angular.min.js"></script>
	</body>
</html>