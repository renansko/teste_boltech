<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientContatoRequest as RequestsClientContatoRequest;
use App\Http\Requests\ClientContatoRequestRequest;
use App\Models\ClientContato;
use App\Models\ClientContatoRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientContatoController extends Controller
{
    function index(ClientContato $clientContato): JsonResponse{
        return response()->json([
           'message' => 'Todos ClientContatoRequestes',
           'clientcontatorequest' => $clientContato->all()
        ], 200);
    }

    function store(RequestsClientContatoRequest $request): JsonResponse{
       
        $clientContatoRequestValidated = $request->validated();
        
        try{
             ClientContato::create([
                'valor' => $clientContatoRequestValidated['valor'],
                'tipo' => $clientContatoRequestValidated['tipo'],
                'principal' => $clientContatoRequestValidated['principal'],
                'client_id' => $clientContatoRequestValidated['client_id']

            ]);
    
    
            return response()->json([
                'message' => 'Contato do cliente criado com sucesso',
                'status' => true,
                "clientcontatorequest" =>  $clientContatoRequestValidated,
             ], 201);
             
        }catch(Exception $e){
            return response()->json([
                'message' => 'Não foi possivel criar o contato do cliente',
                "status" =>  false,
                'error' => $e->getMessage(),
             ], 400);
        }
       
    }

    function show($id): JsonResponse{
        // try{
        //     $clientcontatorequest = ClientContatoRequest::findOrFail($id);

        //     return response()->json([
        //         'message' => 'ClientContatoRequeste retornado: ',
        //         'clientcontatorequest' => $clientcontatorequest
        //      ], 200);
        // }catch(Exception $e) {
        //     return response()->json([
        //         'message' => 'Não foi possivel encontrar o clientcontatorequeste com essa id',
        //         "status" =>  false,
        //      ], 400);
        // }
       
    }

    function update(ClientContatoRequest $clientcontatorequest, ClientContatoRequestRequest $request): JsonResponse{
        // try{

        //     $clientcontatorequest->update([
        //         'name' => $request->name,
        //         'telefone' => $request->telefone,
        //     ]); 
   
        //        return response()->json([
        //            'message' => 'ClientContatoRequeste editado com sucesso',
        //            "status" => true,
        //            'clientcontatorequest' => $clientcontatorequest
        //         ], 200);
        //    }catch(Exception $e) {
        //        return response()->json([
        //            'message' => 'Não foi possivel editar o clientcontatorequeste com essa id',
        //            "status" =>  false,
        //         ], 400);
        //    }
    }

    function destroy(ClientContatoRequest $clientcontatorequest): JsonResponse{
        // try{

        //  $clientcontatorequest->delete(); 

        //     return response()->json([
        //         'message' => 'Data retrieved successfully',
        //         'clientcontatorequest' => $clientcontatorequest
        //      ], 200);
        // }catch(Exception $e) {
        //     return response()->json([
        //         'message' => 'Não foi possivel deletar o clientcontatorequeste com essa id',
        //         "status" =>  false,
        //      ], 400);
        // }
    }
}
