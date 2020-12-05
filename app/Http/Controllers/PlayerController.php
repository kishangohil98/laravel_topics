<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\Validator;
use DB;


class PlayerController extends Controller
{
    public function index(Request $request){
    
        //$pdo = DB::connection()->getPdo();
        try{
            // $pdo = DB::connection()->getPdo();  
            // return json_encode($pdo);
            if(DB::connection()->getPdo()){
                // return "Connected successfully to database: ".DB::connection()->getDatabaseName();
                $messages = [
                    'required' => 'The :attribute field is required.',
                    'unique' => 'The email has already been taken in Database.',
                    'date'=> 'Enter Date in this format: YYYY-MM-DD',
                    'email' =>'We need to know your Email address for proceed further.'
                ];
        
                $rule = [
                    'name' => 'required|alpha|min:3|max:20',
                    'age' => 'required|numeric|between:0,100',
                    'email' => 'required|email:rfc,dns|unique:players,email',
                    'dob' => 'required|date',
                ];
        
                $validator = Validator::make($request->all(), $rule, $messages );
                $response=null;
        
                if ($validator->fails()) {
                    return response()->json(['status'=> 'fail' ,'code'=> '422','errors'=>$validator->errors(),'response'=>$response], 422);
                    //return response()->json(['code' => '400', 'errors' => $validator->errors()])->with('sfs'=>'sdf');
                }
        
                //return 'Validated data is here';
                $user = Player::create(
                    ['name' => $request->name, 'age' => $request->age,'email' => $request->email,'dob' => $request->dob]
                );
                $response['message'] = 'Data inserted successfully!';
            
                return response()->json(['status'=>'success','code'=>'200','response'=> $response,'errors'=>$validator->errors()],200);
                            
                } 
                else{
                    return "You are not connected to database";
                }
        }
        catch(\PDOException $e)
        {
            return 'Databas enot available:';
        }


    }

    //for adding data in player table
    public function addPlayer(){
        $user = Player::create(
            ['name' => 'Name Again', 'age' => '25','email' => 'sample3@email.com','dob' => '1998-10-05']
        );
        return 'Executed';

    }
}
