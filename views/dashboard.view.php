<?php
    $incomplite_chores = array_filter($model,fn($object)=>$object->status != 'done');
    $complete_chores = array_filter($model,fn($object)=>$object->status == 'done');
?>


<div class="border-8 border-black rounded-md mt-4 max-h-[500px] min-h-[300px] overflow-y-scroll">

    <h3 class="text-center my-5 text-3xl ">MY CHORES</h3>
    <div class="mx-4 my-2 grid grid-rows-auto repeat(7,minmax(80px,1fr) gap-5 max-w-[1500px]">
    
    
    
            <div class="col-start-1"  >
                <h3 class="text-xl">TITLE</h3>
            </div>
            <div class="col-start-2">
                <h3 class="text-xl">CREATOR</h3>
            </div>
            <div class="col-start-3">
                <h3 class="text-xl">CREATION DATE</h3>
            </div>
            <div class="col-start-4">
                <h3 class="text-xl">DUE DATE</h3>
            </div>
            <div class="col-start-5">
                <h3 class="text-xl">STATUS</h3>
            </div>
            <div class="col-start-6">
                <h3 class="text-xl">DESCRIPTION</h3>
            </div>
        
    
    
            <?php foreach ($incomplite_chores as $key=>$value) : ?>
                
                
                
                <div class="col-start-1">
                    <?= $incomplite_chores[$key]->title ?>
                </div>
                <div class="col-start-2">
                    <?= $incomplite_chores[$key]->creator ?>
                </div>
                <div class="col-start-3">
                    <?= $incomplite_chores[$key]->creation_date ?>
                </div>
                <div class="col-start-4">
                    <?= $incomplite_chores[$key]->due_date ?>
                </div>
                <div class="col-start-5">
                    <?= $incomplite_chores[$key]->status ?>
                </div>
                <div class="col-start-6">
                    <?= $incomplite_chores[$key]->description ?>
                </div>
                <div class="col-start-7">
                    <!-- $model[$key]->id  -->
                    <a class="bg-green-300 p-2 border-2 border-black hover:bg-green-500 rounded-md" href="details.php?id=<?php echo $incomplite_chores[$key]->id ?>">EDIT</a>
                    <a class="bg-red-300 border-2 border-black hover:bg-red-500 rounded-md  p-2" href="dashboard.php?action=quick_done&id=<?php echo $incomplite_chores[$key]->id; ?>&status=done" >DONE</a>
                </div>
            
            
            
            <?php endforeach; ?>
       
    
    </div>

</div>


<div class="border-8 border-black rounded-md my-4 max-h-[500px] min-h-[300px] overflow-y-scroll">
    <h2 class="text-center my-5 text-3xl ">DONE CHORES</h2>
    <div class="mx-4 my-2 grid grid-rows-auto repeat(7,minmax(80px,1fr) gap-5 max-w-[1500px]">
    
        <?php foreach ($complete_chores as $key=>$value) : ?>
            
            
            
            <div class="col-start-1 ">
                <?= $complete_chores[$key]->title ?>
            </div>
            <div class="col-start-2 ">
                <?= $complete_chores[$key]->creator ?>
            </div>
            <div class="col-start-3 ">
                <?= $complete_chores[$key]->creation_date ?>
            </div>
            <div class="col-start-4 ">
                <?= $complete_chores[$key]->due_date ?>
            </div>
            <div class="col-start-5 ">
                <?= $complete_chores[$key]->status ?>
            </div>
            <div class="col-start-6 ">
                <?= $complete_chores[$key]->description ?>
            </div>
            <div class="col-start-7">
                <!-- $model[$key]->id  -->
                <a class="bg-green-300 hover:bg-green-500 border-2 border-black rounded-md p-2" href="details.php?id=<?php echo $complete_chores[$key]->id ?>">EDIT</a>
               
            </div>
        
        
        
        <?php endforeach; ?>
    
    
    </div>


</div>



        
