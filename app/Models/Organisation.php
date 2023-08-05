<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    public function subjectGroups(){
        return $this->hasMany(SubjectGroup::class,'organisation_id');
    }
    public function subjects()
    {
        return $this->hasManyThrough(
            Subject::class,
            SubjectGroup::class,
            'organisation_id', /* Foreign key on users table... */
            'subject_group_id', /* Foreign key on posts table... */
            'id', /* Local key on countries table... */
            'id' /* Local key on users table... */
        );
    }
}
