<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;
use App\Models\Frontend\CategoryModel;
use App\Models\Frontend\JobModel;
use App\Models\Frontend\JobsApplied;
use App\Models\Frontend\SavedJobs;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $userServices;
    
    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }
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
                
        }catch(Exception $e){
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

    public function my_profile(Request $request)
    {
      try{

        $id = Auth::user()->id;
        $userDetails = User::where('id',$id)->first();

        if(!$userDetails)
        {
            return response()->json([
                'status' => false,
                'message'=>"User not found with id"
            ], 400);
        }else{
            return response()->json([
                'status' => true,
                'message'=>"Data Fetched Successfully",
                "data"=>$userDetails
            ], 200);
        }
    }catch(Exception $e){
        return response()->json([
            'status' => false,
            'message'=>$e->getMessage()
        ], 400);
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

        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message'=>$e->getMessage()
            ], 400);
        }
      
    }

    public function view_job(Request $request)
    {
        // dd('hi');
        try{
            $validator = Validator::make($request->all(),[
                'job_id'=>"required|numeric"
            ]);
    
            if($validator->fails())
            {
                return response()->json([
                    'status' => false,
                    'message'=>$validator->errors()
                ], 400);
            }
    
            $id = $request->job_id;
            $jobDetails = JobModel::with(['category','job_types','users'])->withCount('applications')->where('id',$id)->first();
            if(!$jobDetails)
            {
                return response()->json([
                    'status' => false,
                    'message'=>"Job not found with id"
                ], 400);
            }else{
                return response()->json([
                    'status' => true,
                    'message'=>"Data Fetched Successfully",
                    "data"=>$jobDetails
                ], 200);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message'=>$e->getMessage()
            ], 400);
        }
    }

    public function changeApplicationStatus(Request $request)
    {
        try {
            $userId = Auth::user()->id;
    
            // Validate input
            $validator = Validator::make($request->all(), [
                'job_id' => "required|numeric",
                'application_id' => "required|numeric", 
                'status' => "required|string"
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 400);
            }
    
            $job_id = $request->get('job_id');
            $application_id = $request->get('application_id');
            $status = $request->get('status');

            $res = $this->userServices->changestatus($application_id,$job_id,$status);

            return response()->json([
                'status' => true,
                'message' => 'Application status updated successfully.',
                'data' => $res
            ], 200);

        } catch (\Exception $e) { 
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function my_jobs(){
        try{
            $jobs = $this->userServices->userJobs();

            if($jobs->count()>0)
            {
                return response()->json([
                    'status' => true,
                    'message'=>"Data fetched Successfully",
                    'total_posts'=>$jobs->count(),
                    'data'=> $jobs
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message'=>"No Jobs Posted"
                ], 200);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message'=>$e->getMessage()
            ], 500);
        }
    }

    public function view_applicants(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'job_id' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors()
                ], 400);
            }

            $jobId = $request->get('job_id');
            $applications = $this->userServices->jobApplicants($jobId);

            return response()->json([
                'status' => true,
                'message' => "Data fetched successfully",
                'data' => $applications
            ], 200);

        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return response()->json([
                'status' => false,
                'message' => "Unauthorized: You do not own this job."
            ], 403);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => "Job not found."
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function jobsApplied()
    {
        try{
            $jobsApplied = $this->userServices->appliedJobs();

            if($jobsApplied->count()>0){
                return response()->json([
                    'status' => true,
                    'message'=>"Data fetched Successfully",
                    'data'=> $jobsApplied
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message'=>"No Data Found"
                ], 400);
            }

        }catch (\Exception $e) { 
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function savedJobs()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized: Token not provided or invalid.'
                ], 401);
            }

            $userId = $user->id;

            $jobSaved = $this->userServices->userSavedJobs($userId);

            if ($jobSaved->count() > 0) {
                return response()->json([
                    'status' => true,
                    'message' => "Data fetched successfully.",
                    'data' => $jobSaved
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "No data found."
                ], 400);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
