<!DOCTYPE HTML>
<html>

<head>

    <style>
        #bb {
            display: block;
            border: 2px outset black;
            text-align: center;
            bottom: 100%;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;

        }
    </style>
</head>


<body>
    <br>
    <br>
    <span id="bb">
        <?php
        require_once './model.php';
        echo "<p>Copyright &copy; 2017";
        ?>
        <a class="Registration" href="#">About Us |</a>
        <a class="login" href="#">FAQ |</a>
        <a class="home" href="#">Contact Us</a>
    </span>
</body>

</html>