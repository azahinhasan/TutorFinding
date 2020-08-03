<?php
require_once '../model.php';


if (isset($_POST['createTutor'])) {
	$data['Name'] = $_POST['Name'];
	$data['Password'] = password_hash($_POST['Password'], PASSWORD_BCRYPT, ["cost" => 12]);
	$data['Address'] = $_POST['Address'];
	$data['Email'] = $_POST['Email'];
	$data['Phone'] = $_POST['Phone'];
	$data['Gender'] = $_POST['Gender'];
	$data['Bangla'] = $_POST['Bangla'];
	$data['English'] = $_POST['English'];
	$data['Chemistry'] = $_POST['Chemistry'];
	$data['Physics'] = $_POST['Physics'];
	$data['Math'] = $_POST['Math'];
	$data['Biology'] = $_POST['Biology'];
	$data['Class1to5'] = $_POST['Class1to5'];
	$data['Class6to8'] = $_POST['Class6to8'];
	$data['Class9to10'] = $_POST['Class9to10'];
	$data['SalaryStart'] = $_POST['SalaryStart'];
	$data['SalaryEnd'] = $_POST['SalaryEnd'];
	$data['Verified'] = $_POST['Verified'];

	$data['ProfilePic'] = $_POST['ProfilePic'];
	$data['CV'] = $_POST['CV'];

	if (addTutor($data)) {
		echo 'Successfully added!!';
	}
} else {
	echo 'You are not allowed to access this page.';
}
