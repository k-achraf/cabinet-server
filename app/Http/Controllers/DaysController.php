<?php

namespace App\Http\Controllers;

use App\Day;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    public function create(Request $request){

        $request->validate([
            'day_value' => 'required',
            'month_id' => 'required'
        ]);

        $day = new Day();
        $day->day_value = $request->day_value;
        $day->month_id = $request->month_id;

        if ($day->save()){
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
            'day_value' => 'required',
            'month_id' => 'required'
        ]);

        $day = Day::find($id);

        if (!empty($day)){
            $day->day_value = $request->day_value;
            $day->month_id = $request->month_id;

            if ($day->save()){
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
                'message' => 'No Day by this id'
            ]);
        }
    }

    public function destroy($id){
        $day = Day::find($id);

        if (!empty($day)){

            if ($day->delete()){
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
                'message' => 'No Day by this id'
            ]);
        }
    }

    public function index(){
        $days = Day::all();

        if (count($days) > 0){
            return response()->json([
                'success' => true,
                'data' => $days
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'No Days'
            ]);
        }
    }

    public function getById($id){

        $day = Day::find($id);

        if (empty($day)){
            return response()->json([
                'success' => false,
                'message' => 'no Day by this id',
            ]);
        }
        else {
            return response()->json([
                'success' => true,
                'data' => $day
            ]);
        }
    }

    public function month($id){
        $day = Day::find($id);

        if (empty($day)){
            return response()->json([
                'success' => false,
                'message' => 'no day by this id',
            ]);
        }
        else {
            $month = $day->month()->get();

            if (count($month) == 0){
                return response()->json([
                    'success' => false,
                    'message' => 'this day don\'t belong to any month',
                ]);
            }
            else{
                return response()->json([
                    'success' => true,
                    'data' => $month[0]
                ]);
            }
        }
    }
}
