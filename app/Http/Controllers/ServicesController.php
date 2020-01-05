<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function create(Request $request){

        $request->validate([
            'service_name' => 'required'
        ]);

        $service = new Service();
        $service->service_name = $request->service_name;

        if ($service->save()){
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
            'service_name' => 'required'
        ]);

        $service = Service::find($id);

        if (!empty($service)){
            $service->service_name = $request->service_name;

            if ($service->save()){
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
                'message' => 'No Service by this id'
            ]);
        }
    }

    public function destroy($id){
        $service = Service::find($id);

        if (!empty($service)){

            if ($service->delete()){
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
                'message' => 'No Service by this id'
            ]);
        }
    }

    public function index(){
        $services = Service::all();

        if (count($services) > 0){
            return response()->json([
                'success' => true,
                'data' => $services
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'No Services'
            ]);
        }
    }

    public function getById($id){

        $service = Service::find($id);

        if (empty($service)){
            return response()->json([
                'success' => false,
                'message' => 'no Service by this id',
            ]);
        }
        else {
            return response()->json([
                'success' => true,
                'data' => $service
            ]);
        }
    }

    public function pourcentages($id){
        $service = Service::find($id);

        if (empty($service)){
            return response()->json([
                'success' => false,
                'message' => 'no service by this id',
            ]);
        }
        else {
            $pourcentages = $service->pourcentages()->get();

            if (count($pourcentages) == 0){
                return response()->json([
                    'success' => false,
                    'message' => 'no pourcentages for this service',
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
