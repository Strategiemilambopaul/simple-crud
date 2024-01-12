<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth'])->except(['essaie', 'dashboard']);
    }
    public function essaie()
    {
        $category=category::all();
        $articles=article::all();
        return view('essaie', compact(['category','articles']));
    }
    public function update_category(Request $request )
    {
        $category= category::find($request->id);
        return view('category.updateCategory', compact('category'));
        
    }
    public function after_updating_category(Request $request)
    {
        $request->validate([
            'titre'=>['bail','required','min:3','max:15','unique:categories'],
            'content'=>['bail','required','min:3','max:200']
        ]);
        $category= category::find($request->id);
        $category->titre=$request->titre;
        $category->content=$request->content;
        $category->save();
        return to_route('dashboard');
    }

     public function create_category( )
    { 
        return view('category.createCategory');
        
    }
    public function redirectorCategory(Request $request)
    {
       
        $request->validate([
            'titre'=>['bail','required','min:3','max:15','unique:categories'],
            'content'=>['bail','required','min:3','max:200']
        ]);
        category::create(
            [
                'titre'=>$request->titre,
                'content'=>$request->content
            ]
            );   
        return to_route('dashboard');
    }

    public function delete_category(Request $request)
    {
        $category = category::find($request->id);
        $category->delete();
        return to_route('dashboard');
    }
    
    public function update_article(Request $request )
    {
        $article= article::find($request->id);
        return view('article.updateArticle', compact('article'));
        
    }
    public function after_updating_article(Request $request)
    {
        $request->validate([
            'titre'=>['bail','required','min:3','max:15','unique:categories'],
            'content'=>['bail','required','min:3','max:200']
        ]);
        $article= article::find($request->id);
        $article->titre=$request->titre;
        $article->content=$request->content;
        $article->save();
        return to_route('dashboard');
    }

     public function create_article( )
    { 
        $category= category::all();
        return view('article.createArticle',compact('category'));
        
    }
    public function redirectorArticle(Request $request)
    {
        // dd($request->file("photo_path"));
    
        $request->validate([
            'nom'=>['bail','required','min:3','max:15'],
            'content'=>['bail','required','min:3','max:200'],
            'category'=>['required'],
            'photo_path'=>['required']
        ]);


        // $request->file('photo_path')->storeAs([
        //     'photo_items',
        //     $request->photo_path,
        //     'public'
        // ]);

        article::create(
            [
                'nom'=>$request->nom,
                'content'=>$request->content,
                'category_id'=>$request->category,
                'photo_path'=>$request->photo_path
            ]
            ); 
        
       
        
        return to_route('dashboard');
    }

    public function delete_article(Request $request)
    {
        $article = article::find($request->id);
        $article->delete();
        return to_route('dashboard');
    }

  
    
}
