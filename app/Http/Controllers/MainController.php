<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth'])->except(['essaie', 'dashboard']);
    }
    public function essaie()
    {
        $category=category::with('article')->simplePaginate(3);
        $article=article::with('category')->simplePaginate(5);
      
        return view('essaie', compact(['category','article']));
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
    public function see_by_category(Request $request)
    {
        $category= category::find($request->id);
        $articles= article::where('category_id',$request->id)->get();
        return view('category.itemsByCategory', compact('category','articles'));
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
            'nom'=>['bail','required','min:3','max:15','unique:articles'],
            'content'=>['bail','required','min:3','max:200'],
            'photo_path'=>['bail','required']
        ]);

        $pictureName= time() .'.'. $request->file('photo_path')->extension();
        $article= article::find($request->id);
       
        $article->nom=$request->nom;
        $article->content=$request->content;
        $article->photo_path=$pictureName;
        $article->save();
         
       
        $request->file('photo_path')->storeAs(
            'photo_items',
            $pictureName,
            'public'
        );
        return to_route('dashboard');
    }

     public function create_article( )
    { 
        $category= category::with('article')->get();
        return view('article.createArticle',compact('category'));
        
    }
    public function redirectorArticle(Request $request)
    {
     
        $request->validate([
            'nom'=>['bail','required','min:3','max:15'],
            'content'=>['bail','required','min:3','max:200'],
            'category'=>['required'],
            'photo_path'=>['required']
        ]);
       
        $pictureName= time() .'.'. $request->file('photo_path')->extension();
    
        $request->file('photo_path')->storeAs(
            'photo_items',
            $pictureName,
            'public'
        );

        article::create(
            [
                'nom'=>$request->nom,
                'content'=>$request->content,
                'category_id'=>$request->category,
                'photo_path'=> $pictureName
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
