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
}
