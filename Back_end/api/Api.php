<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

include '../model/db.php';
include '../controlles/regix.php';

class API{
    public function get($para,$get_Db){
        $url = parse_url($_SERVER['REQUEST_URI']);
        if(isset($url['query'])){
            $params =  explode("=",$url['query']);
            $condition =[$params[0] =>  $params[1]];
            $resultat = $get_Db->select("" ,$condition);
        }else{
            $resultat = $get_Db->select();
        }
            return $resultat;
    } 
    public function post($para,$get_Db){

        $get_Db->insert($para);
    }
    public function delete($para,$get_Db){
        reset($para);
        $first_key = key($para); 
        $where_id =$first_key;
        $condition = $para[$first_key];
        $get_Db->delete($where_id , $condition);
    }
    public function put($para,$get_Db){
        $get_Db-> update($para,"Token",$para['Token']);
    }
}
function Data($res){
    $arr_post['users'] = array();
    foreach($res  as $value){
    $article = array("FirstName" => $value['Fname'],
                "LastName" => $value['Lname'],
                "Email" => $value['Email'],
                "PhoneNumber" => $value['PhoneNumber'],
                "Token" => $value['Token']);
                array_push($arr_post['users'],$article);
    }
     return $arr_post['users'];
}
function Use__Api($contentType,$method,$params){
    $get_Db = new CRUD("user");
    $check_regix = new REGIX($params);
    $get_Api = new API();
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];
    if($contentType ==='application/json'){
            if($method === "get"){
                $data = $get_Api->$method($params,$get_Db);
                $response['data'] = Data($data);
            }
            else{
                $RG__valide = $check_regix->check($params);
                if($RG__valide){
                    $token_user =  uniqid();
                    $method =="post" ? $params['Token'] = $token_user : "";
                    $data = $get_Api->$method($params,$get_Db);
                }
                else{
                    $response['error'] = "Invalide Regix";
                }
            }
            $response['value'] = 1;

    }
    else{
        $response['error'] = "Content is not Json Data";
    }
    
    echo json_encode($response);
}
$method = strtolower($_SERVER["REQUEST_METHOD"]);
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$params = json_decode(file_get_contents('php://input'),true);
Use__Api($contentType,$method,$params);


