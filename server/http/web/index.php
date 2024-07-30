<?php

require '../../src/controllers/RecipeController.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$controller = new RecipeController();

switch ($requestMethod) {
    case 'GET':
        if (isset($uri[2])) {
            $controller->getRecipe($uri[2]);
        } else {
            $controller->listRecipes();
        }
        break;
    case 'POST':
        if (isset($uri[2]) && $uri[2] === 'rating') {
            $controller->rateRecipe($uri[1]);
        } else {
            $controller->createRecipe();
        }
        break;
    case 'PUT':
    case 'PATCH':
        $controller->updateRecipe($uri[2]);
        break;
    case 'DELETE':
        $controller->deleteRecipe($uri[2]);
        break;
    default:
        ResponseHelper::sendResponse(405, ["message" => "Method not allowed"]);
        break;
}
?>
