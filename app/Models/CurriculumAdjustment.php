<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculumAdjustment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'program_id', 'title', 'description', 'regulation_reference', 'effective_date', 'changes_summary', 'attach', 'status', 'approved_by', 'approved_at', 'created_by', 'updated_by',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function approvedBy()
    {
        return $this->belongsTo('App\User', 'approved_by');
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
