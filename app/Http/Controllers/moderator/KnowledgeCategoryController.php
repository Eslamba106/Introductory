<?php

namespace App\Http\Controllers\moderator;

use Illuminate\Http\Request;
use App\Models\KnowledgeCategory;
use App\Http\Controllers\Controller;

class KnowledgeCategoryController extends Controller
{
    public function index(){
        $knowledge_categories = KnowledgeCategory::paginate(); 
        // $knowledge_categories = KnowledgeCategory::paginate(); 

        return view('moderator.knowledge_categories.index' , compact('knowledge_categories'));
    }

    public function store(Request $request){

        $request->validate(['name' => "required"]);
        // dd($request);
        KnowledgeCategory::create([
            "name" => $request->name,
        ]);
        return redirect()->route('user.knowledge_categories.index');
    }

    public function update(Request $request){

        $knowledge_categories =  KnowledgeCategory::findOrFail($request->id);
        $request->validate(['name' => "required"]);
        $knowledge_categories->update([
            "name" => $request->name,
        ]);
        return redirect()->route('user.knowledge_categories.index');
    }
    public function delete(Request $request){

        // dd($request->id);
        $knowledge_categories = KnowledgeCategory::findOrFail($request->id);
        $knowledge_categories->delete();

        return redirect()->route('user.knowledge_categories.index')->with('delete_department');
    }
}

