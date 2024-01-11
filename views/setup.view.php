

<div class="border-8 border-black rounded-md">
    <h1 class="text-3xl text-center">SETUP</h1>
    <p class="text-2xl text-center">TO SET UP DATABASE PLEASE MAKE A NEW ONE IN MYSQL,</p> 
    <p class="text-2xl text-center"> TAKE A LOOK AT APP/CONFIG AND MODIFY AS NEEDED. </p> 
    <p class="text-2xl text-center"> TO SET UP DATABASE TABLES PRESS THE BUTTON. </p> 
    <form id="form" class="flex flex-col items-center " action="" method="POST">
        <input id="launch" class="hover:border-red-500 border-4 border-black  block min-h-[120px] min-w-[120px]  launch bg-contain rounded-md cursor-pointer mb-2" value="" type="submit" name="launch">
        <?php
            if(isset($view_bag['db_setup_result'])){
                echo '<p class="text-2xl">' . htmlspecialchars($view_bag['db_setup_result']) . '</p>';
                } 
                    
            
            ?>  
    </form>
</div>

<dialog id='explosion' class="border-4 border-black rounded-md ">
    <img src="/chores_tracker/images/bomb.gif" class="min-w-[400px] min-h-[400px]" alt="">
</dialog>

            <?php 
            
                
            ?>

<style>
    .launch{
        background-image: url('/chores_tracker/images/fire.jpeg');
        
    }
    
</style>

<script defer>

  

        const bomb = document.getElementById('explosion');
        

    
        function openModal_bomb(modal){
            
            modal.showModal();
            setTimeout(()=>{closeModal(bomb)},3000);
            
        }
            
        function closeModal(modal){
            modal.close();
        }
        let go = <?= isset($_POST['launch']) ? true : false  ?> ;
        if(go){
            openModal_bomb(bomb);

        }
    
   


</script>


