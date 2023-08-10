<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainPage extends Controller
{
    public function index()
    {
        $mains = \App\Models\MainPage::all();
        if ($mains->count() > 0) {
            return response()->json([
                'status' => 200,
                'MainPages' => $mains
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Record Found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'count' => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else {
            $main = \App\Models\MainPage::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $request->image,
                'count' => $request->count

            ]);

            if (article) {

                return response()->json([
                    'status' => 200,
                    'message' => "MainPage Created Successfully"
                ], 200);
            }else {

                return response()->json([
                    'status' => 500,
                    'message' => "Something Went Wrong"
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $main = \App\Models\MainPage::find($id);
        if ($main) {

            return response()->json([
                'status' => 200,
                'MainPage' => $main
            ], 200);
        }else {

            return response()->json([
                'status' => 404,
                'message' => "No such MainPage Found!"
            ], 404);
        }
    }


    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'count' => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else {

            $main = \App\Models\MainPage::find($id);
            if ($main) {
                $main->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $request->image,
                    'count' => $request->count
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "MainPage Updated Successfully"
                ], 200);
            }else {

                return response()->json([
                    'status' => 404,
                    'message' => "No Such MainPage Found!"
                ], 404);
            }
        }
    }

    public function destroy($id)
    {
        $main = \App\Models\MainPage::find($id);
        if ($main) {

            $main->delete();
            return response()->json([
                'status' => 200,
                'message' => "MainPage Deleted Successfully"
            ], 200);
        }else {

            return response()->json([
                'status' => 404,
                'message' => "No such MainPage Found!"
            ], 404);
        }
    }
}
