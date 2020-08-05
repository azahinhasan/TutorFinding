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

        button {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
            padding: 12px 28px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 3px 1px;
            cursor: pointer;
            width: 300px;
        }
    </style>
</head>

<body>
    <?php
    require_once './model.php';
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
            session_start();
            $_SESSION["emailForUpdatePass"] = $_POST['Email'];
            $_SESSION["passForUpdatePass"] = $_POST['Password'];
            // header("Location: AfterRegTutor.php");
            if ($_POST['Type'] == "tutor") {
                header("Location: updatePass.php");
                exit();
            } elseif ($_POST['Type'] == "admin") {
                //header("Location: updatePass.php");
                exit();
            } elseif ($_POST['Type'] == "student") {
                //header("Location: updatePass.php");
                exit();
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
                        <option name="Tutor">tutor</option>
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
        <button type="submit" name="submit" value="submit" class="submit">Login</button>
    </form>

</body>
<?php include 'footer.php'; ?>

</html>