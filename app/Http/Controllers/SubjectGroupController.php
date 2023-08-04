<?php

namespace App\Http\Controllers;

use App\Models\SubjectGroup;
use App\Http\Requests\StoreSubjectGroupRequest;
use App\Http\Requests\UpdateSubjectGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SubjectGroupController extends ApiController
{
    public function store(Request $request){
//        $rules = array(
//            'studentName' => 'required|max:255|unique:ledgers,ledger_name',
//            'stateId' => 'required|exists:states,id',
//            'dob'=>["required","date_format:Y-m-d",function($attribute, $value, $fail){
//                if(get_age($value)<4){
//                    $fail($attribute.' in valid, age should more than 4 but input age is '.get_age($value));
//                }
//            }],
//            'guardianName'=>['max:255',Rule::requiredIf(function() use($request){
//                return  $request->input('relationToGuardian') || get_age($request->input('dob'))<18;
//            })],
//            'relationToGuardian'=>'required_with:guardianName',
//            'fatherName'=>"required_without:motherName",
//            'motherName'=>"required_without:fatherName",
//            'email'=>'email',
//            'sex'=>'required|in:M,F,O'
//        );
//        $messsages = array(
//            'sex.in'=>"Please use M or F"
//        );
//
//        $validator = Validator::make($request->all(),$rules,$messsages );
//
//        if ($validator->fails()) {
//            return $this->errorResponse($validator->messages(),422);
//        }
        $subjectGroup = new SubjectGroup();
        $subjectGroup->subject_group_name= $request->subjectGroupName;
        $subjectGroup->organisation_id= auth()->user()->userToOrganisation->organisation_id;
        $subjectGroup->save();
        return $this->successResponse($subjectGroup);

    }
}
