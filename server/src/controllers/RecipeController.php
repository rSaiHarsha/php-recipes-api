<?php

require '../models/Recipe.php';
require '../helpers/ResponseHelper.php';

class RecipeController
{
    private $recipe;

    public function __construct()
    {
        $this->recipe = new Recipe();
    }

    public function listRecipes()
    {
        $recipes = $this->recipe->getAllRecipes();
        ResponseHelper::sendResponse(200, $recipes);
    }

    public function getRecipe($id)
    {
        $recipe = $this->recipe->getRecipeById($id);
        if ($recipe) {
            ResponseHelper::sendResponse(200, $recipe);
        } else {
            ResponseHelper::sendResponse(404, ["message" => "Recipe not found"]);
        }
    }

    public function createRecipe()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->recipe->createRecipe($data)) {
            ResponseHelper::sendResponse(201, ["message" => "Recipe created"]);
        } else {
            ResponseHelper::sendResponse(400, ["message" => "Error creating recipe"]);
        }
    }

    public function updateRecipe($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->recipe->updateRecipe($id, $data)) {
            ResponseHelper::sendResponse(200, ["message" => "Recipe updated"]);
        } else {
            ResponseHelper::sendResponse(400, ["message" => "Error updating recipe"]);
        }
    }

    public function deleteRecipe($id)
    {
        if ($this->recipe->deleteRecipe($id)) {
            ResponseHelper::sendResponse(200, ["message" => "Recipe deleted"]);
        } else {
            ResponseHelper::sendResponse(400, ["message" => "Error deleting recipe"]);
        }
    }

    public function rateRecipe($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->recipe->rateRecipe($id, $data['rating'])) {
            ResponseHelper::sendResponse(200, ["message" => "Recipe rated"]);
        } else {
            ResponseHelper::sendResponse(400, ["message" => "Error rating recipe"]);
        }
    }
}
?>
