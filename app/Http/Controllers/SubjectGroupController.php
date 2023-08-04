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
    public function  show_all(){
        $organisation_id=auth()->user()->userToOrganisation->organisation_id;
        $subjectGroups=SubjectGroup::whereOrganisationId($organisation_id)->get();
        return $this->successResponse($subjectGroups);
    }
    public function  show($id){
        $organisation_id=auth()->user()->userToOrganisation->organisation_id;
        $subjectGroup = SubjectGroup::find($id);
        if($subjectGroup->organisation_id!=$organisation_id){
            return $this->successResponse(null);
        }
        return $this->successResponse($subjectGroup);
    }

    public function store(Request $request){
        $organisation_id=auth()->user()->userToOrganisation->organisation_id;
        $rules = array(
            'subjectGroupName' => ['required',Rule::unique('subject_groups','subject_group_name')->where(function ($query) use ($organisation_id) {
                $query->where('organisation_id', $organisation_id);
            })]
        );
        $messsages = array(
            'subjectGroupName.required'=>"Name is required"

        );

        $validator = Validator::make($request->all(),$rules,$messsages );

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(),422);
        }
        $subjectGroup = new SubjectGroup();
        $subjectGroup->subject_group_name= $request->subjectGroupName;
        $subjectGroup->organisation_id= $organisation_id;
        $subjectGroup->save();
        return $this->successResponse($subjectGroup);

    }
    public function update(Request $request){


        $subjectGroup = SubjectGroup::find($request->subjectGroupId);
        $subjectGroup->subject_group_name= $request->subjectGroupName;
        $subjectGroup->save();
        return $this->successResponse($subjectGroup);
    }
}
