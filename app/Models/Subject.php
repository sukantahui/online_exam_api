<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $subject_group_id;

    /**
     * @var mixed
     */
    private $subject_code;
    /**
     * @var mixed
     */
    private $subject_name;
    /**
     * @var mixed
     */
    private $subject_details;
}
