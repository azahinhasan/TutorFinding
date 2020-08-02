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

    $Name = $Address = $ProfilePic = $Email = $Phone = $SalaryStart = $SalaryEnd = $Gender = $InterestedLocation = $InterestedClass = $InterestedSubject = $UniversityName = $Salary = $CV = $Certificate = $Password = "";
    $errName = $errAddress = $errProfilePic = $errEmail = $errPhone = $errGender = $errInterestedLocation = $errInterestedClass = $errInterestedSubject = $errUniversityName = $errSalary = $errCV = $errCertificate = $errPassword = "";
    $Class1 = $Class6 = $Class9 = "";
    $Bangla = $English = $Chemistry = $Physics = $Math =  $Biology = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["Name"])) {
            $errName = "Name is required";
        } else {
            $Name = $_POST["Name"];
        }
        if (empty($_POST["Password"])) {
            $errPassword = "Password is required";
        } else {
            $Password = $_POST["Password"];
        }

        if (empty($_POST["Email"])) {
            $errEmail = "Email is required";
        } else {
            $email = test_input($_POST["Email"]);
            if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                $errEmail = "Invalid email format";
            }
        }

        if (empty($_POST["Address"]) || $_POST["Address"] == 'Option') {
            $errAddress = "Address is required";
        } else {
            $Address = test_input($_POST["Address"]);
        }

        if (empty($_POST["Phone"])) {
            $errPhone = "Phone is required";
        } else {
            $Phone = $_POST["Phone"];
        }

        if (empty($_POST["female"]) && empty($_POST["male"]) && empty($_POST["other"])) {
            $errGender = "Gender is required";
        } else {
            if (!empty($_POST["female"])) {
                $Gender = "Female";
            } elseif (!empty($_POST["male"])) {
                $Gender = "Male";
            } elseif (!empty($_POST["other"])) {
                $Gender = "Other";
            }
        }

        if (empty($_POST["Bangla"]) && empty($_POST["English"]) && empty($_POST["Chemistry"]) && empty($_POST["Physics"]) && empty($_POST["Math"]) && empty($_POST["Biology"])) {
            $errInterestedSubject = "Interested Subject is required";
        } else {
            if (!empty($_POST["Bangla"])) {
                $Bangla = "yes";
            }
            if (!empty($_POST["English"])) {
                $English = "yes";
            }
            if (!empty($_POST["Chemistry"])) {
                $Chemistry = "yes";
            }

            if (!empty($_POST["Physics"])) {
                $Physics = "yes";
            }
            if (!empty($_POST["Math"])) {
                $Math = "yes";
            }
            if (!empty($_POST["Biology"])) {
                $Biology = "yes";
            }
        }

        if (empty($_POST["InterestedLocation"])) {
            $errInterestedLocation = "Interested Location is required";
        }

        if (empty($_POST["class1"]) && empty($_POST["class6"]) && empty($_POST["class9"])) {
            $errInterestedClass = "Class is required";
        } else {
            if (!empty($_POST["class1"])) {
                $Class1 = "yes";
            }
            if (!empty($_POST["class6"])) {
                $Class6 = "yes";
            }
            if (!empty($_POST["class9"])) {
                $Class9 = "yes";
            }
        }

        if (empty($_POST["SalaryStart"]) && empty($_POST["SalaryEnd"])) {
            $errSalary = "both Salary is required";
        } elseif ($_POST["SalaryStart"] > $_POST["SalaryEnd"]) {
            $errSalary = " Start Salary should me less then End Salary";
        } else {
            $SalaryStart = $_POST["SalaryStart"];
            $SalaryEnd = $_POST["SalaryEnd"];
        }
    }


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Profile Pic--------------------------------------------------------------

    $target_dir = "ProPic/";
    $fileToUpload = "img.png";
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
            //$msg = $fileToUpload;
            $upload = basename($_FILES["fileToUpload"]["name"]);
        } else {
            $msg =  "Sorry, there was an error uploading your file.";
        }
    }

    //--------------------------OtherFile

    $target_dir2 = "ProPic/";
    $fileToUpload2 = "img.png";
    $target_file2 = $target_dir2 . basename($_FILES["fileToUpload2"]["name"]);
    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_dir2, PATHINFO_EXTENSION));
    $msg2 = "";

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
        if ($check !== false) {
            $msg2 =  "File is an image - " . $check["mime"] . ".";
            $uploadOk2 = 1;
        } else {
            $msg2 =  "File is not an image.";
            $uploadOk2 = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload2"]["size"] > 5000000) {
        $msg2 =  "Sorry, your file is too large.";
        $uploadOk2 = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
        && $imageFileType2 != "gif"
    ) {
        $msg2 =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk2 = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    $upload = "img.png";
    if ($uploadOk2 == 0) {
        $msg2 =  "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_dir2)) {
            $msg2 =  "The file " . basename($_FILES["fileToUpload2"]["name"]) . " has been uploaded.";
            //$msg = $fileToUpload2;
            $upload = basename($_FILES["fileToUpload2"]["name"]);
        } else {
            $msg2 =  "Sorry, there was an error uploading your file.";
        }
    }
    ?>

    <?php include 'header1.html'; ?>
    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <table>
            --------Register----------
            <tr>
                <td>
                    Profile Picture
                </td>
                <td>
                    <form action="" class="proPic" method="POST" enctype="multipart/form-data">

                        <img src="ProPic/<?php echo $upload ?>" height="150px">

                        <input type="file" name="fileToUpload" value="img.png">
                        <br>
                        <?php echo $msg; ?></span>
                        <br>
                        <input type="submit" value="Upload">
                    </form>
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
                    <select name="Address" id="Address">
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
                    <input type="checkbox" name="class1" <?php echo (isset($_POST['class1']) == 'checked') ?  'checked' : ''; ?>>Class 1 - Class 5
                    <input type="checkbox" name="class6" <?php echo (isset($_POST['class6']) == 'checked') ?  'checked' : ''; ?>>Class 6 - Class 8
                    <input type="checkbox" name="class9" <?php echo (isset($_POST['class9']) == 'checked') ?  'checked' : ''; ?>>Class 9 - Class 10
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
                    <br>
                    <br>
                    <input type="file" name="fileToUpload2">
                    <br>
                    <?php echo $msg2; ?></span>
                    <br>
                    <input type="submit" value="Upload">
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
        <button type="submit" name="submit" value="Submit" class="submit">Submit</button>
    </form>


</body>

</html>