


<div>
<h1>Sign Up</h1>
<form action="" method='POST' class="flex flex-col">

<label for="name">Name
    <input class="border" id="name" name="name" type="text" placeholder="Your name goes here">
</label>

<label for="email">E-mail
    <input type="email" class="border" name="email" id="email" placeholder="Your email goes here">
</label>

<label for="password">Your password
    <input type="password" name="password" id="password" class="border">
</label>

<label for="password_again">Your password again
    <input type="password" class="border" name="passord_again" id="password_again">
</label>



<label for="join"> Join
    <input type="radio" name="create_or_join" checked="true" value="join" id="join">
</label>
<label for="create"> Create
    <input type="radio" name="create_or_join" value="create" id="create">
</label>

<label for="group">Group name
    <input type="text" name="group" id="group" class="border" placeholder="name">
</label>

<label for="group_password">Group password
    <input class="border" type="password" id="group_password" name="group_password">
</label>

<label id="label_for_group_password_again" for="group_password_again">Group password again
    <input class="border" type="password" id="group_password_again" name="group_password_again">
</label>

</form>

</div>

<script defer>
    const join = document.getElementById('join');
    const create = document.getElementById('create');
    const labelForGroupPasswordAgain = document.getElementById('label_for_group_password_again');
    join.addEventListener('change',toggleVisibility);
    create.addEventListener('change',toggleVisibility);
    toggleVisibility();
    
    

    function toggleVisibility(){
       // console.log('works');
      join.checked  ? labelForGroupPasswordAgain.style.display = 'none' : labelForGroupPasswordAgain.style.display = 'inline';
    }
</script>