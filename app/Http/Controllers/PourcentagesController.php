<?php

namespace App\Http\Controllers;

use App\Pourcentage;
use Illuminate\Http\Request;

class PourcentagesController extends Controller
{
    public function create(Request $request){

        $request->validate([
            'pourcentage_value' => 'required',
            'service_id' => 'required',
            'employe_id' => 'required'
        ]);

        $pourcentage = new Pourcentage();
        $pourcentage->pourcentage_value = $request->pourcentage_value;
        $pourcentage->service_id = $request->service_id;
        $pourcentage->employe_id = $request->employe_id;

        if ($pourcentage->save()){
            return response()->json([
                'success' => true,
                'message' => 'Added successfully'
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Technical error'
            ]);
        }
    }

    public function edit(Request $request , $id){

        $request->validate([
            'pourcentage_value' => 'required',
            'service_id' => 'required',
            'employe_id' => 'required'
        ]);

        $pourcentage = Pourcentage::find($id);

        if (!empty($pourcentage)){
            $pourcentage->pourcentage_value = $request->pourcentage_value;
            $pourcentage->service_id = $request->service_id;
            $pourcentage->employe_id = $request->employe_id;

            if ($pourcentage->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Edited successfully'
                ]);
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => 'Technical error'
                ]);
            }
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'No Pourcentage by this id'
            ]);
        }
    }

    public function destroy($id){
        $pourcentage = Pourcentage::find($id);

        if (!empty($pourcentage)){

            if ($pourcentage->delete()){
                return response()->json([
                    'success' => true,
                    'message' => 'Deleted successfully'
                ]);
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => 'Technical error'
                ]);
            }
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'No Pourcentage by this id'
            ]);
        }
    }

    public function index(){
        $pourcentage = Pourcentage::all();

        if (count($pourcentage) > 0){
            return response()->json([
                'success' => true,
                'data' => $pourcentage
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'No Pourcentages'
            ]);
        }
    }

    public function getById($id){

        $pourcentage = Pourcentage::find($id);

        if (empty($pourcentage)){
            return response()->json([
                'success' => false,
                'message' => 'no Pourcentage by this id',
            ]);
        }
        else {
            return response()->json([
                'success' => true,
                'data' => $pourcentage
            ]);
        }
    }

    public function service($id){
        $pourcentage = Pourcentage::find($id);

        if (empty($pourcentage)){
            return response()->json([
                'success' => false,
                'message' => 'no pourcentage by this id',
            ]);
        }
        else {
            $service = $pourcentage->service()->get();

            if (count($service) == 0){
                return response()->json([
                    'success' => false,
                    'message' => 'no service in this pourcentage',
                ]);
            }
            else{
                return response()->json([
                    'success' => true,
                    'data' => $service[0]
                ]);
            }
        }
    }

    public function employe($id){
        $pourcentage = Pourcentage::find($id);

        if (empty($pourcentage)){
            return response()->json([
                'success' => false,
                'message' => 'no pourcentage by this id',
            ]);
        }
        else {
            $employe = $pourcentage->employe()->get();

            if (count($employe) == 0){
                return response()->json([
                    'success' => false,
                    'message' => 'no service in this pourcentage',
                ]);
            }
            else{
                return response()->json([
                    'success' => true,
                    'data' => $employe[0]
                ]);
            }
        }
    }
}
