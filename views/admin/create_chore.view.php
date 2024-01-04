<h1>create chore</h1>

<form class="flex flex-col max-w-[500px] mx-auto gap-6" action=""method="POST">

<label for="title">Title</label>
<input class="border" name="title" id="title" type="text">

<label for="assign_to">Assig to</label>
<input class="border" name="assigned_to" id="assign_to" type="text">

<label for="due_date">Due date</label>
<input class="border" id="due_date" name="due_date" type="date" >

<label for="description">Description</label>
<input class="border" name="description" id="description" type="text">

<input class="bg-gray-300 p-2 cursor-pointer" type="submit" value="Save">

</form>