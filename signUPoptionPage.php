<!DOCTYPE HTML>
<html>

<head>

    <style>
        #form {
            display: block;
            text-align: left;
            display: block;
            text-align: center;
            position: relative;
            left: 0;
            top: 0;
            font-size: 18px;
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

        .topnav a.registration {
            background-color: #008CBA;
            color: white;
        }

        #sign {
            color: #008CBA;

        }
    </style>
</head>

<?php include 'header1.html'; ?>

<body>
    <br>
    <br>
    <span id="form">

        <h2>Please Choose option as whom you wanna <b id="sign">Sign UP</b></h2>
        <a href="#"> <button class="button button2">Parent</button></a>
        <a href="tutor_registration .php"><button class="button button2">Tutor</button></a>
    </span>
</body>
<?php include 'footer.php'; ?>

</html>