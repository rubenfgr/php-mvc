<?php

$helper = new ViewHelper();

?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Fruit View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="app/view/assets/style.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-2">

        <?php
        require_once "app/view/includes/header.php";
        if (isset($errors) && !empty($errors)) {
            echo "<div class='bg-danger text-white mb-3 p-2'>" . $errors . "</div>";
            echo '<button class="btn btn-danger" onclick="location.href=\'' . $helper->url('Wellcome', 'index') . '\'"' . '>SALIR</button>';
        } else {
            require_once "app/view/layout/" . $content;
        }
        require_once "app/view/includes/footer.php";
        ?>

    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>