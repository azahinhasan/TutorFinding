<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
            font-size: 15px;
        }

        #date {
            width: 27px;
        }


        #form {
            display: block;
            text-align: left;
            display: block;

            position: relative;
            left: 35%;
            top: 0;
            font-size: 18px;


        }

        .topnav a.login {
            background-color: #008CBA;
            color: white;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            width: 280px;
            border-radius: 10%;
        }


        .button2 {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
        }

        .button2:hover {
            background-color: #008CBA;
            color: white;
        }
    </style>
</head>

<body>
    <?php
    require_once './model_z.php';
    session_start();
    $Name = $Address = $ProfilePic = $Email = $Phone = $SalaryStart = $SalaryEnd = $Gender = $InterestedLocation = $InterestedClass = $InterestedSubject = $UniversityName = $Salary = $CV = $Certificate = $Password = "";
    $errName = $errAddress = $errProfilePic = $errEmail = $errPhone = $errGender = $errInterestedLocation = $errInterestedClass = $errInterestedSubject = $errUniversityName = $errSalary = $errCV = $errCertificate = $errPassword = "";
    $Class1to5 = $Class6to8 = $Class9to10 = $CV = "";
    $Bangla = $English = $Chemistry = $Physics = $Math =  $Biology =  $errMsg = "";
    $Verified = "false";
    $counter = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
            $Email = $_POST["Email"];
            $counter++;
        }


        $data['Password'] = $_POST['Password'];
        $data['Email'] = $_POST['Email'];
        $data['Type'] = $_POST['Type'];
        $data['Verified'] = "true";

        // if ($counter > 7) {
        if (showTutor($data) != null) {
            $_SESSION["emailForUpdatePass"] = $_POST['Email'];
            $_SESSION["passForUpdatePass"] = $_POST['Password'];

            if ($_POST['Type'] == "tutor") {
                header("Location:tazin/tutorHome.php");
                die;
            } elseif ($_POST['Type'] == "admin") {
            } elseif ($_POST['Type'] == "parent") {
            }
        } else {
            $errMsg = "Email or Password is Wrong or may be you are not Verified yet!";
        }
        //}
    }

    ?>

    <?php include 'header1.html'; ?>

    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>
                    Type
                </td>
                <td>
                    <select name="Type" id="Type">
                        <option name="Admin">admin</option>
                        <option name="Tutor">tutor</option>
                        <option name="Parent">parent</option>
                    </select>
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" name="Email" value=<?php echo $Email ?>>
                    <span class="error">* <?php echo $errEmail; ?></span>
                </td>

            </tr>
            <br><br>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" id="myInput" name="Password" value=<?php echo $Password ?>>
                    <span class="error">* <?php echo $errPassword; ?></span>
                </td>
            </tr>
            <br><br>
            <tr>
                <td>

                </td>
                <td>
                    <span style="font-size:15px"><input type="checkbox" onclick="myFunction()">Show Password</span>
                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                </td>
            </tr>
        </table>
        <br>

        <span class="error"><?php echo $errMsg; ?></span>
        <br>
        <br>
        <button type="submit" class="button button2" name="submit" value="submit" class="submit">Login</button>
    </form>

</body>
<?php include 'footer.php'; ?>

</html>