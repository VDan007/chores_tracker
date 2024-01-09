
<div class="flex items-start justify-around relative border-8 border-black mt-4 pt-14 pb-8 rounded-md">

    <a class="bg-red-300 block border-4 border-black hover:bg-red-500 rounded-md  max-w-[150px] text-center p-1 absolute left-1 top-1" href="index.php"> <- BACK TO DASHBOARD</a>

    <form method="POST" class="flex flex-col items-start gap-5 border-4 border-black rounded-md p-2 min-w-[300px] max-w-[400px] ">
        <h2 class="text-center  block min-w-[100%] text-2xl">CHORE DETAILS</h2>
        <label for="title" class="text-2xl flex flex-col">TITLE: 
            <input class="border border-black pl-1 rounded-md " name="title" type="text" value="<?= $model->title ?>">
        </label>
    
        <h3 class="text-2xl">CREATION DATE:<br> <?= $model->creation_date ?> </h3>

        <label for="assigned_to" class="text-2xl flex flex-col">ASSIGNED TO
            
            <select class="border border-black rounded-md" name="assigned_to" id="assigned_to">
                <?php foreach($model3 as $item) : ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    
        <label for="due_date" class="text-2xl flex flex-col">DUE DATE:
            <input class="border border-black rounded-md" id="due_date"  name="due_date" type="date" value="<?= $model->due_date?>">
        </label>
    
        <label  for="status" class="text-2xl flex flex-col"> STATUS:
            <select name="status" id="status" class="border border-black rounded-md">
                <?php foreach($model2 as $item) : ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <input type="hidden" name="id" value="<?= $model->id ?>">
        
        <label class="flex flex-col gap-1 text-2xl" for="description">DESCRIPTION:
            <textarea class="border border-black rounded-md min-h-[150px] min-w-[280px] text-left p-1" name="description" id="description" type="text" value=""><?= $model->description ?></textarea>
        </label>
        
        <input type="hidden" name="id" value="<?= $model->id ?>">

        <div class="flex justify-between  min-w-[100%]">
            <button class="cursor-pointer  bg-green-300 hover:bg-green-500 border-2 border-black p-1 rounded-md" type="submit" name="save" > SAVE CHANGES</button>
            <button class="text-white cursor-pointer border-2 border-black rounded-md hover:border-red-500 hover:border-2 hover:text-red-500 bg-black p-1" type="submit" name="delete"> DELETE CHORE </button>
        </div>
            
        <label class="flex flex-col text-2xl" for="comment">COMMENT:
            <textarea class="border border-black min-h-[150px] min-w-[280px] rounded-md pl-1" name="new_comment" type="textarea"></textarea>
        </label>
        <button type="submit" name="add_comment" class="cursor-pointer bg-yellow-300 border-2 border-black p-1 rounded-md hover:bg-yellow-500"> ADD COMMENT </button>
    </form>

    <!-- COMMENTS -->
    <div class="flex flex-col items-center border-4 border-black rounded-md p-2 min-w-[300px] max-w-[400px]">
        <h2 class="text-2xl">COMMENTS</h2>
    
        <div>
            <?php foreach($model4 as $comment) : ?>
                <div class="border border-black rounded-md max-w-[330px] my-2 overflow-x-scroll">
                    <p>
                        <?= $comment->comment ?>
                    </p>
                    <p>Author: <?= $comment->writer ?></p>
                </div>
            <?php endforeach ; ?>
        </div>
    
    </div>

</div>


