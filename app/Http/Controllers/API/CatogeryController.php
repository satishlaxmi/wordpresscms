<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Catogery;
class CatogeryController extends Controller
{
    public function add(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        if( $validated){
            $post = new Catogery([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'parent' => $request->input('parent'),
            ]);
            $post->save();
            if($post){
                return response()->json('The catogery was successfully added');
    
            }else{
                return response()->json('Something Went wrong');
    
            } 
        }
        
    }
    public function getCatogeries(){
        $categories = Catogery::get();
        if($categories){
            return $categories; 
        } else {
            return response()->json('There are no categories.');
        }
    }
    
}
