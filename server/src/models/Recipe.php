<?php

require '../config/database.php';

class Recipe
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    public function getAllRecipes()
    {
        $stmt = $this->db->query("SELECT * FROM recipes");
        return $stmt->fetchAll();
    }

    public function getRecipeById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM recipes WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function createRecipe($data)
    {
        $stmt = $this->db->prepare("INSERT INTO recipes (name, prep_time, difficulty, vegetarian) VALUES (:name, :prep_time, :difficulty, :vegetarian)");
        return $stmt->execute([
            'name' => $data['name'],
            'prep_time' => $data['prep_time'],
            'difficulty' => $data['difficulty'],
            'vegetarian' => $data['vegetarian']
        ]);
    }

    public function updateRecipe($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE recipes SET name = :name, prep_time = :prep_time, difficulty = :difficulty, vegetarian = :vegetarian WHERE id = :id");
        return $stmt->execute([
            'name' => $data['name'],
            'prep_time' => $data['prep_time'],
            'difficulty' => $data['difficulty'],
            'vegetarian' => $data['vegetarian'],
            'id' => $id
        ]);
    }

    public function deleteRecipe($id)
    {
        $stmt = $this->db->prepare("DELETE FROM recipes WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function rateRecipe($id, $rating)
    {
        $stmt = $this->db->prepare("INSERT INTO ratings (recipe_id, rating) VALUES (:recipe_id, :rating)");
        return $stmt->execute([
            'recipe_id' => $id,
            'rating' => $rating
        ]);
    }
}
?>

