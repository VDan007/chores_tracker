
<?php

    $status = $model->status;

    $array_of_options = ['not started','in progress','delay','done'];
    
    $array_of_options_without_current_status = array_filter($array_of_options, fn($value) => $value != $status );

    $array_to_display = array_merge([$model->status],$array_of_options_without_current_status);

?>


<form method="POST" class="flex flex-col items-center gap-5">
    <h1> <?= $model->title ?></h1>
    <h3>Creation date: <?= $model->creation_date ?> </h3>
    <h3>Due date:<?= $model->due_date ?> </h3>
    <label class="border" for="status"> Status:
        <select name="status" id="status">
            <?php foreach($array_to_display as $item) : ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach; ?>
        </select>

    </label>
    <input type="hidden" name="id" value="<?= $model->id ?>">
    <p>Description: <?= $model->description ?>  </p>
    <input class="cursor-pointer border bg-gray-300 p-1" type="submit" value="save changes">
    <label class="flex" for="comment">Add a Comment:
        <textarea class="border min-h-[150px] min-w-[280px]" name="new_comment" type="textarea"></textarea>
    </label>
    <button type="submit" name="add_comment" class="cursor-pointer bg-yellow-300 p-1"> add comment </button>
</form>
<a class="bg-red-300 block mx-auto my-5 max-w-[150px] text-center p-1" href="dashboard.php">back to dashboard</a>

<div class="flex flex-col items-center mt-9 border">
    <h2>Comments</h2>

    <div>
        <?php foreach($model2 as $comment) : ?>
            <div class="border max-w-[330px] overflow-hidden">
                <p>
                    <?= $comment->comment ?>
                </p>
                <p>Author: <?= $comment->writer ?></p>
            </div>
        <?php endforeach ; ?>
    </div>

</div>