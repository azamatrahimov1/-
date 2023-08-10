<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatalogOfArticle extends Controller
{
    public function index()
    {
        $articles = \App\Models\CatalogOfArticle::all();
        if ($articles->count() > 0) {
            return response()->json([
                'status' => 200,
                'CatalogOfArticles' => $articles
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
            $article = \App\Models\CatalogOfArticle::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $request->image,
                'count' => $request->count

            ]);

            if (article) {

                return response()->json([
                    'status' => 200,
                    'message' => "CatalogOfArticle Created Successfully"
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
        $article = \App\Models\CatalogOfArticle::find($id);
        if ($article) {

            return response()->json([
                'status' => 200,
                'CatalogOfArticle' => $article
            ], 200);
        }else {

            return response()->json([
                'status' => 404,
                'message' => "No such CatalogOfArticle Found!"
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

            $article = \App\Models\CatalogOfArticle::find($id);
            if ($article) {
                $article->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $request->image,
                    'count' => $request->count
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "CatalogOfArticle Updated Successfully"
                ], 200);
            }else {

                return response()->json([
                    'status' => 404,
                    'message' => "No Such CatalogOfArticle Found!"
                ], 404);
            }
        }
    }

    public function destroy($id)
    {
        $article = \App\Models\CatalogOfArticle::find($id);
        if ($article) {

            $article->delete();
            return response()->json([
                'status' => 200,
                'message' => "CatalogOfArticle Deleted Successfully"
            ], 200);
        }else {

            return response()->json([
                'status' => 404,
                'message' => "No such CatalogOfArticle Found!"
            ], 404);
        }
    }
}
