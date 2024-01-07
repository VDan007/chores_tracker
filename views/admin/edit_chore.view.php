
<div class="flex items-start justify-center relative">

    <a class="bg-red-300 block  rounded-md  max-w-[150px] text-center p-1 absolute left-0 top-0" href="index.php">back to dashboard</a>

    <form method="POST" class="flex flex-col items-start gap-5   max-w-[400px] ">
        
        <label for="title">Title: 
            <input class="border" name="title" type="text" value="<?= $model->title ?>">
        </label>
    
        <h3>Creation date: <?= $model->creation_date ?> </h3>

        <label for="assigned_to">Assigned to 
            
            <select class="border" name="assigned_to" id="assigned_to">
                <?php foreach($model3 as $item) : ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    
        <label for="due_date">Due date:
            <input class="border" id="due_date"  name="due_date" type="date" value="<?= $model->due_date?>">
        </label>
    
        <label class="border" for="status"> Status:
            <select name="status" id="status">
                <?php foreach($model2 as $item) : ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
    
        </label>
        <input type="hidden" name="id" value="<?= $model->id ?>">
        
        <label class="flex gap-1" for="description">Description:
            <textarea class="border min-h-[150px] min-w-[280px] text-left p-1" name="description" id="description" type="text" value=""><?= $model->description ?></textarea>
        </label>
        
        <input type="hidden" name="id" value="<?= $model->id ?>">

        <button class="cursor-pointer  bg-green-300 p-1" type="submit" name="save" > save changes </button>
        <button class="text-white cursor-pointer  bg-black p-1" type="submit" name="delete"> delete chore </button>
            
        <label class="flex" for="comment">Add a Comment:
            <textarea class="border min-h-[150px] min-w-[280px]" name="new_comment" type="textarea"></textarea>
        </label>
        <button type="submit" name="add_comment" class="cursor-pointer bg-yellow-300 p-1"> add comment </button>
    </form>

</div>

<div class="flex justify-center mt-9 border">
    <h2>Comments</h2>
</div>

