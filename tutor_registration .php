<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }

        #date {
            width: 27px;
        }

        #form {
            text-align: left;
            display: block;
            position: relative;
            left: 40%;
            top: -370px;
        }

        .topnav a.registration {
            background-color: #4caf50;
            color: white;
        }

        button {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 500px;
        }
    </style>
</head>

<body>
    <?php
    require_once './model.php';
    $Name = $Address = $ProfilePic = $Email = $Phone = $SalaryStart = $SalaryEnd = $Gender = $InterestedLocation = $InterestedClass = $InterestedSubject = $UniversityName = $Salary = $CV = $Certificate = $Password = "";
    $errName = $errAddress = $errProfilePic = $errEmail = $errPhone = $errGender = $errInterestedLocation = $errInterestedClass = $errInterestedSubject = $errUniversityName = $errSalary = $errCV = $errCertificate = $errPassword = "";
    $Class1to5 = $Class6to8 = $Class9to10 = $CV = "";
    $Bangla = $English = $Chemistry = $Physics = $Math =  $Biology = "";
    $Verified = "false";
    $counter = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST["Name"])) {
            $errName = "Name is required";
        } else {
            $Name = $_POST["Name"];
            $counter++;
        }
        if (empty($_POST["Password"])) {
            $errPassword = "Password is required";
        } else {
            $Password = $_POST["Password"];
            $counter++;
        }

        if (empty($_POST["Email"])) {
            $errEmail = "Email is required";
        } elseif (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = "Invalid email format";
        } else {
            $email = $_POST["Email"];
            $counter++;
        }

        if (empty($_POST["Address"]) || $_POST["Address"] == 'Option') {
            $errAddress = "Address is required";
            $Address = test_input($_POST["Address"]);
        } else {
            $Address = $_POST["Address"];
            $counter++;
        }

        if (empty($_POST["Phone"])) {
            $errPhone = "Phone is required";
        } else {
            $Phone = $_POST["Phone"];
            $counter++;
        }

        if (empty($_POST["female"]) && empty($_POST["male"])) {
            $errGender = "Gender is required";
        } elseif (isset($_POST["female"]) && isset($_POST["male"])) {
            $errGender = "You Hav to Chose one";
        } else {
            if (isset($_POST["female"])) {
                $Gender = "Female";
                $data['Gender'] = "Female";
                $counter++;
            } elseif (isset($_POST["male"])) {
                $Gender =
                    $data['Gender'] = "Male";
                $counter++;
            }
        }

        if (empty($_POST["Bangla"]) && empty($_POST["English"]) && empty($_POST["Chemistry"]) && empty($_POST["Physics"]) && empty($_POST["Math"]) && empty($_POST["Biology"])) {
            $errInterestedSubject = "Interested Subject is required";
        } else {

            if (isset($_POST["Bangla"])) {
                $data['Bangla'] = "yes";
                $Bangla = "yes";
            }
            if (isset($_POST["English"])) {
                $English = "yes";
                $data['English'] = "yes";
            }
            if (isset($_POST["Chemistry"])) {
                $Chemistry = "yes";
                $data['Chemistry'] = "yes";
            }

            if (isset($_POST["Physics"])) {
                $Physics = "yes";
                $data['Physics'] = "yes";
            }
            if (isset($_POST["Math"])) {
                $Math = "yes";
                $data['Math'] = "yes";
            }
            if (isset($_POST["Biology"])) {
                $Biology = "yes";
                $data['Biology'] = "yes";
            }
        }

        if (empty($_POST["InterestedLocation"])) {
            $errInterestedLocation = "Interested Location is required";
        }

        if (empty($_POST["class1to5"]) && empty($_POST["class6to8"]) && empty($_POST["class9to10"])) {
            $errInterestedClass = "Class is required";
        } else {
            $Class1to5 = $Class6to8 = $Class9to10 = "no";

            if (isset($_POST["class1to5"])) {
                $data['Class1to5'] = "yes";
            }
            if (isset($_POST["class6to8"])) {
                $data['Class6to8'] = "yes";
            }
            if (isset($_POST["class9to10"])) {
                $data['Class9to10'] = "yes";
            }
        }

        if (empty($_POST["SalaryStart"]) && empty($_POST["SalaryEnd"])) {
            $errSalary = "both Salary is required";
        } elseif ($_POST["SalaryStart"] > $_POST["SalaryEnd"]) {
            $errSalary = " Start Salary should me less then End Salary";
        } else {
            $SalaryStart = $_POST["SalaryStart"];
            $SalaryEnd = $_POST["SalaryEnd"];
            $counter++;
        }





        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Profile Pic--------------------------------------------------------------

        $data['ProfilePic'] = basename($_FILES["fileToUpload"]["name"]);

        if ($data['ProfilePic'] != null) {
            $counter++;
        }
        $target_dir = "ProPic/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $msg = "";

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $msg =  "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $msg =  "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $msg =  "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $msg =  "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        $upload = "img.png";
        if ($uploadOk == 0) {
            $msg =  "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg =  "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                $upload = basename($_FILES["fileToUpload"]["name"]);
            } else {
                $msg =  "Sorry, there was an error uploading your file.";
            }
        }

        //--------------------------OtherFile
        $data['CV'] = basename($_FILES["fileToUpload2"]["name2"]);
        $target_dir2 = "OtherFiles/";
        $target_file2 = $target_dir2 . basename($_FILES["fileToUpload2"]["name2"]);
        $uploadOk2 = 1;
        $imageFileType2 = strtolower(pathinfo($target_dir2, PATHINFO_EXTENSION));
        $msg2 = "";


        // Check file size
        if ($_FILES["fileToUpload2"]["size"] > 500000) {
            $msg2 =  "Sorry, your file is too large.";
            $uploadOk2 = 0;
        }

        // Allow certain file formats
        if ($imageFileType2 != "pdf" && $imageFileType2 != "docx") {
            $msg2 =  "Sorry, only Doc and Pdf files are allowed.";
            $uploadOk2 = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        $CV = basename($_FILES["fileToUpload2"]["name2"]);
        if ($uploadOk2 == 0) {
            $msg2 =  "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name2"], $target_dir2)) {
                $msg2 =  "The file " . basename($_FILES["fileToUpload2"]["name"]) . " has been uploaded.";
                //$msg = $fileToUpload2;
                $upload = basename($_FILES["fileToUpload2"]["name2"]);
            } else {
                $msg2 =  "Sorry, there was an error uploading your file.";
            }
        }


        $data['Name'] = $_POST['Name'];
        $data['Password'] = $_POST['Password'];
        $data['Address'] = $_POST['Address'];
        $data['Email'] = $_POST['Email'];
        $data['Phone'] = $_POST['Phone'];
        $data['SalaryStart'] = $_POST['SalaryStart'];
        $data['SalaryEnd'] = $_POST['SalaryEnd'];

        $data['Verified'] = "false";


        $aa = 2;
        if ($counter > 7) {
            if (addTutor($data)) {
                echo 'Successfully added!!';
                header("Location: AfterRegTutor.php");
                exit();
            } else {
                echo 'You are not allowed to access this page.';
            }
        }
    }
    ?>

    <?php include 'header1.html'; ?>

    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">



        <table>
            <tr>
                <td>
                    Profile Picture
                </td>
                <td>
                    <img src=" ProPic/<?php echo $upload ?>" height="150px">
                    <br>
                    <input type="file" name="fileToUpload" />
                    <br>
                    <?php echo $msg; ?></span>
                    <br>


                </td>
            </tr>
            <br><br><br><br>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="text" name="Name" value=<?php echo $Name ?>>
                    <span class="error">* <?php echo $errName; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="Password" value=<?php echo $Password ?>>
                    <span class="error">* <?php echo $errPassword; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Location
                </td>
                <td>
                    <select name="Address">
                        <option name="Option">Choose Option</option>
                        <option name="Mirpur" <?php if ($Address == 'Mirpur') { ?>selected="true" <?php }; ?>>Mirpur</option>
                        <option name="Kuril" <?php if ($Address == 'Kuril') { ?>selected="true" <?php }; ?>>Kuril</option>
                    </select>
                    <span class="error">* <?php echo $errAddress; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" name="Email">
                    <span class="error">* <?php echo $errEmail; ?></span>
                </td>



            </tr>
            <br><br>
            <tr>
                <td>
                    Phone
                </td>
                <td>
                    +880
                    <input type="text" name="Phone" value=<?php echo $Phone ?>>
                    <span class="error">* <?php echo $errPhone; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Gender
                </td>
                <td>
                    <input type="radio" name="female" <?php echo (isset($_POST['female']) == 'checked') ?  'checked' : ''; ?>>Female
                    <input type="radio" name="male" <?php echo (isset($_POST['male']) == 'checked') ?  'checked' : ''; ?>>Male
                    <input type="radio" name="other" <?php echo (isset($_POST['other']) == 'checked') ?  'checked' : ''; ?>>Other
                    <span class="error">* <?php echo $errGender; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Interested Location
                </td>
                <td>
                    <select name="InterestedLocation" id="InterestedLocation">
                        <option name="Mirpur">Mirpur</option>
                        <option name="Kuril">Kuril</option>
                    </select>
                    <span class="error">* <?php echo $errInterestedLocation; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Interested Class
                </td>
                <td>
                    <input type="checkbox" name="class1to5" <?php echo (isset($_POST['class1to5']) == 'checked') ?  'checked' : ''; ?>>Class 1 - Class 5
                    <input type="checkbox" name="class6to8" <?php echo (isset($_POST['class6to8']) == 'checked') ?  'checked' : ''; ?>>Class 6 - Class 8
                    <input type="checkbox" name="class9to10" <?php echo (isset($_POST['class9to10']) == 'checked') ?  'checked' : ''; ?>>Class 9 - Class 10
                    <span class="error">* <?php echo $errInterestedClass; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Interested Subject
                </td>
                <td>
                    <input type="checkbox" name="Bangla" <?php echo (isset($_POST['Bangla']) == 'checked') ?  'checked' : ''; ?>>Bangla
                    <input type="checkbox" name="English" <?php echo (isset($_POST['English']) == 'checked') ?  'checked' : ''; ?>>English
                    <input type="checkbox" name="Chemistry" <?php echo (isset($_POST['Chemistry']) == 'checked') ?  'checked' : ''; ?>>Chemistry
                    <input type="checkbox" name="Physics" <?php echo (isset($_POST['Physics']) == 'checked') ?  'checked' : ''; ?>>Physics
                    <input type="checkbox" name="Math" <?php echo (isset($_POST['Math']) == 'checked') ?  'checked' : ''; ?>>Math
                    <input type="checkbox" name="Biology" <?php echo (isset($_POST['Biology']) == 'checked') ?  'checked' : ''; ?>>Biology
                    <span class="error">* <?php echo $errInterestedSubject; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Salary
                </td>
                <td>
                    <input type="text" name="SalaryStart" value=<?php echo $SalaryStart ?>> -
                    <input type="text" name="SalaryEnd" value=<?php echo $SalaryStart ?>>
                    <span class="error">* <?php echo $errSalary; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    University Name
                </td>
                <td>
                    <input type="text" name="UniversityName">
                    <span class="error">* <?php echo $errUniversityName; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    Upload CV
                </td>
                <td>
                    <input type="file" name="fileToUpload2" />
                    <br>
                    <?php echo $msg2; ?></span>
                    <br>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>
                    <br>
                    <br>
                    <!--<input type="submit" name="submit" value="Submit" class="submit"> -->

                </td>
            </tr>
        </table>
        <button type="submit" name="submit" value="submit" class="submit">Submit</button>
    </form>

</body>

</html>