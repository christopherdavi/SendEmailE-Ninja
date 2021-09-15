<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class UserController extends Controller
{
  public function register( Request $request)
{
    $validator= Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required'
    ]);
    if($validator->fails()){
    return response()->json(['status code'=>400,
    'message'=>'Bad request']);

    }
    $user=new User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $user->save(); 
    
    return response()->json([
        'status_code'=>200,
        'message'=>'User created succesfully'
    ]);
}
public function login(Request $request){
   $validator= Validator::make($request->all(),[
       'email'=>'required|email',
       'password'=>'required'
   ]);
  if($validator->fails()){
      return response() -> json(['status code'=>400,
      'message'=>'bad request'
      ]);
  }
  $credentials=request(['email','password']);
  if(!Auth::attempt($credentials)){
     return response()->json([
     'status code'=>500,
     'message'=>'Unauthorized'
     ]); 
  }
  $user= User::where('email',$request->email)->first();
  $tokenResult=$user->createToken('authToken')->plainTextToken;
  return response()->json([
      'status code'=>200,
      'token'=>$tokenResult
  ]) ;
   
}
public function logout( Request $request)
  {
  $request->user()->currentAccesToken()->delete();
  return response()->json([
      'status code'=>200,
      'message'=>'token deleted succesfully' 
  ]);
  }

  public function resetPassword(Request $request){
      $user = User::where('email', $request->email)->first();
      if($user != null){
          $str=rand();
          $password_temp = md5($str);
          $user->password = bcrypt($password_temp);
          $user->save();
          $details = [
              'user'=> $user->name,
              'password_temp'=>$password_temp
          ];
        //   Mail::to($user->email)->send(new TestMail($details));
        Mail::to($user->email)->send(new TestMail($details));
          return 'send';
      }else{
          return response()->json([
              'message'=>'Este correo electronico no es valido'
          ]);
      }
  }
 
}