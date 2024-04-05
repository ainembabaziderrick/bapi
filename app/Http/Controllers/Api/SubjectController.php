<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{

    public function Index(){
        $subject = Subject::latest()->get();
        return response()->json($subject);
     }

public function Store(Request $request){
    $validateData = $request->validate([
        'class_id' => 'required',
        'subject_name' => 'required|unique:subjects|max:25'
    ]);

    Subject::insert([
        'class_id' => $request->class_id,
        'subject_name' => $request->subject_name,
        'subject_code' => $request->subject_code,
    ]);

    return response('Student Subject inserted successfully');
}

public function Edit($id){
    $subject = Subject::findOrFail($id);
    return response()->json($subject);
  }

  public function Update(Request $request, $id){
    $subject = Subject::findOrFail($id)->update([
        'class_id' => $request->class_id,
        'subject_name' => $request->subject_name,
        'subject_code' => $request->subject_code,
    ]);
    return response('Student Subject Updated successfully');
  }

  public function Delete($id){
    $subject = Subject::findOrFail($id)->delete();
    return response('Student Subject Deleted successfully');
  }

}
