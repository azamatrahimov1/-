<?php

namespace App\Http\Controllers;

use App\Models\CatalogOfArticle;


class CatalogOfArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Query builder
        //$articles = DB::table('CatalogOfArticle')->paginate(5);

        $articles = CatalogOfArticle::paginate(4);
        return view('CatalogOfArticles', compact('articles'));
    }

    public function show($slug)
    {
        /** update count */
        $article = CatalogOfArticle::find($slug);
        $update = [
            'count' => $article->count + 1,
        ];
        CatalogOfArticle::where('id', $article->id)->update($update);

        $articles = CatalogOfArticle::find($slug);

        return view('showCatalog', compact('articles'));
    }

    public function CatalogCount()
    {

    }

}
