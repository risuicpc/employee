<?php
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'test');

if (isset($_POST['reg_emp'])) {
  
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $designation = mysqli_real_escape_string($db, $_POST['designation']);
  $birth = mysqli_real_escape_string($db, $_POST['birth']);
  $salary = mysqli_real_escape_string($db, $_POST['salary']);
  $date_join = mysqli_real_escape_string($db, $_POST['date_join']);
  $specialization = mysqli_real_escape_string($db, $_POST['specialization']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($id)) { array_push($errors, "ID is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($designation)) { array_push($errors, "Designation is required"); }
  if (empty($birth)) { array_push($errors, "Date of birth is required"); }
  if (empty($salary)) { array_push($errors, "Salary is required"); }
  if (empty($date_join)) { array_push($errors, "Date of join is required"); }
  

  $employee_check_query = "SELECT * FROM employee WHERE id='$id' LIMIT 1";
  $result = mysqli_query($db, $employee_check_query);
  $employee = mysqli_fetch_assoc($result);
  
  if ($employee) { // if employee exists
    if ($employee['id'] === $id) {
      array_push($errors, "ID already exists");
    }
  }

  // Finally, register employee if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO employee (id, name, designation, birth, salary, date_join, specialization) 
  			  VALUES('$id', '$name', '$designation', '$birth', '$salary', '$date_join', '$specialization')";
  	mysqli_query($db, $query);
  	$_SESSION['success'] = "You are register successfuly";
  	header('location: index.html');
  }
}
if (count($errors) > 0) : ?>
<style>
    .error {
    width: 92%; 
    margin: 0px auto; 
    padding: 10px; 
    border: 1px solid #a94442; 
    color: #a94442; 
    background: #f2dede; 
    border-radius: 5px; 
    text-align: left;
    }
</style>
<div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
    <a href="registration.html">Go back to registration page</a>
</div>
<?php  endif ?>
