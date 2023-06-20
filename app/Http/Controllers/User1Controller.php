<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\User1Service;
use App\Services\User2Service;

Class User1Controller extends Controller{
    use ApiResponser;

    public $user1Service;
    public $user2Service;

    public function __construct(User1Service $user1Service, User2Service $user2Service){
        $this->user1Service = $user1Service;
        $this->user2Service = $user2Service;
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function index(){ 
    
        return $this->successResponse($this->user1Service->obtainUsers1());

    }

    public function add(Request $request){

        if ($request->jobid <= 3)
        {
            $this->user1Service->obtainUserJob($request->jobid);
        }
        else
        {
            $this->user2Service->obtainUserJob($request->jobid);
        }

        return $this->successResponse($this->user1Service->createUser1($request->all(),Response::HTTP_CREATED));
    }

    public function getError(Request $request){
        return $request->code;
    }


    
    public function getID1($id){
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }


    public function addUser1(Request $request ){
        return $this->successResponse($this->user1Service->createUser1($request->all(),Response::HTTP_CREATED));
    }


    public function updateUser1(Request $request, $id){
        return $this->successResponse($this->user1Service->editUser1($request->all(), $id));
    }


    public function deleteUser1($id){
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }
}