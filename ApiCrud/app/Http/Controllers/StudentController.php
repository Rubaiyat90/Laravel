<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    private $getStudents;

    public function __construct(StudentService $getStudents)
    {
        $this->getStudents=$getStudents;
    }

    public function index()
    {
        try
        {
            $studentRecord=$this->getStudents->getStudents();

            return response()->json([
                'status'=>true,
                'message'=>'student retrieved successfully',
                'data'=>$studentRecord,
            ], 200);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'=>false,
                'message'=>'failed. please try again',
                'error'=>$e->getMessage(),
            ], 500);
        }
    }


    public function store(Request $request)
    {
        try{
            $validatedData=$request->validate([
                'name'=>'required|string',
                'phone'=>'required|string'
            ]);
            $studentRecord=$this->getStudents->getstore($validatedData);

            return response()->json([
                'status'=>true,
                'message'=>'student inserted successfully',
                'data'=>$studentRecord
            ], 200);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'=>false,
                'message'=>'failed. please try again',
                'error'=>$e->getMessage(),
            ], 500);
        }
            
    }

    public function edit(string $id)
    {
        try {
            $studentRecord = $this->getStudents->getfindById($id);
    
            if (!$studentRecord) {
                return response()->json([
                    'status' => false,
                    'message' => 'Student record not found.',
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Retrieve Student record for editing.',
                'data' => $studentRecord,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve student record for editing. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'string',
                'phone' => 'string',
            ]);
    
            $studentRecord = $this->getStudents->getupdate($id, $validatedData);
    
            return response()->json([
                'status' => true,
                'message' => 'Student updated successfully.',
                'data' => $studentRecord,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'student update failed.',
                'data' => $e->getMessage(),
            ], 500);
        }
    }


    public function destroy(string $id)
    {
        try{
            $studentRecord = $this->getStudents->getdestroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Student record deleted successfully',
            ], 200);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status'=>false,
                'message'=>'failed. please try again',
                'error'=>$e->getMessage(),
            ], 500);
        }
    }
}
