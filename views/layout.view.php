

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/school_project_chore_tracker/output.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

<body class="flex flex-col justify-between min-h-screen">
    <header class="flex justify-between items-center border-black border-8 rounded-md">

        <div>
            <a href="index.php">
                <img class="max-w-[150px] hover:border-8 border-black " src="/school_project_chore_tracker/images/logo_placeholder.png" alt="logo placeholder image">

            </a>
        </div>
        <nav>
            <ul class="flex gap-4 pr-4 text-3xl">
                <?php echo  isset($_SESSION['user_logged_in']) ? '<li> <a class="hover:border-4 border-black rounded-md p-2" href="/school_project_chore_tracker/logout.php"> LOGOUT </a>  </li>' :'' ?>
                <li><a class="hover:border-4 border-black rounded-md p-2" href="h"> ABOUT </a></li>
                <li><a class="hover:border-4 border-black rounded-md p-2" href="h"> CONTACT </a></li>
            </ul>
        </nav>

    </header>

    <div class="relative "  >
        <?php

            require("$name.view.php");

        ?>

    </div>



    <footer class="border-8 border-black rounded-md">
        <nav class="flex justify-between items-center">
            <ul class=" p-4 justify-end text-3xl">
                <li> <a class="hover:border-4 border-black rounded-md p-1"  href="setup.php">SETUP</a> </li>
            </ul>
            <ul class="flex gap-4 p-4 justify-end text-3xl">
                <li><a class="hover:border-4 border-black rounded-md p-1" href="h"> TERMS OF USE </a></li>
                <li><a class="hover:border-4 border-black rounded-md p-1" href="h"> PRIVACY POLICY </a></li>
            </ul>
        </nav>
    </footer>
</body>


</html>

