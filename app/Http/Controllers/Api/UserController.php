<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Frontend\CategoryModel;
use App\Models\Frontend\JobModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // use Exception;
    public function register(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name'=>"required",
                'email'=>"required|string|email|unique:users,email',",
                'password'=>'required|numeric',
                'role'=>'required|numeric',
                'phone_number'=>'required|numeric|min:10'
               ]);

               if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'errors' => $validator->errors()
                    ], 422);
                }
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->phone_number = $request->phone_number;
                $user->role = $request->role;

                $user->save();

                return response()->json([
                    'status' => true,
                    'message' => 'User registered successfully.',
                    'user' => $user,
                ], 201);
                
        }catch(Exeption $e){
           return response()->json([
                'status' => false,
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|string|email|',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $user = User::where('email',$request->email)->first();
        if($user)
        {
            // Check user and password
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentials.'
                ], 401);
            }
            // Create token
            $token = $user->createToken('auth_token')->plainTextToken;

            // Response
            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'user' => $user,
                'token' => $token,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => "Email address not found"
            ], 422);
        }
    }

    public function jobs_list(Request $request)
    {
        $title = $request->get('title');
        $location = $request->get('location');

        $jobs = JobModel::with(['job_types','category','users'])
                        ->when($title,function($query) use ($title){
                            $query->where('title','like','%'.$title.'%');
                        })->when($location, function($query) use ($location) {
                            $query->where('location', 'like', '%' . $location . '%');
                        })->paginate(10);

        return response()->json([
            'status' => true,
            'jobs'=>$jobs
        ], 200);
    }

    public function home_screen(Request $request)
    {
        try{
           $keyword = $request->get('keywords');
           $location = $request->get('location');
           $category_id = $request->get('category_id');

            $response = [];
            $response['categories'] =  CategoryModel::withCount(['available_position'])->where('status',1)->orderBy('id','DESC')->get();
            $response['featured_jobs'] = JobModel::with(['category','job_types','users'])
                                                ->when($keyword, function($query) use ($keyword){ $query->where('keywords','like',"%".$keyword."%"); })
                                                ->when($location, function($query) use ($location){ $query->where('location','like',"%".$location."%"); })
                                                ->when($category_id, function($query) use ($category_id) { $query->where('category_id',$category_id); })
                                                ->where(['is_featured'=>1])->orderBy('id','DESC')->take(3)->get();
            $response['lastest_jobs'] = JobModel::with(['category','job_types','users'])
                                                ->when($keyword, function($query) use ($keyword){ $query->where('keywords','like',"%".$keyword."%"); })
                                                ->when($location, function($query) use ($location){ $query->where('location','like',"%".$location."%"); })
                                                ->when($category_id, function($query) use ($category_id) { $query->where('category_id',$category_id); })
                                                ->orderBy('id','DESC')->take(5)->get();
            return response()->json([
                'status' => true,
                'message'=>"Data Fetched Successfully",
                "data"=>$response
            ], 200);

        }catch(Exeption $e){
            return response()->json([
                'status' => false,
                'message'=>$e->getMessage()
            ], 400);
        }
      
    }
}
