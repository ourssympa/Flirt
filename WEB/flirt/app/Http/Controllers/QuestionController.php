<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use http\Env\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas= Question::all();

        return QuestionResource::collection($datas);
    }

    public function sortBy(string $categorie){
        $datas = Question::where('categorie',$categorie)->get();
        if(sizeof($datas)>0){
            return QuestionResource::collection($datas);
        }
        else{
            $datas= Question::all();
            return QuestionResource::collection($datas);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        Question::create($request->all());

        return response()->json([
            "message"=>"question ajouter"
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Question::where('id',$id)->first();
        $data= new QuestionResource($data);
        return response()->json([
           "data"=> $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        $data = Question::where('id',$id)->first();


        if($data){
            $data->update(
                $request->all()
            );
        }else{
            return response()->json([
                "message"=> "donnée introuvable"
            ]);
        }
        return response()->json([
            "message"=> "question mise a jour"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Question::findOrFail($id);
       if($data){
           $data->delete();
       }else{
           return response()->json([
               "message"=> "donnée introuvable"
           ]);
       }




        return response()->json([
            "message"=> "question supprimer"
        ]);
    }
}
