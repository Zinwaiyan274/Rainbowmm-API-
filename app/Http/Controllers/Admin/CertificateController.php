<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    // certificate lists page
    public function certificateList(){
        $data = Certificate::paginate(6);

        return view('certificate.certificate', compact('data'));
    }

    // upload certificate page
    public function uploadCertificate(){
        return view('certificate.uploadCertificate');
    }

    // upload certificate process
    public function uploadCertificateProcess(Request $request){
        $validator = Validator::make($request->all(), [
            'img' => 'required',
        ],[
            'img.required' => 'You need to choose image!',
        ]);

        if($validator->fails()){
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $file = $request->file('img');
        $fileName = uniqid().'_'.$file->getClientOriginalName();
        Storage::disk('public')->put('certificate/'.$fileName, File::get($file));


        Certificate::insert([
            'image' => $fileName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('certificateList')->with(['success' => 'New Certificate added successfully!']);
    }

    // delete certificate process
    public function deleteCertificate($id){
        $data = Certificate::where('id', $id)->first();
        $dbImage = $data['image'];

        Certificate::where('id', $id)->delete();

        if(File::exists(public_path().'/certificate/'.$dbImage)){
            File::delete(public_path().'/certificate/'.$dbImage);
        }

        return back()->with(['deleted' => 'Certificate Has Been Deleted!']);
    }
}
