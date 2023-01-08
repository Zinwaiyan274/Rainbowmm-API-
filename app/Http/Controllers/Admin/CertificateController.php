<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    // certificate lists page
    public function certificateList(){
        $data = Certificate::paginate(6);

        return view('certificate', compact('data'));
    }

    // upload certificate page
    public function uploadCertificate(){
        return view('uploadCertificate');
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
        $file->move(public_path().'/certificateImg', $fileName);

        Certificate::insert([
            'image' => $fileName,
        ]);

        return redirect()->route('certificateList')->with(['success' => 'New Certificate has been added successfully!']);
    }

    // delete certificate process
    public function deleteCertificate($id){
        $data = Certificate::where('id', $id)->first();
        $dbImage = $data['image'];

        Certificate::where('id', $id)->delete();

        if(File::exists(public_path().'/certificateImg/'.$dbImage)){
            File::delete(public_path().'/certificateImg/'.$dbImage);
        }

        return back()->with(['deleted' => 'Certificate Has Been Deleted!']);
    }
}
