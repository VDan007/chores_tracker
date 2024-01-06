


<div class="flex flex-col justify-center items-center" >

<h1>Sign Up</h1>

<form action="" method='POST' class="flex flex-col gap-4 mt-2">

<label for="name">Name
    <input required class="border" id="name" name="name" type="text" placeholder="Your name goes here">
</label>

<label for="email">E-mail
    <input required type="email" class="border" name="email" id="email" placeholder="Your email goes here">
</label>

<label for="password">Your password
    <input required type="password" name="password" id="password" class="border">
</label>

<label for="password_again">Your password again
    <input required type="password" class="border" name="password_again" id="password_again">
</label>



<!-- <label for="join"> Join
    <input type="radio" name="create_or_join" checked="true" value="join" id="join">
</label> -->
<!-- <label for="create"> Create
    <input type="radio" name="create_or_join" value="create" id="create">
</label> -->

<!-- <label for="group">Group name
    <input type="text" name="group" id="group" class="border" placeholder="name">
</label> -->

<!-- <label id="label_for_group_id" for="group_id">Group id
    <input class="border" name="group_id" id="group_id" type="text">
</label> -->

<!-- <label for="group_password">Group password
    <input class="border" type="password" id="group_password" name="group_password">
</label> -->

<!-- <label id="label_for_group_password_again" for="group_password_again">Group password again
    <input class="border" type="password" id="group_password_again" name="group_password_again">
</label> -->

<input class="p-3 bg-green-300 cursor-pointer rounded-md" type="submit" value="Submit">

</form>

<?php
    if($view_bag){
        echo $view_bag;
    }
?>

</div>

<!-- <script defer>

    const join = document.getElementById('join');
    const create = document.getElementById('create');
    const labelForGroupPasswordAgain = document.getElementById('label_for_group_password_again');
    const groupId = document.getElementById('label_for_group_id');
    join.addEventListener('change',toggleVisibility);
    create.addEventListener('change',toggleVisibility);
    toggleVisibility();
    
    

    function toggleVisibility(){
       // console.log('works');
      join.checked  ? (labelForGroupPasswordAgain.style.display = 'none' , groupId.style.display = 'inline') : (labelForGroupPasswordAgain.style.display = 'inline' , groupId.style.display = 'none');
    }
</script> -->