<?php
namespace App\Repositories;

use App\Models\StudentRecord;

trait StudentRecordRepo{
    public static function StudentRecord()
    {
        return StudentRecord::orderBy('name');
    }

    public static function getStudents()
    {
        return StudentRecord::with('studentRecord')->get();
    }

    public static function findById(string $id): ?StudentRecord
    {
        return StudentRecord::find($id);
    }

    public static function store(array $data): StudentRecord
    {
        return StudentRecord::create($data);
    }

    public function updateRecord(string $id,array $data)
    {
        $studentRecord=StudentRecord::find($id);

        if(!$studentRecord)
        {
            return false;
        }

        $studentRecord->update($data);
        return $studentRecord;
    }

    public function deleteRecord(string $id)
    {
        $studentRecord=StudentRecord::find($id);

        if(!$studentRecord)
        {
            return false;
        }

        $studentRecord->delete($studentRecord);
        return $studentRecord;
    }

}