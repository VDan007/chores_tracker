

<div class="border-8 border-black rounded-md">
    <h1 class="text-3xl text-center">SETUP</h1>
    <p class="text-2xl text-center">TO SET UP DATABASE PLEASE MAKE A NEW ONE IN MYSQL,</p> 
    <p class="text-2xl text-center"> TAKE A LOOK AT APP/CONFIG AND MODIFY AS NEEDED. </p> 
    <p class="text-2xl text-center"> TO SET UP DATABASE TABLES PRESS THE BUTTON. </p> 
    <form class="flex justify-center " action="" method="POST">
        <input class="block min-h-[120px] min-w-[120px] border launch bg-contain rounded-md cursor-pointer" value="" type="submit" name="launch">
    </form>
    <?php
         if(isset($view_bag['db_setup_result'])){
              echo $view_bag['db_setup_result'];} 
    ?>
</div>



<style>
    .launch{
        background-image: url('/school_project_chore_tracker/images/fire.jpeg');
        
    }
    
</style>