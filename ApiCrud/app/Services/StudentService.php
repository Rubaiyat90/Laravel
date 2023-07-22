<?php

namespace App\Services;

use App\Repositories\StudentRecordRepo;
use Illuminate\Support\Facades\DB;
use App\Models\StudentRecord;
use Illuminate\Support\Facades\Crypt;

class StudentService
{
    public function getStudents()
    {
        return StudentRecordRepo::StudentRecord()->get();

    }

    public function getfindById(string $id)
    {
        return StudentRecordRepo::findById($id);
    }

    public function getstore(array $data)
    {
        return StudentRecordRepo::store($data);
    }

    public function getUpdate(string $id, array $data)
    {
        return DB::transaction(function() use($id,$data){
            $studentRecord=StudentRecordRepo::find($id);
            if(!$studentRecord)
            {
                return null;
            }

            $studentRecord->updateRecord($data);
            return $studentRecord;;
        });
    }

    public function getdestroy(string $id)
    {
        return DB::transaction(function () use ($id) {
            $studentRecord = StudentRecordRepo::find($id);

            if (!$studentRecord) {
                return false;
            }

            $studentRecord->deleteRecord();

            return true;
        });
    }

    public function getStudentsWithClass($decryptedClassId)
    {
        // $decryptedClassId = Crypt::decrypt($encryptedMyClassId);


        return StudentRecord::with(['myClass' => function ($query) use ($decryptedClassId) {
            $query->where('id', $decryptedClassId);
        }])->get();
    }

    public function getStudentWithSenctionAndClass($decryptedSectionId, $decryptedClassId)
    {
        return StudentRecord::with(['section','myClass'])
        ->where('section_id',$decryptedSectionId)
        ->where('class_id',$decryptedClassId)
        ->get();
    }
}