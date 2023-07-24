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

    public function getupdate(string $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $studentRecord = StudentRecordRepo::findById($id);

            if (!$studentRecord) {
                return null;
            }

            $studentRecord->updateRecord($id, $data);

            return $studentRecord;
        });
    }


    public function getdestroy(string $id)
    {
        return DB::transaction(function () use ($id) {
            $studentRecord = StudentRecordRepo::findById($id);

            if (!$studentRecord) {
                return null;
            }

            $studentRecord->deleteRecord($id);

            return $studentRecord;
        });
    }
}