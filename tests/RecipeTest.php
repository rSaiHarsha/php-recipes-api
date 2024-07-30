<?php

use PHPUnit\Framework\TestCase;

class RecipeTest extends TestCase
{
    private $recipe;

    protected function setUp(): void
    {
        $this->recipe = new Recipe();
    }

    public function testGetAllRecipes()
    {
        $recipes = $this->recipe->getAllRecipes();
        $this->assertIsArray($recipes);
    }

    public function testCreateRecipe()
    {
        $data = [
            'name' => 'Test Recipe',
            'prep_time' => 30,
            'difficulty' => 2,
            'vegetarian' => true
        ];
        $result = $this->recipe->createRecipe($data);
        $this->assertTrue($result);
    }

    public function testUpdateRecipe()
    {
        $data = [
            'name' => 'Updated Recipe',
            'prep_time' => 25,
            'difficulty' => 1,
            'vegetarian' => false
        ];
        $result = $this->recipe->updateRecipe(1, $data);
        $this->assertTrue($result);
    }

    public function testDeleteRecipe()
    {
        $result = $this->recipe->deleteRecipe(1);
        $this->assertTrue($result);
    }

    public function testRateRecipe()
    {
        $result = $this->recipe->rateRecipe(1, 5);
        $this->assertTrue($result);
    }
}
?>
