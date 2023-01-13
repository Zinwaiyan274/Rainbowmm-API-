<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    // certificate data
    public function certificateList(){
        $data = Certificate::get();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}
