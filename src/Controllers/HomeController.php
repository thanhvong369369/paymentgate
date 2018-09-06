<?php

namespace App\Controllers;
require __DIR__ . '/../Models/NapasModel.php';
use Illuminate\Database\Query\Builder;

class HomeController{

    private $table;

    public function __construct(Builder $table){
        $this->table = $table;
    }

    public function index($request, $response){
        //$napas = $this->db->table('napas')->get();
        $record = $this->table->where('name','like','%vo%')->get();//$this->table->get();
        file_put_contents ('OK.txt', $record);
        return $response->withJson($record,200);
    }
    
    public function create($request, $response){
        $data = $request->getParsedBody();
        $new_napas = new Napas;
        $new_napas->Name = $data['Name'];
        $new_napas->save();
        //$record = $this->table->where('name','like','%vo%')->get();//$this->table->get();
        //file_put_contents ('OK.txt', $record);
        return $response->withJson($new_napas,200);
    }
}
?>