


<div class="flex flex-col justify-center items-center" >

<h1 class="text-3xl">SIGN UP</h1>

<form action="" method='POST' class="flex flex-col gap-2 mt-2">

<label class="flex flex-col text-2xl" for="name">NAME:
    <input required class="border-2 border-black pl-2" id="name" name="name" type="text" placeholder="Your name goes here">
</label>

<label class="flex flex-col text-2xl" for="email">E-MAIL:
    <input required type="email" class="border-2 border-black pl-2" name="email" id="email" placeholder="Your email goes here">
</label>

<label class="flex flex-col text-2xl" for="password">YOUR PASSWORD:
    <input required type="password" name="password" id="password" class="border-2 border-black pl-2">
</label>

<label class="flex flex-col text-2xl" for="password_again">YOUR PASSWORD AGAIN:
    <input required type="password" class="border-2 border-black pl-2" name="password_again" id="password_again">
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

<input class="p-2 bg-green-300 cursor-pointer rounded-md border-2 border-black hover:bg-green-500" type="submit" value="SUBMIT">

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