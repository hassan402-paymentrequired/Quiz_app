<?php
// var_dump($_SESSION['user'])
$uri = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
     content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<?php include ("./views/partials/navbar.php") ?>


 <?php require ('./views/partials/authUser.php') ?>


<script>

    const parent = document.querySelector('.parent')
    const menu = document.querySelector('.close')

    menu.addEventListener("click", e => {
        parent.classList.add('collase')
    })
    
</script>
</body>
</html>
