<?php
	include 'modals.php';
?>
<!DOCTYPE html>
<html ng-app="photoPrints">
	<head>
		<title>Page Title</title>
		<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css">
		<script src="/plugin/node_modules/angular/angular.min.js"></script>
	</head>
	<body>
		<header>
			<div class="sidenav fixed">
				<h1><img src="/common/images/logo.png" alt=""></h1>
				<ul class="navigation">
					<li><a href="#" class="product-management-btn"><i class="small material-icons">note_add</i><span>Product management</span></a></li>
					<li><a href="#" class="employee-management-btn"><i class="small material-icons">person</i><span><span>Employee management</span></a></li>
					<li><a href="#" class="buisness-management-btn"><i class="small material-icons">business</i><span><span>Buisness management</span></a></li>
					<li><a href="#" class="reports-btn"><i class="small material-icons">library_books</i><span><span>Reports</span></a></li>
				</ul>
			</div>
		</header>
		<main>
			<div class="banner-area">
				<div class="container">
					<h2>Point of sale System</h2>
				</div>
			</div>
			<section class="product-management">
				<div class="container">
					<h2>Product management</h2>
					<div class="row">
						<div class="col s12">
							<?php getCategoryUpdateModal(); ?>
							<div class="row">
								<div class="col s6">
									<div class="category">
										<h3>Category</h3>
										<form action="#">
											<div class="input-field col s12">
											    <input name="name" value="PAPER" type="text" class="validate" maxlength="50" required="">
											    <label for="name">name</label>
											</div>
											<div class="input-field col s12">
											    <input name="category_code" value="123" type="text" class="validate" maxlength="10">
											    <label for="category_code">category_code</label>
											</div>
											<div class="input-field col s12">
											    <input name="description" value="DUMMY" type="text" class="validate" maxlength="500">
											    <label for="description">description</label>
											</div>
							        <button class="waves-effect waves-light btn" type="submit">Add</button>
							        <a class="waves-effect waves-light btn">Clear</a>
						        </form>
					        </div>
				        </div>
				        <div class="col s6">
				        	<div class="category-list-table">
				        		<h3>Item category</h3>
										<table class="data-clickable">
											<tbody>
												<tr>
													<th>name</th>
													<th>category_code</th>
													<th>description</th>
												</tr>
												<tr data-id="1">
													<td name="name">id</td>
													<td name="category_code">id123</td>
													<td name="description">dsgffdafdsfsdf</td>
												</tr>
												<tr data-id="2">
													<td name="name">document</td>
													<td name="category_code">doc123</td>
													<td name="description">werwerwerwer</td>
												</tr>
												<tr data-id="3">
													<td name="name">picture</td>
													<td name="category_code">pic123</td>
													<td name="description">xcvbvbxcvbxvcbxcvb</td>
												</tr>
											</tbody>
										</table>
					        	<button class="waves-effect waves-light btn" id="edit-category-trigger">Edit</button>
						        <a class="waves-effect waves-light btn">Delete</a>
						      </div>
				        </div>
				      </div>
						</div>
						<div class="col s12">
							<div class="row">
								<div class="col s6">
									<div class="item">
					        	<h3>Item</h3>
					        	<form action="#">
						        	<div class="input-field col s12">
											    <input name="name" value="" type="text" class="validate" maxlength="50" required="">
											    <label for="name">name</label>
											</div>
											<div class="input-field col s12">
											    <input name="code" value="" type="text" class="validate" maxlength="10">
											    <label for="code">code</label>
											</div>
											<div class="input-field col s12">
											    <input name="category_fk" value="" type="number" class="validate" maxlength="11">
											    <label for="category_fk">category_fk</label>
											</div>
											<div class="input-field col s12">
											    <input name="price" value="" type="number" class="validate" maxlength="11">
											    <label for="price">price</label>
											</div>
							        <button class="waves-effect waves-light btn" type="submit">Add</button>
						        </form>
						        <a class="waves-effect waves-light btn">Clear</a>
					        </div>
								</div>
								<div class="col s6">
									<div class="item-list">
										<h3>Item list</h3>
										<table class="data-clickable">
										    <tbody>
										        <tr>
										            <th>name</th>
										            <th>code</th>
										            <th>category_fk</th>
										            <th>date_modified</th>
										            <th>price</th>
										        </tr>
										        <tr>
										            <td>name</td>
										            <td>code</td>
										            <td>category_fk</td>
										            <td>date_modified</td>
										            <td>price</td>
										        </tr>
										        <tr>
										            <td>name</td>
										            <td>code</td>
										            <td>category_fk</td>
										            <td>date_modified</td>
										            <td>price</td>
										        </tr>
										        <tr>
										            <td>name</td>
										            <td>code</td>
										            <td>category_fk</td>
										            <td>date_modified</td>
										            <td>price</td>
										        </tr>
										    </tbody>
										</table>
										<a class="waves-effect waves-light btn">Edit</a>
						        <a class="waves-effect waves-light btn">Delete</a>
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
						<div class="col s12">
							<?php getEmployeeModal(); ?>
							<?php getAddAccountModal(); ?>

							<a class="btn-floating btn-large waves-effect waves-light modal-trigger fixed-bottom-right" data-target="add-employee"><i class="material-icons">add</i></a>
						</div>
						<div class="col s12">
							<div class="employee-list">
								<h3>Employee list</h3>
								<table>
								    <tbody>
								        <tr>
								            <th>name</th>
								            <th>address</th>
								            <th>contact_number</th>
								            <th>email</th>
								            <th>position_fk</th>
								            <th>branch_fk</th>
								            <th>salary</th>
								            <th>birth_day</th>
								            <th>gender</th>
								        </tr>
								        <tr>
								            <td>name</td>
								            <td>address</td>
								            <td>contact_number</td>
								            <td>email</td>
								            <td>position_fk</td>
								            <td>branch_fk</td>
								            <td>salary</td>
								            <td>birth_day</td>
								            <td>gender</td>
								        </tr>
								        <tr>
								            <td>name</td>
								            <td>address</td>
								            <td>contact_number</td>
								            <td>email</td>
								            <td>position_fk</td>
								            <td>branch_fk</td>
								            <td>salary</td>
								            <td>birth_day</td>
								            <td>gender</td>
								        </tr>
								        <tr>
								            <td>name</td>
								            <td>address</td>
								            <td>contact_number</td>
								            <td>email</td>
								            <td>position_fk</td>
								            <td>branch_fk</td>
								            <td>salary</td>
								            <td>birth_day</td>
								            <td>gender</td>
								        </tr>
								    </tbody>
								</table>
								<a class="waves-effect waves-light btn">Edit</a>
							  <a class="waves-effect waves-light btn">Delete</a>
							  <a class="waves-effect waves-light btn modal-trigger" data-target="add-account">Add Access</a>
						  </div>
						</div>
					</div>
				</div>
			</section>
			<section class="buisness-management">
				<div class="container">
					<h2>System management</h2>
					<div class="row">
						<div class="col s12">
							<h3>Branch management</h3>
							<div class="row">
				      	<div class="col s6">
				      		<div class="branch">
										<h4>Add Branch</h4>
										<form action="#">
										<div class="input-field col s12">
										    <input name="name" value="" type="text" class="validate" maxlength="50" required="">
										    <label for="name">name</label>
										</div>
										<div class="input-field col s12">
										    <input name="code" value="" type="text" class="validate" maxlength="10" required="">
										    <label for="code">code</label>
										</div>
										<div class="input-field col s12">
										    <input name="address" value="" type="text" class="validate" maxlength="200">
										    <label for="address">address</label>
										</div>
										<div class="input-field col s12">
										    <input name="description" value="" type="text" class="validate" maxlength="200">
										    <label for="description">description</label>
										</div>
						        <button class="waves-effect waves-light btn" type="submit">Add</button>
							      <a class="waves-effect waves-light btn">Clear</a>
							      </form>
						      </div>
					      </div>
					      <div class="col s6">
									<h4>Branch list</h4>
									<table>
									    <tbody>
									        <tr>
									            <th>name</th>
									            <th>address</th>
									            <th>description</th>
									            <th>code</th>
									        </tr>
									        <tr>
									            <td>name</td>
									            <td>address</td>
									            <td>description</td>
									            <td>code</td>
									        </tr>
									        <tr>
									            <td>name</td>
									            <td>address</td>
									            <td>description</td>
									            <td>code</td>
									        </tr>
									        <tr>
									            <td>name</td>
									            <td>address</td>
									            <td>description</td>
									            <td>code</td>
									        </tr>
									    </tbody>
									</table>
									<a class="waves-effect waves-light btn">Edit</a>
						      <a class="waves-effect waves-light btn">Delete</a>
								</div>
				      </div>
						</div>
						<div class="col s12">
							<h3>Employee position management</h3>
							<div class="row">
				      	<div class="col s6">
				      		<div class="position">
					      		<form action="#">
											<h4>Add Employee Position</h4>
											<div class="input-field col s12">
											    <input name="name" value="" type="text" class="validate" maxlength="50" required="">
											    <label for="name">name</label>
											</div>
											<div class="input-field col s12">
											    <input name="description" value="" type="text" class="validate" maxlength="500">
											    <label for="description">description</label>
											</div>
							        <button class="waves-effect waves-light btn" type="submit">Add</button>
								      <a class="waves-effect waves-light btn">Clear</a>
							      </form>
						      </div>
					      </div>
					      <div class="col s6">
									<h4>Employee Position list</h4>
									<table>
									    <tbody>
									        <tr>
									            <th>name</th>
									            <th>description</th>
									        </tr>
									        <tr>
									            <td>name</td>
									            <td>description</td>
									        </tr>
									        <tr>
									            <td>name</td>
									            <td>description</td>
									        </tr>
									        <tr>
									            <td>name</td>
									            <td>description</td>
									        </tr>
									    </tbody>
									</table>
									<a class="waves-effect waves-light btn">Edit</a>
						      <a class="waves-effect waves-light btn">Delete</a>
								</div>
				      </div>
						</div>
					</div>
				</div>
			</section>
			<section class="reports">
				<div class="container">
					
				</div>
			</section>
		</main>


		<script src="/plugin/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="/plugin/node_modules/materialize-css/dist/js/materialize.min.js"></script>
		<script src="/js/angularFiles/modules.js"></script>
		<script src="/js/angularFiles/directives.js"></script>
		<!-- <script src="/common/js/operations.js"></script> -->
		<script src="/js/view.js"></script>
		<script src="/js/main.js"></script>
	</body>
</html>