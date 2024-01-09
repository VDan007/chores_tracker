
    
        <h1 class="text-3xl text-center mb-2">LOGIN</h1>
        <form action="" method="POST" class="flex flex-col items-center gap-3">
            <div class="flex flex-col gap-3">
                <label for="email" class="flex flex-col text-2xl">EMAIL:
                    <input id="email" type="text" name="email" class="border-2 border-black pl-2 rounded-md">
                </label>
                <label for="password" class="flex flex-col text-2xl">PASSWORD:
                    <input id="password" type="password" name="password" class="border-2 border-black pl-2 rounded-md">
                </label>

            </div>
            <input type="submit" value="LOGIN" class="border-2 border-black p-2 bg-green-300 hover:bg-green-500 cursor-pointer rounded-md">
        </form>

        <?php
            if(isset($view_bag['status'])){
                echo $view_bag['status'];
            }
        ?>

   



