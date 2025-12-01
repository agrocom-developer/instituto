<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomRequestType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'requires_document', 'status', 'created_by', 'updated_by',
    ];

    public function requests()
    {
        return $this->hasMany(CustomRequest::class, 'request_type_id');
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
