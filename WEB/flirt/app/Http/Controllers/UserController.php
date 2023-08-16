<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Laravel\Firebase\Facades\Firebase;

class UserController extends Controller
{
    function index( )
    {
        return UserResource::collection(User::all());
    }

    public  function store(StoreUserRequest $request){

    $datas = $request->all();
    $datas['password'] = Hash::make($request->password);

    $data = User::create($datas);
       return new UserResource($data);
    }

    function show($id){
        $data = User::where('id',$id)->first();
        return new UserResource($data);
    }

    function update(UpdateUserRequest $request,$id){

        $data = User::where('id',$id)->first();
        $data->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "description"=>$request->description
        ]);

        return new UserResource($data);
    }


}
