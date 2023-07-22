<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;
use Illuminate\Support\Facades\Crypt;

class StudentController extends Controller
{
    private $getStudents;
    private $getstore;
    private $getUpdate;
    private $getfindById;
    private $getdestroy;

    public function __construct(StudentService $getStudents, StudentService $getstore, StudentService $getUpdate,StudentService $getfindById, StudentService $getdestroy)
    {
        $this->getStudents=$getStudents;
        $this->getstore=$getstore;
        $this->getupdate=$getUpdate;
        $this->getfindById=$getfindById;
        $this->getdestroy=$getdestroy;
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
                'id'=>'required|integer',
                'name'=>'required|string',
                'phone'=>'required|string'
            ]);
            $studentRecord=$this->getstore->getstore($validatedData);

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
        try{
            $studentRecord=$this->getfindById->getfindById($id);

            if(!$studentRecord)
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Student record not found.',
                ], 404);
            }
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
                'message'=>'failed editing. please try again',
                'error'=>$e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try
        {
            $validatedData=$request->validate([
                'id'=>'required|integer',
                'name'=>'required|string',
                'phone'=>'required|string'
            ]);
            $students=$this->getUpdate->getUpdate($id,$validatedData);

            if(!$studentRecord)
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Student record not found.',
                ], 404);
            }

            return response()->json([
                'status'=>true,
                'message'=>'student updated successfully',
                'data'=>$studentsS,
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

    public function destroy(string $id)
    {
        try{
            $result = $this->getdestroy->getdestroy($id);

            if($result)
            {
                return response()->json([
                    'status'=>false,
                    'message'=>'Record not found',
                ],404);
            }
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
