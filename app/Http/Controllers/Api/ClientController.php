<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function index(Client $client): JsonResponse{
        return response()->json([
           'message' => 'Todos Clientes',
           'client' => $client->all()
        ], 200);
    }

    function store(ClientRequest $request): JsonResponse{
       
        $clientValidated = $request->validated();
        
        try{
             Client::create([
                'name' => $clientValidated['name'],
                'telefone' => $clientValidated['telefone'],
                'document' => $clientValidated['document']
            ]);
    
    
            return response()->json([
                'message' => 'Cliente criado com sucesso',
                'status' => true,
                "client" =>  $clientValidated,
             ], 201);
             
        }catch(Exception $e){
            return response()->json([
                'message' => 'Não foi possivel criar o cliente',
                "status" =>  false,
                'error' => $e->getMessage(),
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

    function update(Client $client, ClientRequest $request): JsonResponse{
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
