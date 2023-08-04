<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGroup extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $subject_group_name;

    /**
     * @var mixed
     */
    private $organisation_id;
    protected $guarded = ['id'];
    protected $hidden = ["created_at", "updated_at"];
    public function subjects(){
        return $this->hasMany(Subject::class,'subject_group_id');
    }
    public function organisation(){
        return $this->belongsTo(Organisation::class,'organisation_id');
    }
}
