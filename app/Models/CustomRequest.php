<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'request_type_id', 'title', 'description', 'attach', 'status', 'response', 'approved_by', 'approved_at', 'rejected_by', 'rejected_at', 'created_by', 'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function requestType()
    {
        return $this->belongsTo(CustomRequestType::class, 'request_type_id');
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
