<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function uploadStudent(Request $request)
    {
        $student = new student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $image=$request->file;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('student',$imagename);
            $student->image=$imagename;
        }
        

        $student->save();

        return redirect()->back();
    }
    public function showStudent()
    {
        $data = student::all();
        return view('showStudent',compact('data'));
    }
    public function deleteStudent($id)
    {
        $data=student::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function searchStudent(Request $request)
    {
        $search = $request->search;
        $data=student::where('name','Like','%'.$search.'%')->get();

        return view('showStudent', compact('data'));
    }
    public function update($id)
    {
        $student = student::find($id);
        return view('updateStudent', compact('student'));
    }
    public function update_student(Request $request,$id)
    {
        $student=student::find($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $image=$request->file;
        if ($image) {
        $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('student',$imagename);
            $student->image=$imagename;
        }
        $student->save();
        return redirect('showStudent');
    }
}
