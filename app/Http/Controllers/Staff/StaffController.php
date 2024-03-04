<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddLaboratoryStaff as RequestAddLaboratoryStaff;
use App\Http\Requests\AddUser as RequestsAddUser;
use App\Http\Requests\UpdateStaffProfile;
use App\Http\Resources\UserResource;
use App\Models\LaboratoryRole;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
  
        return UserResource::collection(User::with('staff')->paginate(8));

    }


    public function destroy($staff_id){

        $user = User::where('staff_id', $staff_id)->first();
    
        if ($user) {
            try {
                // dont delete relationship nitong user sa staff, kasi may  record parin sya sa mga docs/consultation/papers
                $user->delete();
                return response()->json(['message' => ucwords($user->staff->first_name.' '.$user->staff->last_name).' removed successfully']);

            } catch (\Exception $e) {

                return response()->json(['error' => 'Failed to delete user. Please try again later.'], 500);
            }
        } else {

            return response()->json(['error' => 'User not found.'], 404);
        }
        

    }

    public function store(RequestsAddUser $request)
    {
        try {
            DB::beginTransaction();

    
            if ($request->hasFile('image_user')) {
                $image = $request->file('image_user');
                $ext = $image->extension();
                $file = $request->input('first_name').'.'.$request->input('last_name').'.'.time().'.'.$ext;

                $image->storeAs('public/user_uploads',$file); 
                $storeImage = $file;

            } else {    
                return response()->json(['message' => 'Image upload failed'], 500);
            }

            if ($request->hasFile('image_signature')) {
                $image = $request->file('image_signature');
                $ext = $image->extension();
                $file2 = $request->input('first_name').'.'.$request->input('last_name').'.'.time().'.'.$ext;

                $image->storeAs('public/signatures',$file2); 
                $storeImageSignature = $file2;
                
            } else {    
                return response()->json(['message' => 'Image upload failed'], 500);
            }

            $staff = Staff::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'type_id' => $request->input('type_id'),
                'license_no' => $request->input('license_no'),
                'email' => $request->input('email'),
                'image_signature' => $storeImageSignature
            ]);

            if (!$staff) {
                throw new \Exception('Staff creation failed.');
            }

            $user = User::create([
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'type_id' => $request->input('type_id'),
                'status' => 'inactive',
                'activity' => 'offline',
                'staff_id' => $staff->staff_id,
                'image_user'=> $storeImage
            ]);


            if (!$user) {
                throw new \Exception('User creation failed.');
            }

            DB::commit();
            
            return response()->json(['message' => 'User created successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Creation failed'], 500);
        }
    }
     

    public function toggleStatus($staff_id)
    {
        $user = User::where('staff_id', $staff_id)->with('staff')->first();

        if ($user) {
            $user->status = $user->status === 'active' ? 'inactive' : 'active';
            $user->save();
            
            return response()->json(['message' => ucfirst($user->staff->last_name) . ' status updated successfully']);

        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }


    public function LaboratoryStaffRecord(Request $request)
    {
        $laboratory_staff = LaboratoryRole::get();

        return response()->json($laboratory_staff);
 
    }


    public function LaboratoryStaffUpdate($staff_id,$status)
    {

        $staff_role = LaboratoryRole::where('id',$staff_id)->first();
        $staff_role->status = $status;
        $staff_role->save();


        return response()->json(['message' => ucfirst($staff_role->full_name) . 's status updated successfully']);
 
    }


    public function LaboratoryStaffAdd(RequestAddLaboratoryStaff $request)
    {

        if ($request->hasFile('image_signature')) {
            $image = $request->file('image_signature');
            $ext = $image->extension();
            $file = $request->input('full_name').'.'.time().'.'.$ext;

            $image->storeAs('public/image_signatures',$file); 
            $storeImage = $file;

        } else {    
            return response()->json(['message' => 'Image upload failed'], 500);
        }

        $staff = LaboratoryRole::create([
            'full_name' => $request->input('full_name'),
            'role' => $request->input('role'),
            'professional_title' => $request->input('professional_title'),
            'license_no' => $request->input('license_no'),
            'image_signature' => $storeImage,
        ]);
    
        if ($staff) {
            return response()->json(['message' => 'Laboratory staff added successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to add laboratory staff'], 500);
        }

    }


    public function LaboratoryStaffDestroy($staff_id){

        $user = LaboratoryRole::where('id', $staff_id)->first();
    
        if ($user) {
            try {
                // dont delete relationship nitong user sa staff, kasi may  record parin sya sa mga docs/consultation/papers
                $user->delete();
                return response()->json(['message' => ucwords($user->full_name).' removed successfully']);

            } catch (\Exception $e) {

                return response()->json(['error' => 'Failed to delete laboratory staff. Please try again later.'], 500);
            }
        } else {

            return response()->json(['error' => 'User not found.'], 404);
        }
        
    }


    /*
        * Update the user's staff profile.
        */
    // public function updateStaff($id, UpdateStaffProfile $request)
    // {
    //     $getStaff = Staff::where('staff_id', $id)->first();
    
    //     if (!$getStaff) {
    //         return response()->json(['message' => 'Staff member not found'], 404);
    //     }
    
    //     $getStaff->fill($request->all());
    //     $getStaff->save();
    
    //     return response()->json($getStaff);
    // }
        


}
