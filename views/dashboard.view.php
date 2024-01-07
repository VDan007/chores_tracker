<?php
    $incomplite_chores = array_filter($model,fn($object)=>$object->status != 'done');
    $complete_chores = array_filter($model,fn($object)=>$object->status == 'done');
?>


<div class=" grid grid-rows-auto grid-cols-7 gap-6">



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
            <h3>Due date</h3>
        </div>
        <div class="col-start-5">
            <h3>Status</h3>
        </div>
        <div class="col-start-6">
            <h3>Description</h3>
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
                <a class="bg-green-300 p-2" href="details.php?id=<?php echo $incomplite_chores[$key]->id ?>">Edit</a>
                <a class="bg-red-300  p-2" href="dashboard.php?action=quick_done&id=<?php echo $incomplite_chores[$key]->id; ?>&status=done" >Done</a>
            </div>
        
        
        
        <?php endforeach; ?>
   

</div>





    <h2 class="block text-center my-12 bg-gray-300 py-2">Done chores</h2>
    <div class=" grid grid-rows-auto grid-cols-7 gap-6">
    
        <?php foreach ($complete_chores as $key=>$value) : ?>
            
            
            
            <div class="col-start-1 text-gray-200">
                <?= $complete_chores[$key]->title ?>
            </div>
            <div class="col-start-2 text-gray-200">
                <?= $complete_chores[$key]->creator ?>
            </div>
            <div class="col-start-3 text-gray-200">
                <?= $complete_chores[$key]->creation_date ?>
            </div>
            <div class="col-start-4 text-gray-200">
                <?= $complete_chores[$key]->due_date ?>
            </div>
            <div class="col-start-5 text-gray-200">
                <?= $complete_chores[$key]->status ?>
            </div>
            <div class="col-start-6 text-gray-200">
                <?= $complete_chores[$key]->description ?>
            </div>
            <div class="col-start-7">
                <!-- $model[$key]->id  -->
                <a class="bg-green-300 p-2" href="details.php?id=<?php echo $complete_chores[$key]->id ?>">Edit</a>
               
            </div>
        
        
        
        <?php endforeach; ?>
   

        </div>

        
