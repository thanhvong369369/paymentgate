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
        $record = $this->table->find(1, ['name', 'description']);//$this->table->where('name','like','%vo%')->get();//$this->table->get();
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
	
	public function resultFromNapasDefault($request, $response){
		$data = 'eyJ0b2tlblJlc3VsdCI6eyJyZXN1bHQiOiJTVUNDRVNTIiwicmVzcG9uc2UiOnsiZ2F0ZXdheUNvZGUiOiJOT19WRVJJRklDQVRJT05fUEVSRk9STUVEIiwibWVzc2FnZSI6IlRyYW5zYWN0aW9uIGlzIHN1Y2Nlc3NmdWwuIn0sInRva2VuIjoiNDAwNTU1MDg1NjE2MDAxOSIsImNhcmQiOnsiYnJhbmQiOiJWSVNBIiwiZXhwaXJ5Ijp7Im1vbnRoIjoiMDUiLCJ5ZWFyIjoiMTcifSwiaXNzdWVyIjoiSlBNT1JHQU4gQ0hBU0UgQkFOSywgTi5BLiIsIm51bWJlciI6IjQwMDU1NXh4eHh4eDAwMTkiLCJzY2hlbWUiOiJWSVNBIn0sImRldmljZUlkIjoiMDkzNjc4OTM5MCJ9LCJwYXltZW50UmVzdWx0Ijp7ImFwaU9wZXJhdGlvbiI6IlBBWSIsImF1dGhvcml6YXRpb25SZXNwb25zZSI6eyJjYXJkU2VjdXJpdHlDb2RlRXJyb3IiOiJNIiwiZGF0ZSI6IjAyMTciLCJmaW5hbmNpYWxOZXR3b3JrRGF0ZSI6IjIwMTctMDItMTciLCJwcm9jZXNzaW5nQ29kZSI6IjAwMzAwMCIsInJlc3BvbnNlQ29kZSI6IjAwIiwicmV0dXJuQWNpIjoiWSIsInN0YW4iOiIyMzMwODAiLCJ0aW1lIjoiMTAwNDE5In0sIm1lcmNoYW50SWQiOiJBUElURVNUIiwib3JkZXIiOnsiYW1vdW50IjoiMTUwMDAwIiwiY3JlYXRpb25UaW1lIjoiMjAxNy0wMi0xN1QxMDowNDoxOS42MzZaIiwiY3VycmVuY3kiOiJWTkQiLCJpZCI6Ik9SRF84ODA5MjQiLCJyZWZlcmVuY2UiOiJPUkRfODgwOTI0IiwidG90YWxBdXRob3JpemVkQW1vdW50IjoiMTUwMDAwIiwidG90YWxDYXB0dXJlZEFtb3VudCI6IjE1MDAwMCIsInRvdGFsUmVmdW5kZWRBbW91bnQiOiIwIn0sInJlc3BvbnNlIjp7ImFjcXVpcmVyQ29kZSI6IjAwIiwiYWNxdWlyZXJNZXNzYWdlIjoiQXBwcm92ZWQiLCJjYXJkU2VjdXJpdHlDb2RlIjp7ImFjcXVpcmVyQ29kZSI6Ik0iLCJnYXRld2F5Q29kZSI6Ik1BVENIIn0sImdhdGV3YXlDb2RlIjoiQVBQUk9WRUQiLCJtZXNzYWdlIjoiVHJhbnNhY3Rpb24gaXMgc3VjY2Vzc2Z1bC4ifSwicmVzdWx0IjoiU1VDQ0VTUyIsInNvdXJjZU9mRnVuZHMiOnsicHJvdmlkZWQiOnsiY2FyZCI6eyJicmFuZCI6IlZJU0EiLCJleHBpcnkiOnsibW9udGgiOiI1IiwieWVhciI6IjE3In0sImlzc3VlciI6IkpQTU9SR0FOIENIQVNFIEJBTkssIE4uQS4iLCJudW1iZXIiOiI0MDA1NTV4eHh4eHgwMDE5Iiwic2NoZW1lIjoiVklTQSJ9fSwidHlwZSI6IkNBUkQifSwidGltZU9mUmVjb3JkIjoiMjAxNy0wMi0xN1QxMDowNDoxOS42MzZaIiwidHJhbnNhY3Rpb24iOnsiYWNxdWlyZXIiOnsiYmF0Y2giOiIyMDE3MDIxOCIsImRhdGUiOiIwMjE4IiwiaWQiOiJWQ0JfUzJJIiwibWVyY2hhbnRJZCI6IjAwMDEwMTU5Njk5MjcyNSJ9LCJhbW91bnQiOiIxNTAwMDAiLCJhdXRob3JpemF0aW9uQ29kZSI6IjAxNTAxNiIsImN1cnJlbmN5IjoiVk5EIiwiaWQiOiJIRlBBWVNBVkVfNjE3ODUxIiwicmVjZWlwdCI6IjcwNDgxMDIzMzA4MCIsInR5cGUiOiJQQVlNRU5UIn0sImNoYW5uZWwiOiI3Mzk5IiwidmVyc2lvbiI6IjEifX0=';
        $result = json_decode(base64_decode($data));
		return $response->withJson($result,200);
	}

	public function resultFromNapas($request, $response){
        $body_request_data = $request->getParsedBody();
		$data = $body_request_data['data'];
		$result = json_decode(base64_decode($data));
		return $response->withJson($result,200);
	}
}
?>