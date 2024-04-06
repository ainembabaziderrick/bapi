<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Carbon\Carbon;

class SectionController extends Controller
{

    public function Index(){
        $section = Section::latest()->get();
        return response()->json($section);
     }

    public function Store(Request $request){
        
        $validateData = $request->validate([
            'section_name' => 'required|unique:sections|max:25'
        ]);
    
        Section::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now(),
        ]);
    
        return response('Student Section inserted successfully');
    
      }

      public function Edit($id){
        $section = Section::findOrFail($id);
        return response()->json($section);
      }

      public function Update(Request $request, $id){
        $section = Section::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now(),
        ]);
        return response('Student Section Updated successfully');
      }

      public function Delete($id){
        $section = Section::findOrFail($id)->delete();
        return response('Student Section Deleted successfully');
      }
    

}
