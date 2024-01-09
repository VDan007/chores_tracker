
<?php

    $status = $model->status;

    $array_of_options = ['not started','in progress','delay','done'];
    
    $array_of_options_without_current_status = array_filter($array_of_options, fn($value) => $value != $status );

    $array_to_display = array_merge([$model->status],$array_of_options_without_current_status);

?>
<div class=" flex items-start justify-around relative border-8 border-black my-4 pt-14 pb-8 rounded-md">
    <a class="bg-red-300 block border-4 border-black hover:bg-red-500 rounded-md  max-w-[150px] text-center p-1 absolute left-1 top-1" href="dashboard.php">back to dashboard</a>
    
        <form method="POST" class= "flex flex-col items-start gap-5 border-4 border-black rounded-md p-2 min-w-[300px] max-w-[400px] " >
            <h1 class="text-2xl block min-w-[100%] text-center">CHORE DETAILS</h1>
            <h3 class="text-2xl">TITLE:<br> <?= $model->title ?></h3>
            <h3 class="text-2xl">CREATION DATE:<br> <?= $model->creation_date ?> </h3>
            <h3 class="text-2xl">DUE DATE:<br> <?= $model->due_date ?> </h3>
            <label class="text-2xl flex flex-col" for="status"> STATUS:
                <select class="border-2 border-black rounded-md" name="status" id="status">
                    <?php foreach($array_to_display as $item) : ?>
                        <option value="<?= $item ?>"><?= $item ?></option>
                    <?php endforeach; ?>
                </select>
        
            </label>
            <input type="hidden" name="id" value="<?= $model->id ?>">
            <p class="text-2xl">DESCRIPTION: <?= $model->description ?>  </p>
            <input class="cursor-pointer border-2 border-black p-2 bg-green-300 rounded-md hover:bg-green-500" type="submit" value="SAVE CHANGES">
            <label class="flex text-2xl flex-col" for="comment">ADD A COMMENT:
                <textarea class="border-2 border-black pl-1 min-h-[150px] min-w-[280px] rounded-md" name="new_comment" type="textarea"></textarea>
            </label>
            <button type="submit" name="add_comment" class="cursor-pointer bg-yellow-300  p-2 border-2 border-black rounded-md hover:bg-yellow-500"> ADD COMMENT </button>
        </form>

    
        <div class="flex flex-col items-start gap-5 border-4 border-black rounded-md p-2  max-w-[400px] min-w-[300px]">
            <h2 class="text-2xl block min-w-[100%] text-center">Comments</h2>
        
            <div class="min-w-[100%]">
                <?php foreach($model2 as $comment) : ?>
                    <div class="border border-black rounded-md max-w-[100%] my-2 overflow-x-scroll pl-1">
                        <p>
                            <?= $comment->comment ?>
                        </p>
                        <p>Author: <?= $comment->writer ?></p>
                    </div>
                <?php endforeach ; ?>
            </div>
        
        </div>

</div>


