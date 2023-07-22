<?php
namespace App\Repositories;

use App\Models\StudentRecord;

trait StudentRecordRepo{
    public static function StudentRecord()
    {
        return StudentRecord::orderBy('name');
    }

    public static function getStudentWithClass()
    {
        return StudentRecord::with('myclass')->get();
    }

    public static function findById(string $id): ?StudentRecord
    {
        return StudentRecord::find($id);
    }

    public static function store(array $data): StudentRecord
    {
        return StudentRecord::create($data);
    }

    public function updateRecord(string $id,array $data): bool
    {
        $studentRecord=StudentRecord::find($id);

        if(!$studentRecord)
        {
            return false;
        }

        $studentRecord->update($data);
        return true;
    }

    public function deleteRecord(string $id):bool
    {
        $studentRecord=StudentRecord::find($id);

        if(!$studentRecord)
        {
            return false;
        }

        $studentRecord->delete($data);
        return true;
    }

}