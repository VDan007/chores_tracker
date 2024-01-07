

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:667/school_project_chore_tracker/output.css">
</head>


<body class="flex flex-col min-h-screen px-2">
    <header class="flex justify-between items-center">

        <div>
            <a href="index.php">
                <img class="max-w-[150px]" src="http://localhost:667/school_project_chore_tracker/images/logo_placeholder.png" alt="logo placeholder image">

            </a>
        </div>
        <nav>
            <ul class="flex gap-4 pr-4">
                <?php echo  isset($_SESSION['user_logged_in']) ? '<li> <a href="http://localhost:667/school_project_chore_tracker/logout.php"> logout </a>  </li>' :'' ?>
                <li>about</li>
                <li>contact</li>
            </ul>
        </nav>

    </header>

    <div class="min-h-[70vh]" style="margin-bottom:60px">
        <?php

            require("$name.view.php");

        ?>

    </div>



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

