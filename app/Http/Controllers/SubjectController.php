<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends ApiController
{


    public function store(Request $request)
    {
        $organisation_id=auth()->user()->userToOrganisation->organisation_id;
        $subject = new Subject();
        $subject->subject_code = $request->subjectCode;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
