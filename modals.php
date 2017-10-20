<?php

	function getEmployeeModal(){
    	echo '
            <div id="add-employee" class="modal employee">
              <form action="#">
                <div class="modal-content">
                    <h2>Add Employee</h2>
                    <div class="input-field col s12">
  <input ng-model="employeeFields.name" value="" type="text" class="validate" maxlength="100" required>
  <label ng-class=" employeeFields.name.length>0 ? \'active\':\'\'" for="name">name</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.address" value="" type="text" class="validate" maxlength="50">
  <label ng-class="employeeFields.address.length>0 ? \'active\':\'\'" for="address">address</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.contact_number" value="" type="text" class="validate" maxlength="50">
  <label ng-class="employeeFields.contact_number.length>0 ? \'active\':\'\'" for="contact_number">contact_number</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.email" value="" type="text" class="validate" maxlength="50">
  <label ng-class="employeeFields.email.length>0 ? \'active\':\'\'" for="email">email</label>
</div>
<div class="input-field col s12">
  <select name="positionField" ng-model="employeeFields.position_fk">
    <option value="" selected>Choose position</option>
    <option value="{{c.id}}" ng-repeat="c in positions">{{c.name}}</option>
  </select>
  <label for="position_fk">position_fk</label>
</div>
<div class="input-field col s12">
  <select name="branchField" ng-model="employeeFields.branch_fk">
    <option value="" selected>Choose branch</option>
    <option value="{{branch.id}}" ng-repeat="branch in branches">{{branch.name}}</option>
  </select>
  <label for="branch_fk">branch_fk</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.salary" value="" type="number" class="validate" maxlength="11" required>
  <label ng-class="employeeFields.salary>0 ? \'active\':\'\'" for="salary">salary</label>
</div>
<div class="input-field col s12">
  <input placeholder="" ng-model="employeeFields.birth_day" value="" type="date" class="validate" maxlength="" required>
  <label for="birth_day" class="active">birth_day</label>
</div>
<div class="col s12">
  <p>Gender
    <input class="with-gap" ng-model="employeeFields.gender" name="gender" type="radio" id="male" value=1 checked ng-checked="true"/>
    <label for="male">Male</label>
    <input class="with-gap" ng-model="employeeFields.gender" name="gender" type="radio" id="female" value=0 />
    <label for="female">Female</label>
  </p>
</div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Clear</a>
                    <button class="waves-effect waves-light btn" ng-click="addEmployee()">Add</button>

                    <button class="waves-effect waves-light btn" ng-click="updateEmployeeData()">update</button>
                </div>
              </form>
            </div>
    	';
	}
	function getAddAccountModal(){
		echo '
			<div id="add-access" class="modal">
				<div class="modal-content">
				    <h4>Add access</h4>
				    <div class="input-field col s12">
                <input ng-model="employeeAccessFields.username" value="" type="text" class="validate" maxlength="50" required="">
                <label for="username">username</label>
            </div>
            <div class="input-field col s12">
                <input ng-model="employeeAccessFields.password" value="" type="text" class="validate" maxlength="50" required="">
                <label for="password">password</label>
            </div>
				</div>
				<div class="modal-footer">
				    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Clear</a>
				    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" ng-click="addEmployeeAccess()">Add</a>
				</div>
			</div>
		';
	}
  function getCategoryUpdateModal(){
    echo '
      <div id="edit-category" class="modal edit-category">
        <form action="#">
          <div class="modal-content">
            <h4>Edit category</h4>
            <div class="input-field col s12">
              <input placeholder="" name="name" value="" type="text" class="validate" maxlength="50" required="">
              <label for="name">name</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="" name="category_code" value="" type="text" class="validate" maxlength="10">
              <label for="category_code">category_code</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="" name="description" value="" type="text" class="validate" maxlength="500">
              <label for="description">description</label>
            </div>
          </div>
          <div class="modal-footer">
            <button class="waves-effect waves-light btn" type="submit">Update</button>
          </div>
        </form>
      </div>
    ';
  }

?>

        



