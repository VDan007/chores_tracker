

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
</head>


<body class="flex flex-col justify-between min-h-screen">
    <header class="flex justify-between items-center">

        <div>
            <img src="images/logo_placeholder.png" alt="logo placeholder image">
        </div>
        <nav>
            <ul class="flex gap-4 pr-4">
                <?php echo  isset($_SESSION['user_logged_in']) ? '<li> <a href="logout.php"> logout </a>  </li>' :'' ?>
                <li>about</li>
                <li>contact</li>
            </ul>
        </nav>

    </header>

    <?php

        require("$name.view.php");

    ?>



    <footer>
        <nav>
            <ul class="flex gap-4 pr-4 justify-end">
                <li>Terms of use</li>
                <li>Privacy Policy</li>
            </ul>
        </nav>
    </footer>
</body>


</html>

