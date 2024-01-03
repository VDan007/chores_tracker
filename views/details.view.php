



<form method="POST" class="flex flex-col items-center">
    <h1> <?= $model->title ?></h1>
    <h3>Creation date: <?= $model->creation_date ?> </h3>
    <h3>Due date:<?= $model->due_date ?> </h3>
    <select name="status" id="">
        <option value="">c</option>
        <option value="">v</option>
        <option value="">b</option>
    </select>
    <p>Description: <?= $model->description ?>  </p>
</form>