<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class LeadsController extends Controller
{


    public function getImages(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'page' => 'required|numeric',
            'per_page' => 'required|numeric'
        ]);

        if($validated->fails()){
            return $this->setErrResponse($validated);
        }

        $page = $request->page;
        $take =  $request->per_page;
        $skip = 0;

        if($page != 1){
            $skip = $take * ($page - 1);
        }else if($page < 0){
            return [];
        }
        
        $res['results'] = DB::table('leads')->skip($skip)->take($take)->get();
        $res["total_pages"] = ceil(DB::table('leads')->count() / $take);
        return $res;
    }


    public function createLead(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'phone' => 'required|regex:/^05\d\d{7}$/',
            'email' => 'required|email',
            'img' => 'required|url',
        ]);

        if($validated->fails()){
            return $this->setErrResponse($validated);
        }


        $this->saveLead($request);

        return [
            "error" => false,
            "message" => 'הנתונים התקבלו בהצלחה'
        ];
    }



    private function saveLead($request)
    {
        return Lead::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'img' => $request->img
        ]);
    }



    public function uploadImage(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'file' => 'required|image|max:5000'
        ]);

        if($validated->fails()){
            return $this->setErrResponse($validated);
        }

        $ext = $request->file('file')->extension();
        $fileName = substr(md5(microtime(true).$request->file->getClientOriginalName()), 0, 10).'.'.$ext;
        $filePath = $request->file('file')->storeAs('', $fileName, 'public_uploads');
        $base = URL::to('/').'/uploads/';

        return [
            "error" => false,
            "path" => $base.$filePath
        ];
    }


    private function setErrResponse($validated)
    {
        return [
            "error" => true,
            "messages" => $validated->errors()->messages()
        ];
    }



}
