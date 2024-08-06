<?php
declare(strict_types=1);

$task = new Task();

Router::get('/', fn() => require 'view/pages/home.php');

Router::get('/todos', fn() => require 'view/pages/todos.php');
Router::post('/todos', fn() => require 'controlles/addNewTask.php');
Router::post('/todos/delete', fn() => require 'controlles/deleteTask.php');
Router::post('/todos/complete', fn() => require 'controlles/completeTask.php');
Router::post('/todos/uncompleted', fn() => require 'controlles/uncompletedTask.php');

Router::get('/notes', fn() => require 'view/pages/notes.php');

Router::get('/login', fn() => require 'view/pages/auth/login.php');
Router::post('/login', fn() => (new User())->login());

Router::get('/logout', fn() => (new User())->logout());

Router::get('/register', fn() => require 'view/pages/auth/register.php');
Router::post('/register', fn() => (new User())->register());

Router::notFound();
