<?php

namespace App\Http\Controllers;

use App\Month;
use Illuminate\Http\Request;

class MonthsController extends Controller
{
    public function create(Request $request){

        $request->validate([
            'month_name' => 'required',
        ]);

        $month = new Month();
        $month->month_name = $request->month_name;

        if ($month->save()){
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
            'month_name' => 'required'
        ]);

        $month = Month::find($id);

        if (!empty($month)){
            $month->month_name = $request->month_name;

            if ($month->save()){
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
                'message' => 'No Month by this id'
            ]);
        }
    }

    public function destroy($id){
        $month = Month::find($id);

        if (!empty($month)){

            if ($month->delete()){
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
                'message' => 'No Month by this id'
            ]);
        }
    }

    public function index(){
        $months = Month::all();

        if (count($months) > 0){
            return response()->json([
                'success' => true,
                'data' => $months
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'No Months'
            ]);
        }
    }

    public function getById($id){

        $month = Month::find($id);

        if (empty($month)){
            return response()->json([
                'success' => false,
                'message' => 'no Month by this id',
            ]);
        }
        else {
            return response()->json([
                'success' => true,
                'data' => $month
            ]);
        }
    }

    public function days($id){
        $month = Month::find($id);

        if (empty($month)){
            return response()->json([
                'success' => false,
                'message' => 'no employe by this id',
            ]);
        }
        else {
            $days = $month->days()->get();

            if (count($days) == 0){
                return response()->json([
                    'success' => false,
                    'message' => 'no days in this month',
                ]);
            }
            else{
                return response()->json([
                    'success' => true,
                    'data' => $days
                ]);
            }
        }
    }
}
