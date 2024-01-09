
<div class="border-8 border-black rounded-md relative mt-4 mb-4">
    <a class="bg-red-300 block border-4 border-black hover:bg-red-500 rounded-md  max-w-[150px] text-center p-1 absolute left-1 top-1" href="index.php"> <- BACK TO DASHBOARD</a>
    
    
    <form class="flex flex-col max-w-[500px] mx-auto gap-6 pb-4" action=""method="POST">
    
    <label for="title" class="text-2xl">TITLE:
        <input class="pl-2 border-2 border-black rounded-md min-w-[100%]" name="title" id="title" type="text">
    </label>
    
    <label for="assigned_to" class="text-2xl flex flex-col">ASSIGNED TO:
                
                <select class="border-2 border-black rounded-md" name="assigned_to" id="assigned_to">
                    <?php foreach($model as $item) : ?>
                        <option value="<?= $item ?>"><?= $item ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
    
    <label for="due_date" class="text-2xl flex flex-col">DUE DATE:
        <input class="border-2 border-black rounded-md pl-2" id="due_date" name="due_date" type="date" >
    </label>
    
    <label for="description" class="text-2xl flex flex-col">DESCRIPTION:
        <textarea class="border-2 border-black rounded-md pl-2" name="description" id="description"></textarea>
    </label>
    
    <input class="bg-green-300 p-2 cursor-pointer border-2 border-black rounded hover:bg-green-500" type="submit" value="SAVE">
    
    </form>

</div>
