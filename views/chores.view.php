

<div class="grow border  flex justify-center items-center gap-5 bg-slate-800 ">


<?php



$data = Data::get_chores();




?>

<?php foreach ($data as $item) : ?>

    <div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>




<?php endforeach; ?>    
    

</div>