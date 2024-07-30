# PHP Developer Test

## Project Description
This project is a simple Recipes API built in PHP. The API conforms to REST practices and includes endpoints for listing, creating, reading, updating, and deleting recipes. It also includes functionality for searching and rating recipes.

## Setup Instructions
1. Ensure Docker is installed on your machine.
2. Clone the repository or unzip the project files.
3. Navigate to the project directory.
4. Run `docker-compose up -d` to start the Docker containers.
5. The API will be available at `http://localhost:8080`.

## Endpoints
- **List Recipes**: `GET /recipes`
- **Create Recipe**: `POST /recipes`
- **Get Recipe**: `GET /recipes/{id}`
- **Update Recipe**: `PUT/PATCH /recipes/{id}`
- **Delete Recipe**: `DELETE /recipes/{id}`
- **Rate Recipe**: `POST /recipes/{id}/rating`
- **Search Recipes**: `GET /recipes/search?query={search_term}`

## Testing
Unit tests are provided and can be run using PHPUnit.
