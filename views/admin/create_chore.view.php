<h1>create chore</h1>

<form class="flex flex-col max-w-[500px] mx-auto gap-6" action=""method="POST">

<label for="title">Title</label>
<input class="border" name="title" id="title" type="text">

<label for="assigned_to">Assigned to 
            
            <select class="border" name="assigned_to" id="assigned_to">
                <?php foreach($model as $item) : ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
        </label>

<label for="due_date">Due date</label>
<input class="border" id="due_date" name="due_date" type="date" >

<label for="description">Description</label>
<input class="border" name="description" id="description" type="text">

<input class="bg-gray-300 p-2 cursor-pointer" type="submit" value="Save">

</form>