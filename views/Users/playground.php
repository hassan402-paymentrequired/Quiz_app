<?php
// session_start();
// require ('../../Core/getSelectedQ.php')



$q = $_SESSION['question'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="w-full p-16">

        <h2 class="text-3xl font-normal text-gray-800 p-5">Here are your questions</h2>
        <!-- content -->
        
        
            <?php

            foreach ($_SESSION['question'] as $key => $value) {



            ?>
        <div class="content flex flex-col  p-2 w-full">

                <!-- title -->
                <div class="p-3 border w-full mb-4 rounded shadow">
                    <div class="flex items-center gap-3">
                        <span><?php echo $key + 1 . '.' ?></span>
                        <h2 class="text-lg text-gray-700 my-3"><?php echo $value['title'] ?></h2>
                    </div>

                    <div class="options flex flex-col">

                        <label for="<?php echo $key ?>" class=" flex items-start 1 cursor-pointer flex-col gap-3 justify-start parent">

                            <div class=" flex items-center ml-1  cursor-pointer">
                                <small class="font-semibold mr-3">A</small>
                                <input type="radio" class="mr-2" name="<?php echo $key ?>" value="<?php echo $value['option_1'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_1'] ?></span>
                            </div>

                            <div class=" flex items-center ml-1 cursor-pointer">
                                <small class="font-semibold mr-3">B</small>
                                <input type="radio" class="mr-2" name="<?php echo $key ?>" value="<?php echo $value['option_2'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_2'] ?></span>
                            </div>

                            <div class=" flex items-center ml-1 cursor-pointer">
                                <small class="font-semibold mr-3">C</small>
                                <input name="<?php echo $key ?>" type="radio" class="mr-2" value="<?php echo $value['option_3'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_3'] ?></span>
                            </div>
                            <div class=" flex items-center ml-1 cursor-pointer">
                                <small class="font-semibold mr-3">D</small>
                                <input name="<?php echo $key ?>" type="radio" class="mr-2" value="<?php echo $value['option_4'] ?>">
                                <span class="text-md font-normal mb-1 text-gray-700"><?php echo $value['option_4'] ?></span>
                            </div>
                            <input type="text" id="id" class="hidden id" value="<?php echo $value['id'] ?>">

                        </label>

                    </div>

                </div>
                </div>
            <?php }
            ?>

            <form action="Core/surmit.php" class="surmit" method="post">
                <input type="text" class="hold hidden" name="all">
                <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
                <input type="hidden" name="sub_id" value="<?php echo $value['subject_id'] ?>">
                <button type="submit" class="px-3 py-1 rounded bg-gray-950 text-white mt-5 " name="take">submit</button>

            </form>

            

     


    </div>








    <!-- inner script -->
    <script>
        const right = document.querySelector('.answer')
        const add = document.querySelector('.surmit')
        const divs = document.querySelectorAll('.parent')



        const allQ = [];


        // document.addEventListener("click", e => {
        add.addEventListener("submit", e => {
            divs.forEach(div => {

                let m = div.querySelector('.id')?.value
                let d = div.querySelector("input[type='radio']:checked")?.value
                console.log(div);

                let questionObject = {
                    id: m,
                    answer: d
                };
                allQ.push(questionObject)

            })

            let jso = JSON.stringify(allQ);
            document.querySelector('.hold').value = jso
            console.log(allQ);
        })


        // })
    </script>
</body>

</html>