<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function halaman_employee(){
        // $payload = JWTAuth::parseToken()->getPayload();
        // $name=$payload->get('nm');
        $dataEmployee = Employee::all();
        
        if($dataEmployee){
            return response()->json([
                'code' => 200,
                'status' => 'OK',
                'result' => $dataEmployee
            ], 200);
        }
        
        return response()->json([
            'code' => 500,
            'status' => 'error',
            'message' => 'data not found',
        ], 500);
    }

    public function halaman_employee_add(Request $request){
        $validator = Validator::make($request->all(), [
            'nip' => 'required|max:255',
            'nama' => 'required|max:100',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:13'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 422);
        }

        //create employee
        $employee = Employee::create([
            'nip'      => $request->nip,
            'nama'     => $request->nama,
            'alamat'     => $request->alamat,
            'no_telp'     => $request->no_telp
        ]);

        //return response JSON user is created
        if($employee) {
            return response()->json([
                'code' => 201,
                'status' => 'OK',
                'result'    => $employee,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'status' => 'error',
            'message' => 'failed to create data',
        ], 409);
    }

    public function halaman_employee_detail($id){
        $getEmployee = Employee::find($id);
        
        if($getEmployee){
            return response()->json([
                'code' => 200,
                'status' => 'OK',
                'result' => $getEmployee,
            ]);
        }

        return response()->json([
            'code' => 500,
            'status' => 'error',
            'message' => 'data not found',
        ], 500);
    }
}
