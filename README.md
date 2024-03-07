# Project Task-Manager Api 

Task Manager API is a Laravel-based application that provides a simple interface for managing tasks. It allows users to perform CRUD operations on tasks, as well as filter tasks based on their status or creation date.

## Features

- `Create`: Add new tasks with titles, descriptions, and completion status.
- `Read`: Retrieve all tasks or individual tasks by ID.
- `Update`: Modify existing tasks, attributes such as title, description, or completion status.
- `Delete`: Remove tasks from the database.
- `Filtering`: Filter tasks based on their completion status or creation date.

## Installation

1. To start, download the project [task-manager](https://github.com/OnidzukaGTO/task-manager) from GitHub.
2. Install all dependencies using:
```bash
composer install
```
3. Configure the `.env` file with the options from the file `.env.example`
4. Generate a new Application Key in Laravel:
```bash
php artisan key:generate
```
5. Execute the migration with the command:
```bash
php artisan migrate
```
6. We launch the project using the command:
```bash
php artisan serve
```

## Usage

- `Create`: Send a POST request to /api/task with JSON data containing the task details (title, text, completed).
```bash
POST /api/task
Content-Type: application/json

{
    "title": "New Task",
    "text": "description task",
    "completed": false
}
```
- `Read`: Send a GET request to /api/tasks to retrieve all tasks, or /api/task/{id} to retrieve a specific task by ID.
- `Update`: Send a PUT request to /api/task/{id} with JSON data containing the updated task details.
- `Delete`: Send a DELETE request to /api/task/{id} to delete a task by ID.
- `Filtering`: Use query parameters completed and date to filter tasks by completion status or creation date, respectively.
```bash
GET /api/tasks?date=2024-03-04?completed=true
```

## Contact

If you have questions or suggestions, contact me via email: jbogovkov@gmail.com .

## Thank You

Thank you for using our project!