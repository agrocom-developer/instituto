<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicTransition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'type', 'current_program_id', 'new_program_id', 'current_work_shift_id', 'new_work_shift_id', 'reason', 'note', 'status', 'approved_by', 'rejected_by', 'approved_at', 'rejected_at', 'created_by', 'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function currentProgram()
    {
        return $this->belongsTo(Program::class, 'current_program_id');
    }

    public function newProgram()
    {
        return $this->belongsTo(Program::class, 'new_program_id');
    }

    public function currentWorkShift()
    {
        return $this->belongsTo(WorkShiftType::class, 'current_work_shift_id');
    }

    public function newWorkShift()
    {
        return $this->belongsTo(WorkShiftType::class, 'new_work_shift_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo('App\User', 'approved_by');
    }

    public function rejectedBy()
    {
        return $this->belongsTo('App\User', 'rejected_by');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
}

