<?php

final class Fruit
{
    private int $id;
    private string $name;
    private string $category;
    private string $image;

    public function __construct(int $id, string $name, string $category, string $image)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setCategory($category);
        $this->setImage($image);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }
    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
