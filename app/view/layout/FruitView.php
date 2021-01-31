<h2 class="mb-3">Fruit View
    <button class="btn btn-danger" onclick="location.href='<?php echo $helper->url('Wellcome', 'index') ?>'">SALIR</button>
</h2>


<form class="d-flex gap-3 mb-3" action="<?php echo $helper->url('Fruit', 'store'); ?>" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" name="name">
    <select class="form-select" aria-label="Default select example" name="category">
        <option selected value="Ácida">Ácida</option>
        <option value="Semiácida">Semiácida</option>
        <option value="Dulce">Dulce</option>
        <option value="Neutra">Neutra</option>
    </select>
    <input class="form-control" type="file" name="image">
    <input type="submit" class="btn btn-primary" value="Insertar">
</form>

<div class="d-flex flex-row flex-wrap gap-3">

    <?php

    foreach ($fruits as $fruit) {
        $url = $helper->url("fruit", "remove");
        $id = $fruit['id'];
        echo <<<EOF
                    <div class="text-center p-2 border border-primary rounded align-middle">
                        <img class="img-fruit" src="./public/${fruit['image']}"></img>
                        <div class="fw-bold">${fruit['name']}</div>
                        <div>${fruit['category']}</div>
                        <form action="$url" method="POST">
                        <input type="hidden" name="id" value="$id">
                        <input type="submit" value="Eliminar">
                        </form>
                    </div>
                EOF;
    }

    ?>

</div>