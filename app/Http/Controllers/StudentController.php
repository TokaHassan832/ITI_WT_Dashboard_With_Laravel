<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return view('admin.students.index',["students"=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        return view('admin.students.create',["departments"=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $img=$request->file('image');
        $ext=$img->getClientOriginalExtension();
        $image_name="student$request->id.$ext";
        $img->move(public_path('images/students'),$image_name);

        Student::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'department_id'=>$request->department,
            'image'=>$image_name
        ]);
        return redirect()->back()->with('msg','added successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::findorfail($id);
        return view('admin.students.show',["student"=>$student]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments=Department::all();
        $student=Student::findorfail($id);
        return view('admin.students.edit',['departments'=>$departments,'student'=>$student]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student=Student::findorfail($id);
        $attributes= $request->validate([
            'id'=>['required','integer',Rule::unique('students','id')->ignore($student)],
            'name'=>['required','max:50','alpha'],
            'email'=>['required','max:255','email',Rule::unique('students','email')->ignore($student)],
            'phone'=>['required','digits:11',Rule::unique('students', 'phone')->ignore($student)],
            'department'=>['required', Rule::exists('departments', 'id')]
        ]);

        $student->update($attributes);
        return redirect(route('students.index'))->with('msg','updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::findorfail($id);
        $student->delete();
        return redirect(route('students.index'))->with('msg','deleted successfully..');
    }

    public function archive(){
        $students=Student::onlyTrashed()->get();
        return view('admin.students.archive',['students'=>$students]);
    }

    public function restore($id){
        $student=Student::withTrashed()->findOrFail($id);
        $student->restore();
        return redirect(route('students.index'))->with('msg','restored successfully..');
    }

    public function forceDestroy($id){
        $student=Student::withTrashed()->findOrFail($id);
        $student->forceDelete();
        return redirect(route('students.index'))->with('msg','student permanently deleted successfully..');
    }
}
