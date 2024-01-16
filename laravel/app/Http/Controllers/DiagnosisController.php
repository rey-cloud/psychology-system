<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiagnosisRequest;
use App\Http\Requests\UpdateDiagnosisRequest;
use App\Http\Resources\DiagnosisCreateResource;
use App\Http\Resources\DiagnosisUpdateResource;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends Controller
{

    public function index()
    {
        $diagnosis = Diagnosis::get();
    return DiagnosisCreateResource::collection($diagnosis);
    }

    public function create(CreateDiagnosisRequest $payload)
{
    $diagnosisValue = $payload->diagnosis;
    $recommendation = $payload->recommendation;
    $trigger = $payload->trigger;

    $newDiagnosis = Diagnosis::create([
        'diagnosis' => $diagnosisValue,
        'recommendation' => $recommendation,
        'trigger' => $trigger,
    ]);

    return new DiagnosisCreateResource($newDiagnosis);
}


    public function read($id)
    {
        $diagnosis = Diagnosis::find($id);

        if ($diagnosis) {
            return response()->json([
                'diagnosis' => $diagnosis
            ]);
        } else {
            return response()->json([
                'message' => 'Diagnosis Not Found'
            ]);
        }
    }

    public function update(UpdateDiagnosisRequest $payload, $id)
    {
        $diagnosis = diagnosis::find($id);

        if ($diagnosis) {

            $diagnosis->update([
                'diagnosis' => $payload->diagnosis,
                'recommendation' => $payload->recommendation,
                'trigger' => $payload->trigger,
            ]);

            return new DiagnosisUpdateResource($diagnosis);
        }
    }

    public function delete($id)
    {
        $diagnosis = Diagnosis::find($id);

        if ($diagnosis) {
            $diagnosis->delete();

            return response()->json([
                'message' => 'Diagnosis Deleted Successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Diagnosis Not Found'
            ]);
        }
    }
}
