




<a class="flex p-2 justify-between items-center gap-4 bg-green-300 max-w-[180px] rounded-md mb-2 group " href="create_chore.php">create chore  <span class="text-6xl group-hover:animate-bounce">  +</span>  </a>
<div class="flex items-center gap-2 ">
    <div class="border-2 border-green-300 w-[180px] p-2 rounded-md">
        <h2 class="mb-2">Group members:</h2>
        <h3 class="mb-1">Admins:</h3>
        <?php foreach($model3 as $item) : ?>
            <p> <?= $item  ?> </p>
        <?php endforeach; ?>
        <h3 class="mb-1">Members:</h3>
        <?php foreach($model2 as $item) : ?>
            <p> <?= $item  ?> </p>
        <?php endforeach; ?>
    </div>
    <div class="flex flex-col gap-4">
        <div class="border-2 border-green-300 rounded-md p-2">
            <button id="add_new_member_btn">Add member <span>+</span></button>
        </div>    
    
        <div class="border-2 border-red-300 rounded-md p-2">
            <button id="remove_member_btn">Remove member <span>-</span></button>
        </div>     
    </div>
    <div id="add_new_member_div">
            <form class="flex flex-col border border-green-300 items-end gap-3 p-3" method="POST">
                <label for="new_user_name">Name
                    <input required class="border" id="new_user_name" name="new_user_name" type="text">
                </label>
                <label for="new_user_email">E-mail
                    <input required id="new_user_email" name="new_user_email" class="border" type="email">
                </label>
                <label for="new_user_password">Password
                    <input required name="new_user_password" id="new_user_password" class="border" type="text">
                </label>
                <input id="add_new_member_btn_submit" class="p-2 bg-green-300 cursor-pointer" type="submit" value="Add +">
                <input type="hidden" name="add_member">
            </form>
    </div>
    <div id="remove_member_div">
            <form class="flex flex-col border border-red-300 items-end gap-3 p-3" method="POST">
                <label for="user_email_to_remove">E-mail
                    <input required class="border" id="user_email_to_remove" name="user_email_to_remove" type="email">
                </label>
                <input type="hidden" name="remove_member">
                <input id="remove_member_btn_submit" class="p-2 bg-red-300 cursor-pointer" type="submit" value="Remove -">
            </form>
    </div>
</div>

<h3 class="text-center my-5 text-3xl ">All chores</h3>

<div class=" grid grid-rows-auto grid-cols-8 gap-5">

        <div class="col-start-1"  >
            <h3>Title</h3>
        </div>

        <div  class="col-start-2">
            <h3>Creator</h3>
        </div>

        <div class="col-start-3">
            <h3>Creation date</h3>
        </div>

        <div class="col-start-4">
            <h3>Assigned to</h3>
        </div>

        <div class="col-start-5">
            <h3>Due date</h3>
        </div>

        <div class="col-start-6">
            <h3>Status</h3>
        </div>

        <div class="col-start-7">
            <h3>Description</h3>
        </div>

        <div class="col-start-8">
           

        </div>

    <?php foreach($model as $key => $value) : ?>
            <div class="col-start-1 ">
                <?= $model[$key]->title ?>
            </div>
            <div class="col-start-2 ">
                <?= $model[$key]->creator ?>
            </div>
            <div class="col-start-3 ">
                <?= $model[$key]->creation_date ?>
            </div>
            <div class="col-start-4 ">
                <?= $model[$key]->assigned_to ?>
            </div>
            <div class="col-start-5 ">
                <?= $model[$key]->due_date ?>
            </div>
            <div class="col-start-6 ">
                <?= $model[$key]->status ?>
            </div>

            <div class="col-start-7 ">
                <?= $model[$key]->description ?>
            </div>
            
            <div class="col-start-8">
                <!-- $model[$key]->id  -->
                <a class="bg-green-300 p-2" href="edit_chore.php?id=<?php echo $model[$key]->id ?>">Edit</a>
               
            </div>

    <?php endforeach; ?>    
</div>

<script>
    const add_new_member_div = document.getElementById('add_new_member_div');
    const add_new_member_btn = document.getElementById('add_new_member_btn');
    const add_new_member_btn_submit = document.getElementById('add_new_member_btn_submit');
    const remove_member_div = document.getElementById('remove_member_div');
    const remove_member_btn = document.getElementById('remove_member_btn');
    const remove_member_btn_submit = document.getElementById('remove_member_btn_submit');

    function toggle_show_hide_elements(element){
        if(element.style.display == 'none'){
            element.style.display = 'flex';
        }else{
            element.style.display = 'none';
        }


    //    if(element.classList.contains('hidden')){
    //     element.classList.remove('hidden');
    //     element.classList.add('flex');
    //    }else{
    //     element.classList.remove('flex');
    //     element.classList.add('hidden');
    //    }
    }

    toggle_show_hide_elements(add_new_member_div);
    toggle_show_hide_elements(remove_member_div);

    add_new_member_btn.addEventListener('click',()=>toggle_show_hide_elements(add_new_member_div));
   // add_new_member_btn_submit.addEventListener('click',()=>toggle_show_hide_elements(add_new_member_div));
    remove_member_btn.addEventListener('click',()=>toggle_show_hide_elements(remove_member_div));
    //remove_member_btn_submit.addEventListener('click',()=>toggle_show_hide_elements(remove_member_div));
</script>