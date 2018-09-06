<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/{name}/hello/{friendname}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    file_put_contents ( 'OK.txt', $args['friendname']);
    $data = array('name'=>$args['name'], 'friend'=>$args['friendname']);
    // Render index view
    return $response->withJson($data,200);//$this->renderer->render($response, 'index.phtml', $args);
});

// get all todos
$app->get('/todos', function ($request, $response, $args) {
    // $sth = $this->db->prepare("SELECT * FROM napas WHERE 1");
    // $sth->execute();
    // $todos = $sth->fetchAll();
    file_put_contents ( 'OK.txt', $this->db);
    return $this->response->withJson("OK",200);
});

// Retrieve todo with id 
$app->get('/todo/[{id}]', function ($request, $response, $args) {
     $sth = $this->db->prepare("SELECT * FROM napas WHERE id=:id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $todos = $sth->fetchObject();
    return $this->response->withJson($todos);
});

// Search for todo with given search teram in their name
$app->get('/todos/search/[{query}]', function ($request, $response, $args) {
     $sth = $this->db->prepare("SELECT * FROM napas WHERE UPPER(Name) LIKE :query ORDER BY Name");
    $query = "%".$args['query']."%";
    $sth->bindParam("query", $query);
    $sth->execute();
    $todos = $sth->fetchAll();
    return $this->response->withJson($todos);
});

 // Add a new todo
$app->post('/todo', function ($request, $response) {
    $input = $request->getParsedBody();
    // $sql = "INSERT INTO napas ('Name', 'Description', 'Option') VALUES (:newnapas)";
    // $sth = $this->db->prepare($sql);
    // $data = "'".$input['Name']."','".$input['Desctiption']."','".$input['Option']."'";
     // file_put_contents ( 'OK.txt', $data);
    // $sth->bindParam("newnapas", $data);
   
    // $sth->execute();
    //$input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});

// DELETE a todo with given id
$app->delete('/todo/[{id}]', function ($request, $response, $args) {
    // $sth = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
    // $sth->bindParam("id", $args['id']);
    // $sth->execute();
    // $todos = $sth->fetchAll();
    return $this->response->withJson(["Status"=>"OK"], 200);
});

// Update todo with given id
$app->put('/todo/[{id}]', function ($request, $response, $args) {
    $input = $request->getParsedBody();
    // $sql = "UPDATE tasks SET task=:task WHERE id=:id";
     // $sth = $this->db->prepare($sql);
    // $sth->bindParam("id", $args['id']);
    // $sth->bindParam("task", $input['task']);
    // $sth->execute();
    // $input['id'] = $args['id'];
    return $this->response->withJson($input);
});

// Homecontroller
$app->get('/home', 'HomeController:index');
$app->post('/home', 'HomeController:create');