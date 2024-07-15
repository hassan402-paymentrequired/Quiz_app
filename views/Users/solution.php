<?php
// session_start();

$q = $_SESSION['question'];

$cor = $_SESSION['corrections'];



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correction</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="w-full p-16">

        <h2 class="text-3xl font-normal text-gray-800 p-5">Here are your Corrections</h2>
        <h2 class="text-xl  ml-3">You got <?php echo $_SESSION['message']['now'].'%' ?> out of 100%</h2>
        <!-- content -->
        <div class="content flex flex-col  p-2 w-full">


            <?php

            foreach ($_SESSION['question'] as $key => $value) {



            ?>

                <!-- title -->
                <div class="p-3 border w-full mb-4 rounded shadow">
                    <div class="flex items-center gap-3">
                        <span><?php echo $key + 1 . '.' ?></span>
                        <h2 class="text-lg text-gray-700 my-3"><?php echo $value['title'] ?></h2>
                        <?php if($value['correct_answer'] === $cor[$key]['answer']) : ?>
                            <p class="text-2xl font-extrabold text-green-600">&#10003;</p>
                            <?php else : ?>
                             <p class="text-2xl text-red-600">&#10008;</p>

                        <?php endif ?>
                    </div>

                    <div class="options flex flex-col">

                        <label for="option_1" class=" flex items-start 1 cursor-pointer flex-col gap-3 justify-start parent">

                            <div class=" flex items-center ml-1  cursor-pointer">
                                <small class="font-semibold mr-3">A</small>
                                <input  <?php $value['correct_answer'] === $value['option_1'] ? 'checked' : ' ' ?> type="radio" class="mr-2" name="1" value="<?php echo $value['option_1'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_1'] ?></span>
                            </div>

                            <div class=" flex items-center ml-1 cursor-pointer">
                                <small class="font-semibold mr-3">B</small>
                                <input <?php echo $value['correct_answer'] === $value['option_2'] ? 'checked' : ' ' ?> type="radio" class="mr-2" name="" value="<?php echo $value['option_2'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_2'] ?></span>
                            </div>

                            <div class=" flex items-center ml-1 cursor-pointer">
                                <small class="font-semibold mr-3">C</small>
                                <input  <?php echo $value['correct_answer'] === $value['option_3'] ? 'checked' : ' ' ?> name="" type="radio" class="mr-2" value="<?php echo $value['option_3'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_3'] ?></span>
                            </div>
                            <div class=" flex items-center ml-1 cursor-pointer">
                                <small class="font-semibold mr-3">D</small>
                                <input  <?php $value['correct_answer'] === $value['option_4'] ? 'checked' : ' ' ?> name="" type="radio" class="mr-2" value="<?php echo $value['option_4'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_4'] ?></span>
                            </div>
                            <input type="text" id="id" class="hidden id" value="<?php echo $value['id'] ?>">

                        </label>

                    </div>

                    <div class="correct w-full p-3 bg-green-400">
                        <div class="flex gap-2">
                            <span class="text-[17px] font-bold">Ans:</span>
                                <h2><?php echo $value['correct_answer'] ?></h2>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-[17px] font-bold">Explaination:</span>
                            <p><?php echo $value['solution'] ?? 'No explaination provided for this question' ?></p>
                        </div>
                    </div>

                </div>

            <?php }
            ?>

                <a href="/selectQ" type="submit" class="px-3 py-1 rounded bg-gray-950 text-white mt-5 text-center" >Continue</a>



        </div>


    </div>








  
</body>

</html>