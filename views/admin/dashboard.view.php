




<a class="flex p-2 justify-between items-center gap-4 bg-green-300 max-w-[180px] rounded-md" href="create_chore.php">create chore  <span class="text-6xl">  +</span>  </a>


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