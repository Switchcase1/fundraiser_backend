<?php
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    
    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'user_type'=>'contributor'
        ];
        
        if (!Auth::attempt($data)) {
            return response()->json(['error' => 'Unauthorised'], 401);
        } else {
            $user = User::where('email',$request->email)->first();
            $token = Str::random(60);
            User::where('email',$request->email)->update(array("token"=>$token));
            return response()->json(['user'=>$user ,'token' => $token], 200);
        }
    }
    public function logout(Request $request){
        User::where('email',$request->email)->update(array("token"=>null));
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
    
        $token = Str::random(60);
         
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => $token
        ]);
    
       
    
        return response()->json(['user'=>$user ,'token' => $token], 200);
    }
    public function get_user(Request $request){
        $user = User::where('token',$request->token)->first();
        return response()->json($user, 200);
    }
}
