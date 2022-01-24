<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{

    public function index()
    {
        $infromation = Information::all();
         return response()->json([
            'status'=>200,
            'Login'=>$infromation,
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required|max:191',
            'emailAddrress'=>'required|email|max:191',
            'phoneNumber'=>'required|max:10|min:10',
            'address'=>'required|max:191',  

        ]);

        if($validator->fails()){

             return response()->json([
                'validate_err'=>$validator->messages(),
            ]);
             
        }
        else{
            $infromation =  new Information;
            $infromation->name =$request->input('name');
            $infromation->emailAddrress =$request->input('emailAddrress');
            $infromation->phoneNumber =$request->input('phoneNumber');
            $infromation->address =$request->input('address');
            $infromation->save();

            return response()->json([
                'status'=>200,
                'message'=> 'User Added Successfully'
            ]);
        }
    }
}
