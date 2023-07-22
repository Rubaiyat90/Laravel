<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\StudentRecordRepo;

class StudentRecord extends Model
{
    use HasFactory, StudentRecordRepo;

    protected $fillable = ['id','name','phone'];
}
