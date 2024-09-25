<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    function index(Client $client): JsonResponse{
        return response()->json([
           'message' => 'Todos Clientes',
           'client' => $client->all()
        ], 200);
    }

    function store(Request $request): JsonResponse{
        
        try{
            $client = Client::create([
                'name' => $request->name,
                'telefone' => $request->telefone,
            ]);
    
    
            return response()->json([
                'message' => 'Cliente criado com sucesso',
                'status' => true,
                "client" =>  $client,
             ], 201);
             
        }catch(Exception $e){
        
            return response()->json([
                'message' => 'Não foi possivel criar o cliente',
                "status" =>  false,
             ], 400);
        }
       
    }

    function show($id): JsonResponse{
        try{
            $client = Client::findOrFail($id);

            return response()->json([
                'message' => 'Cliente retornado: ',
                'client' => $client
             ], 200);
        }catch(Exception $e) {
            return response()->json([
                'message' => 'Não foi possivel encontrar o cliente com essa id',
                "status" =>  false,
             ], 400);
        }
       
    }

    function update(Client $client, Request $request): JsonResponse{
        try{
            

            $client->update([
                'name' => $request->name,
                'telefone' => $request->telefone,
            ]); 
   
               return response()->json([
                   'message' => 'Cliente editado com sucesso',
                   "status" => true,
                   'client' => $client
                ], 200);
           }catch(Exception $e) {
               return response()->json([
                   'message' => 'Não foi possivel editar o cliente com essa id',
                   "status" =>  false,
                ], 400);
           }
    }

    function destroy(Client $client): JsonResponse{
        try{

         $client->delete(); 

            return response()->json([
                'message' => 'Data retrieved successfully',
                'client' => $client
             ], 200);
        }catch(Exception $e) {
            return response()->json([
                'message' => 'Não foi possivel deletar o cliente com essa id',
                "status" =>  false,
             ], 400);
        }
    }
}
