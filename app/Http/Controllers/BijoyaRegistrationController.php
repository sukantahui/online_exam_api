<?php

namespace App\Http\Controllers;

use App\Models\bijoyaRegistration;
use App\Http\Requests\StorebijoyaRegistrationRequest;
use App\Http\Requests\UpdatebijoyaRegistrationRequest;
use Illuminate\Http\Request;

class BijoyaRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getStudentInfo()
    {
        $studentRegistration = bijoyaRegistration::get();
        return response()->json(['success'=>1,'data'=>$studentRegistration], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function saveStudentInfo(Request $request)
    {
        $studentRegistration = new bijoyaRegistration();
        $studentRegistration->student_name = $request->input('studentName');
        $studentRegistration->contact_number = $request->input('contactNumber');
        $studentRegistration->whatsapp_number = $request->input('whatsappNumber');
        $studentRegistration->email_id = $request->input('email');
        $studentRegistration->number_of_member = $request->input('memberNumber');

        $studentRegistration->save();
        return response()->json(['success'=>1,'data'=>$studentRegistration], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebijoyaRegistrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bijoyaRegistration $bijoyaRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bijoyaRegistration $bijoyaRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebijoyaRegistrationRequest $request, bijoyaRegistration $bijoyaRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bijoyaRegistration $bijoyaRegistration)
    {
        //
    }
}
