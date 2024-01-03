
<?php

    $status = $model->status;

    $array_of_options = ['not started','in progress','delay','done'];
    
    $array_of_options_without_current_status = array_filter($array_of_options, fn($value) => $value != $status );

    $array_to_display = array_merge([$model->status],$array_of_options_without_current_status);

?>


<form method="POST" class="flex flex-col items-center">
    <h1> <?= $model->title ?></h1>
    <h3>Creation date: <?= $model->creation_date ?> </h3>
    <h3>Due date:<?= $model->due_date ?> </h3>
    <select name="status" id="">
        <?php foreach($array_to_display as $item) : ?>
            <option value="<?= $item ?>"><?= $item ?></option>
        <?php endforeach; ?>
    </select>
    <p>Description: <?= $model->description ?>  </p>
</form>