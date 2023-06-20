<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\User2Service;

Class User2Controller extends Controller{
    use ApiResponser;

    public $user2Service;

    public function __construct(User2Service $user2Service){
        $this->user2Service = $user2Service;
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    public function index(){ 
        return $this->successResponse($this->user2Service->obtainUsers2());
    }


    public function getID2($id){
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }


    public function addUser2(Request $request ){
        return $this->successResponse($this->user2Service->createUser2($request->all(),Response::HTTP_CREATED));
    }


    public function updateUser2(Request $request, $id){
        return $this->successResponse($this->user2Service->editUser2($request->all(), $id));
    }


    public function deleteUser2($id){
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}