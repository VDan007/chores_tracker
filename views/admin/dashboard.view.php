
<!-- CONTAINER START -->
<div class=" border-8 border-black mt-4"> 
 <!-- BUTTONS DIV START   -->
 <div class="flex">
    <a class="flex p-2 m-2 border-4 border-black items-center gap-4 bg-green-300 hover:bg-green-500 max-w-[220px] text-3xl rounded-md mb-2 group " href="create_chore.php">CREATE CHORE<span class="text-5xl">+</span>  </a>
    <button class="flex p-2 m-2 border-4 border-black items-center gap-4 bg-green-300 hover:bg-green-500 max-w-[220px] text-3xl rounded-md mb-2 group"  id="add_new_member_btn">ADD MEMBER <span class="text-5xl" >+</span></button>
    <button class="flex p-2 m-2 border-4 border-black items-center gap-4 bg-red-300 hover:bg-red-500 max-w-[220px] text-3xl rounded-md mb-2 group "  id="remove_member_btn">REMOVE MEMBER <span class="text-5xl" >-</span></button>
        
 </div>

<div class="flex gap-2 border-4 border-black rounded-md m-2 relative">

        <h2 class="m-2 static top-0 left-0 text-2xl">Group members:</h2>
        <div class=" overflow-hidden flex">
            <div class="m-2 border-2 border-black p-2 flex flex-col ">
                <h3 class=" text-2xl">Admins:</h3>
                <?php foreach($model3 as $item) : ?>
                    <div class="">
                        <p class="text-xl"> <?= $item  ?> </p>

                    </div>
                <?php endforeach; ?>
    
            </div>
            <div class="m-2 border-2 border-black p-2 flex flex-wrap">
                <h3 class=" text-2xl">Members: </h3>
                
                    <?php foreach($model2 as $item) : ?>
                        <div class="min-w-[120px] mx-2">
                            <p class="text-xl"> <?= $item  ?> </p>
    
                        </div>
                    <?php endforeach; ?>

                
    
            </div>
            
        </div>
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
</div>
<div class=""> 

    <h3 class="text-center my-5 text-3xl ">All chores</h3>
    
    <div class=" grid grid-rows-auto repeat(8,minmax(80px,1fr) overflow-x-scroll md:overflow-x-hidden overflow-y-hidden custom gap-5 max-w-[1500px]">
                <!-- grid-col-8 -->
            <div class="col-start-1 "  >
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
                <div class="col-start-1  ">
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


<!-- //////////////////////////////////// -->
