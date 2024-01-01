

<h1>LOGIN</h1>
<form action="" method="POST" class="">
    <label for="email">username</label>
    <input id="email" type="text" name="email" class="border">
    <label for="password">password</label>
    <input id="password" type="password" name="password" class="border">
    <input type="submit" value="Login" class="border p-2 bg-red-300 cursor-pointer">
</form>

<?php
    if(isset($view_bag['status'])){
        echo $view_bag['status'];
    }
?>

