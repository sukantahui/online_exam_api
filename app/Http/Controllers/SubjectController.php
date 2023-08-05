<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectGroup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SubjectController extends ApiController
{

    public function show_all(){
        //$subjectGroupIds=auth()->user()->userToOrganisation->organisation->subjectGroups->pluck('id');
        //better option
        //$subjectGroupIds=auth()->user()->userToOrganisation->organisation->subjectGroups->modelKeys();
        //$subjects = Subject::whereIn('subject_group_id',$subjectGroupIds)->get();
        $subjects=auth()->user()->userToOrganisation->organisation->subjects;
        return $this->successResponse($subjects);
    }

    public function store(Request $request)
    {
        $organisation_id=auth()->user()->userToOrganisation->organisation_id;
        $subjectGroup = SubjectGroup::findOrFail($request->subjectGroupId);
        if($subjectGroup->organisation_id!=$organisation_id){
            return $this->errorResponse("Group belongs to other Organisation",422);
        }

        $rules = array(
            'subjectName' => ['required',Rule::unique('subjects','subject_name')->where(function ($query) use ($request) {
                $query->where('subject_group_id', $request->subjectGroupId);
            })]
        );
        $messsages = array(
            'subjectName.required'=>"Name is required"
        );

        $validator = Validator::make($request->all(),$rules,$messsages );

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(),422);
        }

        $subject = new Subject();
        $subject->subject_name = $request->subjectName;
        $subject->subject_details = $request->subjectDetails;
        $subject->subject_group_id = $request->subjectGroupId;
        $subject->save();
        return $this->successResponse($subject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
