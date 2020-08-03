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


        .f {

            font-size: 20px;
            display: block;
            border: #FF0000;
            left: 50%;
            color: black;
        }

        .topnav a.login {
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


        $data['Password'] = $_POST['Password'];
        $data['Email'] = $_POST['Email'];
        $data['Type'] = $_POST['Type'];


        $aa = 2;
        // if ($counter > 7) {
        if (showTutor($data) != null) {
            header("Location: AfterRegTutor.php");
            exit();
        } else {
            echo 'You are not allowed to access this page.';
        }
        //}
    }
    ?>

    <?php include 'header1.html'; ?>

    <form id="f" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <table>
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


        </table>
        <button type="submit" name="submit" value="submit" class="submit">Login</button>
    </form>
    <?php include 'footer.php'; ?>
</body>

</html>