<?php

namespace App\Http\Controllers;

 use App\Http\Controllers\Controller;

 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\App;

use App\Models\TblPatient;

use App\Models\TblGender;
use App\Models\TblService;
use App\Models\TblPatientService;
class PatientController extends Controller
{
    //

    public function insertPatient(Request $request){

            $patient= new TblPatient();
            $patient->name=$request->input('name');
            $name_p=          $request->input('name');
            $date_p=$request->input('date_of_birth');

            $patient->date_of_birth=$request->input('date_of_birth');

            $patient->incrementCounterIFSmiilar($name_p,$date_p);

            $patient->save();

            $gender= new TblGender();
            $gender->gender=$request->input('gender');
            $gender->patient_id=$patient->id;
            $gender->save();
            
            $service=new TblService();
            $service->service=$request->input('service');
            $service->patient_id=$patient->id;
            $service->save();

            $patientService= new TblPatientService();
            $patientService->comment=$request->input('comment');
            $patientService->patient_id=$patient->id;
            $patientService->save();

            return response()-> json("successful");

            
    }

    public function  getPatients(){
        $patientsData= TblPatient::all();
        //::with(['TblGender','TblService','TblPatientService'])->get();

        return response()-> json( $patientsData);

    }
}
