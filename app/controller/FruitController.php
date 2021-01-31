<?php

final class FruitController extends BaseController
{

    private FruitModel $_model;

    public function __construct()
    {
        parent::__construct();
        $this->_model = new FruitModel($this->conn);
    }

    public function index()
    {
        $fruits = $this->_model->getAll();
        $this->view("Fruit", ["fruits" => $fruits]);
    }

    public function remove()
    {
        try {
            $id = isset($_POST['id']) && !empty($_POST['id']) ? trim($_POST['id']) : null;
            if (!is_null($id)) {
                $res = $this->_model->deleteById($id);
                if ($res) {
                    $this->redirect("Fruit", "index");
                } else {
                    throw new Exception("Imposible eliminar la fruta");
                }
            } else {
                throw new Exception("Se requiere el id de la fruta para eliminarla");
            }
        } catch (Error | Exception $e) {
            $errors = $e->getMessage();
            $this->view("Wellcome", ["errors" => $errors]);
        }
    }

    public function store()
    {
        try {
            $name = isset($_POST['name']) && !empty($_POST['name']) ? trim($_POST['name']) : null;
            $category = isset($_POST['category']) && !empty($_POST['category']) ? trim($_POST['category']) : null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            $uploadedImage = false;
            if (!is_null($image)) {
                $uploadedImage = move_uploaded_file($image['tmp_name'], "public/" . $image['name']);
            }
            if (!$uploadedImage) {
                throw new Exception("Ocurrió un problema al subir la imagen, vuelva a intentarlo");
            }
            $fruit = new Fruit(0, $name, $category, $image['name']);
            $res = $this->_model->insert($fruit->toArray());
            if (!$res) {
                throw new Exception("Ocurrió un error al intentar guardar la fruta, vuelva a intentarlo");
            }
            $this->redirect("Fruit", "index");
        } catch (Error | Exception $e) {
            $errors = $e->getMessage();
            $this->view("Wellcome", ["errors" => $errors]);
        }
    }
}
