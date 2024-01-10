
<!-- CONTAINER START -->
<div class=" border-8 border-black mt-4 rounded-md"> 
 <!-- BUTTONS DIV START   -->
    <div class="flex">
        <a class="flex p-2 m-2 border-4 border-black items-center gap-4 bg-green-300 hover:bg-green-500 max-w-[220px] text-3xl rounded-md mb-2 group " href="create_chore.php">CREATE CHORE<span class="text-5xl">+</span>  </a>
        <button class="flex p-2 m-2 border-4 border-black items-center gap-4 bg-green-300 hover:bg-green-500 max-w-[220px] text-3xl rounded-md mb-2 group disabled:bg-gray-500" <?php if($model5 == false){echo 'disabled';} ?>  id="add_new_member_btn">ADD MEMBER <span class="text-5xl" >+</span></button>
        <button class="flex p-2 m-2 border-4 border-black items-center gap-4 bg-red-300 hover:bg-red-500 max-w-[220px] text-3xl rounded-md mb-2 group "  id="remove_member_btn">REMOVE MEMBER <span class="text-5xl" >-</span></button>
            
    </div>
<!-- GROUP MEMBERS DIV START -->
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
                <div class="m-2 border-2 border-black p-2 flex  flex-wrap">
                    <h3 class=" text-2xl">Members: </h3>
                    
                        <?php foreach($model2 as $item) : ?>
                            <div class="min-w-[80px] mx-2">
                                <p class="text-xl"> <?= $item  ?> </p>
        
                            </div>
                        <?php endforeach; ?>

                    
        
                </div>
                
            </div>
    </div>
    
           
    
           
</div>
<!-- ADD MEMBER DIALOG -->
<dialog id="add_member_dialog" class="border-4 border-black relative rounded-md">
    <button id="close_add_member_modal" class="absolute top-1 left-1 font-3xl border-2 border-black p-1 hover:bg-red-300 rounded-sm" >X</button>
    <form class="flex flex-col border border-green-300 items-end gap-3 p-3" method="POST">
        <label for="new_user_name">NAME:
            <input required class="border border-black pl-1 rounded-md" id="new_user_name" name="new_user_name" type="text">
        </label>
        <label for="new_user_email">E-MAIL:
             <input required id="new_user_email" name="new_user_email" class="border border-black pl-1 rounded-md" type="email">
        </label>
        <label for="new_user_password">PASSWORD:
            <input required name="new_user_password" id="new_user_password" class="border border-black pl-1 rounded-md" type="text">
        </label>
        <div class="flex justify-between items-center  min-w-[100%]">
            <label class="flex items-center" for="add_as_admin">ADMIN: 
                <input class="ml-1 border-2 border-black rounded-sm appearance-none w-4 h-4 checked:bg-green-500 cursor-pointer bg-white disabled:bg-gray-500" <?php if($model4 == false){echo 'disabled';} ?>  type="checkbox" value="add_as_admin"  name="add_as_admin" id="add_as_admin">
            </label>
            <input id="add_new_member_btn_submit" class="p-2 ; bg-green-300 cursor-pointer border-2 border-black hover:bg-green-500 rounded-md" type="submit" value="ADD +">
        </div>
        <input type="hidden" name="add_member">
    </form>

</dialog>
<!-- DELETE MEMBER DIALOG -->
<dialog id = "delete_member_dialog" class="border-4 border-black relative rounded-md">
    <button id="close_delete_member_modal" class="absolute top-1 left-1 font-3xl border-2 border-black p-1 hover:bg-red-300 rounded-sm" >X</button>
    <form class="flex flex-col border border-red-300 items-end gap-3 p-3" method="POST">
        <div class="min-w-[50px] min-h-[50px]"></div>
        <label for="user_email_to_remove">E-MAIL:
            <input required class="border-2 border-black rounded-md pl-1" id="user_email_to_remove" name="user_email_to_remove" type="email">
        </label>
        <div class="min-w-[40px] min-h-[30px]"></div>
        <input type="hidden" name="remove_member">
        <input id="remove_member_btn_submit" class="p-2  bg-red-300 cursor-pointer border-2 border-black hover:bg-red-500 rounded-md" type="submit" value="REMOVE -">
    </form>
</dialog>
   

<div class="border-8 border-black rounded-md mt-4 max-h-[500px] overflow-y-scroll mb-4"> 

    <h3 class="text-center my-5 text-3xl ">ALL CHORES</h3>
    
    <div class="mx-4 my-2 grid grid-rows-auto repeat(8,minmax(80px,1fr) gap-5 max-w-[1500px]">
                <!-- grid-col-8 -->
            <div class="col-start-1 "  >
                <h3 class="text-xl">TITLE</h3>
            </div>
    
            <div  class="col-start-2">
                <h3 class="text-xl">CREATOR</h3>
            </div>
    
            <div class="col-start-3">
                <h3 class="text-xl">CREATION DATE</h3>
            </div>
    
            <div class="col-start-4">
                <h3 class="text-xl">ASSIGNED TO</h3>
            </div>
    
            <div class="col-start-5">
                <h3 class="text-xl">DUE DATE</h3>
            </div>
    
            <div class="col-start-6">
                <h3 class="text-xl">STATUS</h3>
            </div>
    
            <div class="col-start-7">
                <h3 class="text-xl">DESCRIPTION</h3>
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
                    <a class="border-2 border-black bg-green-300 p-2 rounded-md hover:bg-green-500" href="edit_chore.php?id=<?php echo $model[$key]->id ?>">EDIT</a>
                   
                </div>
    
        <?php endforeach; ?>    
    </div>
</div>

<script>
    const add_new_member_btn = document.getElementById('add_new_member_btn');
    const add_new_member_btn_submit = document.getElementById('add_new_member_btn_submit');
    const add_member_dialog = document.getElementById('add_member_dialog');
    const close_add_member_modal = document.getElementById('close_add_member_modal');
    const close_delete_member_modal = document.getElementById('close_delete_member_modal');
    const delete_member_dialog = document.getElementById('delete_member_dialog');
    const remove_member_btn = document.getElementById('remove_member_btn');


    add_new_member_btn.addEventListener('click',() => openModal(add_member_dialog));
    close_add_member_modal.addEventListener('click',() => closeModal(add_member_dialog));
    add_new_member_btn_submit.addEventListener('click',() => closeModal(add_member_dialog));
    remove_member_btn.addEventListener('click',() => openModal(delete_member_dialog));
    close_delete_member_modal.addEventListener('click', () => closeModal(delete_member_dialog));


    function openModal(modal){
        modal.showModal();
    }
    function closeModal(modal){
        modal.close();
    }
    
</script>


<!-- //////////////////////////////////// -->
