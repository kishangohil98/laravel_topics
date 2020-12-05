<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\DB;


class DataController extends Controller
{
    public function index(Request $request){
        $request->session()->put('city', 'vadodara');
        $request->session()->put('name', 'sample');
        //$request->session()->flash('status', 'Task was successful!');
            
        //dd($request->session()->get('name'));
        return $request->session()->all();
    }

    public function department(){
        //Department::create(['dept_name' => 'New ABC' , 'dept_type' => 'XYZ']);
        
        // $dept = new Department();
        // $dept->dept_name = 'ABC';
        // $dept->dept_type = 'XYZ';
        // $dept->save();

        Department::insert([
            ['dept_name' => 'Sample4' , 'dept_type' => 'Sample2 type'],
            ['dept_name' => 'Sample5' , 'dept_type' => 'Sample3 type'],
        ]);

        return 'Executed';
    }

    public function employee(){

        DB::table('employees')->insert([
            ['department_id' => '1' , 'emp_name' => 'Kishan Gohil', 'emp_age'=>'22'],
            ['department_id' => '2' , 'emp_name' => 'Jay Patel', 'emp_age'=>'22'],
            ]);

        return 'Executed Employee';
    }

    public function getEmployee($id){
        $employees = Department::find($id)->with('employees')->get();

        foreach ($employees as $emp){
            dd($emp->toArray());
        }

    }

}
