<?php

namespace App\Http\Controllers;

use App\Employe;
use Illuminate\Http\Request;

class EmployesController extends Controller
{

    public function create(Request $request){

        $request->validate([
            'employe_name' => 'required'
        ]);

        $employe = new Employe();
        $employe->employe_name = $request->employe_name;

        if ($employe->save()){
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
            'employe_name' => 'required'
        ]);

        $employe = Employe::find($id);

        if (!empty($employe)){
            $employe->employe_name = $request->employe_name;

            if ($employe->save()){
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
                'message' => 'No Employe by this id'
            ]);
        }
    }

    public function destroy($id){
        $employe = Employe::find($id);

        if (!empty($employe)){

            if ($employe->delete()){
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
                'message' => 'No Employe by this id'
            ]);
        }
    }

    public function index(){
        $employes = Employe::all();

        if (count($employes) > 0){
            return response()->json([
                'success' => true,
                'data' => $employes
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'No employes'
            ]);
        }
    }

    public function getById($id){

        $emloye = Employe::find($id);

        if (empty($emloye)){
            return response()->json([
                'success' => false,
                'message' => 'no employe by this id',
            ]);
        }
        else {
            return response()->json([
                'success' => true,
                'data' => $emloye
            ]);
        }
    }

    public function pourcentages($id){
        $employe = Employe::find($id);

        if (empty($employe)){
            return response()->json([
                'success' => false,
                'message' => 'no employe by this id',
            ]);
        }
        else {
            $pourcentages = $employe->pourcentages()->get();

            if (count($pourcentages) == 0){
                return response()->json([
                    'success' => false,
                    'message' => 'no pourcentages for this employe',
                ]);
            }
            else{
                return response()->json([
                    'success' => true,
                    'data' => $pourcentages
                ]);
            }
        }
    }
}
