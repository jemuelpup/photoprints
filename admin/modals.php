<?php

	function getEmployeeModal(){
    	echo '
            <div id="add-employee" class="modal employee">
              <form action="#">
                <div class="modal-content">
                    <h2>Add Employee</h2>
                    <div class="input-field col s12">
  <input ng-model="employeeFields.name" type="text" class="validate" maxlength="100" required>
  <label ng-class=" employeeFields.name.length>0 ? \'active\':\'\'" for="name">name</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.address" type="text" class="validate" maxlength="50">
  <label ng-class="employeeFields.address.length>0 ? \'active\':\'\'" for="address">address</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.contact_number" type="text" class="validate" maxlength="50">
  <label ng-class="employeeFields.contact_number.length>0 ? \'active\':\'\'" for="contact_number">contact_number</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.email" type="text" class="validate" maxlength="50">
  <label ng-class="employeeFields.email.length>0 ? \'active\':\'\'" for="email">email</label>
</div>
<div class="input-field col s12">
  <select name="positionField" ng-model="employeeFields.position_fk">
    <option selected>Choose position</option>
    <option value="{{c.id}}" ng-repeat="c in positions">{{c.name}}</option>
  </select>
  <label for="position_fk">position_fk</label>
</div>
<div class="input-field col s12">
  <select name="branchField" ng-model="employeeFields.branch_fk">
    <option selected>Choose branch</option>
    <option value="{{branch.id}}" ng-repeat="branch in branches">{{branch.name}}</option>
  </select>
  <label for="branch_fk">branch_fk</label>
</div>
<div class="input-field col s12">
  <input ng-model="employeeFields.salary" type="number" class="validate" maxlength="11" required>
  <label ng-class="employeeFields.salary>0 ? \'active\':\'\'" for="salary">salary</label>
</div>
<div class="input-field col s12">
  <input placeholder="" ng-model="employeeFields.birth_day" type="date" class="validate" maxlength="" required>
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
                <input ng-model="employeeAccessFields.username" type="text" class="validate" maxlength="50" required>
                <label for="username">username</label>
            </div>
            <div class="input-field col s12">
                <input ng-model="employeeAccessFields.password" type="text" class="validate" maxlength="50" required>
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
        <form action="#" ng-submit="editCategory()">
          <div class="modal-content">
            <h4>Edit category</h4>
            <div class="input-field col s12">
              <input placeholder="" ng-model="editCategoryFields.name" name="name" type="text" class="validate" maxlength="50" required>
              <label for="name">name</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="" ng-model="editCategoryFields.code" name="category_code" type="text" class="validate" maxlength="10">
              <label for="category_code">category_code</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="" ng-model="editCategoryFields.description" name="description" type="text" class="validate" maxlength="500">
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
  function getBranchListUpdateModal(){
    echo "<div id='edit-branch' class='modal edit-branch'>
            <form ng-submit='editBranch()'>
                <div class='modal-content'>
                    <h2>Update name here</h2>
                    <div class='input-field col s12'>
                        <input placeholder='' ng-model='editBranchFields.name' value='' type='text' class='validate' maxlength='50' required/>
                        <label for='name'>name</label>
                    </div>
                    <div class='input-field col s12'>
                        <input placeholder='' ng-model='editBranchFields.address' value='' type='text' class='validate' maxlength='200' />
                        <label for='address'>address</label>
                    </div>
                    <div class='input-field col s12'>
                        <input placeholder='' ng-model='editBranchFields.description' value='' type='text' class='validate' maxlength='200' />
                        <label for='description'>description</label>
                    </div>
                    <div class='input-field col s12'>
                        <input placeholder='' ng-model='editBranchFields.branch_code' value='' type='text' class='validate' maxlength='10' required/>
                        <label for='branch_code'>branch_code</label>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='waves-effect waves-light btn' type='submit'>Update</button>
                </div>
            </form>
        </div>";
  }
  function getPositionUpdateModal(){
    echo "
    <div id='edit-position' class='modal edit-position'>
    <form ng-submit='editPosition()'>
        <div class='modal-content'>
            <h2>Update name here</h2>
            <div class='input-field col s12'>
                <input placeholder='' ng-model='editPositionFields.name' value='' type='text' class='validate' maxlength='50' required/>
                <label for='name'>name</label>
            </div>
            <div class='input-field col s12'>
                <input placeholder='' ng-model='editPositionFields.description' value='' type='text' class='validate' maxlength='500' />
                <label for='description'>description</label>
            </div>
        </div>
        <div class='modal-footer'>
            <button class='waves-effect waves-light btn' type='submit'>Update</button>
        </div>
    </form>
</div>";
  }

  function getItemUpdateModal(){
    echo '
      <div id="edit-item" class="modal edit-item">
        <form ng-submit="editItem()">
          <div class="modal-content">
            <h4>Edit Item</h4>
            <div class="input-field col s12">
              <input placeholder="" ng-model="editItemFields.name" type="text" class="validate" maxlength="50" required>
              <label for="name" class="active">name</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="" ng-model="editItemFields.item_code" type="text" class="validate" maxlength="10">
              <label for="item_code" class="active">item_code</label>
            </div>
            <div class="input-field col s12">
              <select name="itemCategory" id="categoryUpdate" ng-model="editItemFields.category_fk">
                <option value="" disabled selected>Choose your option</option>
                <option value="{{c.id}}" ng-repeat="c in categories">{{c.name}}</option>
              </select>
              <label>Category</label>
            </div>
            <div class="input-field col s12">
              <input placeholder="" ng-model="editItemFields.price" type="number" class="validate" maxlength="11" step="0.01">
              <label for="price" class="active">price</label>
            </div>
          </div>
          <div class="modal-footer">
            <button class="waves-effect waves-light btn" type="submit" ng-click="editItem()">Update</button>
          </div>
        </form>
      </div>
    ';
  }

?>



