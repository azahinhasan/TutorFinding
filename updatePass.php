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
            display: block;
            text-align: left;
            display: block;

            position: relative;
            left: 35%;
            top: 0;
            font-size: 18px;


        }
    </style>
</head>

<body>
    <?php
    require_once './model_z.php';
    //require_once './LoginTutor.php';
    session_start();
    $cPassword = $nPassword = $rPassword =  $cPasswordErr = $nPasswordErr = $rPasswordErr = "";
    $couner = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["cPassword"])) {
            $cPasswordErr = "cPassword is required";
        } else {
            $cPassword = $_POST["cPassword"];
            $couner++;
        }
        if (empty($_POST["nPassword"])) {
            $nPasswordErr = "nPassword is required";
        } else {
            if ($_POST["cPassword"] == $_POST["nPassword"]) {
                $nPasswordErr = "New Password should not be same as the Current Password";
            } else {
                $nPassword = $_POST["nPassword"];
                $couner++;
            }
        }
        if (empty($_POST["rPassword"])) {
            $rPasswordErr = "rPasswordErr is required";
        } else {
            if ($_POST["rPassword"] <> $_POST["nPassword"]) {
                $rPasswordErr = "New Password not match with the Retyped Password";
            } else {
                $rPassword = $_POST["rPassword"];
                $couner++;
            }
        }
    }
    if ($couner == 3) {
        $data1['Password'] = $_POST["nPassword"];
        $cPasswordErr = $_SESSION["emailForUpdatePass"];
        if ($_SESSION["passForUpdatePass"] == $_POST["cPassword"]) {

            if (checkPass($data1) == null) {
                if ($_POST["rPassword"] == $_POST["nPassword"]) {
                    $data['Password'] = $_POST["nPassword"];
                    $data['Email'] = $_SESSION["emailForUpdatePass"];
                    if (updatePass($data)) {
                        echo 'Successfully Update!!';
                    } else {
                        echo 'You are not allowed to access this page.';
                    }
                }
            }
        } else {
            //$cPasswordErr = "Wrong Password";
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <?php include "headerTutorHome.html"; ?>
    <dev class="main">
        <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table>
                <tr>
                    <td>
                        Current Password:
                    </td>
                    <td>
                        <input type="password" name="cPassword" value=<?php echo $cPassword ?>>
                        <span class="error">* <?php echo $cPasswordErr; ?></span>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>
                        New Password:
                    </td>
                    <td>
                        <input type="password" name="nPassword" value=<?php echo $nPassword ?>>
                        <span class="error">* <?php echo $nPasswordErr; ?></span>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>
                        Retype New Password:
                    </td>
                    <td>
                        <input type="password" name="rPassword" value=<?php echo $rPassword ?>>
                        <span class="error">* <?php echo $rPasswordErr; ?></span>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </dev>
</body>
<?php include "footer.php"; ?>

</html>