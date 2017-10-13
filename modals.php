<?php

	function getEmployeeModal(){
    	echo '
            <div id="add-employee" class="modal employee">
              <form action="#">
                <div class="modal-content">
                    <h2>Add Employee</h2>
                    <div class="input-field col s12">
                        <input name="name" value="" type="text" class="validate" maxlength="100" required="">
                        <label for="name">name</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="address" value="" type="text" class="validate" maxlength="50">
                        <label for="address">address</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="contact_number" value="" type="text" class="validate" maxlength="50">
                        <label for="contact_number">contact_number</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="email" value="" type="text" class="validate" maxlength="50">
                        <label for="email">email</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="position_fk" value="" type="number" class="validate" maxlength="11">
                        <label for="position_fk">position_fk</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="branch_fk" value="" type="number" class="validate" maxlength="11">
                        <label for="branch_fk">branch_fk</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="salary" value="" type="number" class="validate" maxlength="11" required="">
                        <label for="salary">salary</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="birth_day" value="" type="text" class="validate" maxlength="">
                        <label for="birth_day">birth_day</label>
                    </div>
                    <div class="gender">
                      <p>Gender
                            <input name="gender" type="radio" id="male" checked/>
                            <label for="male">Male</label>
                            <input name="gender" type="radio" id="female" />
                            <label for="female">Female</label>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Clear</a>
                    <button class="waves-effect waves-light btn" type="submit">Add</button>
                </div>
              </form>
            </div>
    	';
	}
	function getAddAccountModal(){
		echo '
			<div id="add-account" class="modal">
				<div class="modal-content">
				    <h4>Add account</h4>
				    <div class="input-field col s12">
				        <input placeholder="" name="username" value="" type="number" class="validate" maxlength="11" required="">
				        <label for="username">username</label>
				    </div>
				    <div class="input-field col s12">
				        <input placeholder="" name="password" value="" type="number" class="validate" maxlength="11" required="">
				        <label for="password">password</label>
				    </div>
				</div>
				<div class="modal-footer">
				    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Clear</a>
				    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Add</a>
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

        




			        


		