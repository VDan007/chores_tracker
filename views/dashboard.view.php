


<?php foreach ($model as $key=>$value) : ?>


<div>
    <div>
        <?= $model[$key]->creator ?>
    </div>
    <div>
        <?= $model[$key]->creation_date ?>
    </div>
    <div>
        <?= $model[$key]->due_date ?>
    </div>
    <div>
        <?= $model[$key]->status ?>
    </div>
    <div>
        <?= $model[$key]->comments ?>
    </div>
</div>


<?php endforeach; ?>







