<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class AdminController extends Controller
{
    //
    public function createSubject(){
        $subjects = Subject::all();
        return view ('admin.createSubject', compact('subjects'));
    }

    public function storeSubject(Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->code = $request->code;
        $subject->save();

        return redirect()->route('admin.createSubject')->with('success', 'Subject created successfully');
    }

    public function notification(){
        return view ('admin.notification');
    }

    public function classNotification(){
        return view ('admin.notification.class');
    }
}
