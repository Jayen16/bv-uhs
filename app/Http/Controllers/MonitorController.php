<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReleaseResource;
use App\Http\Resources\VisitorResource;
use App\Models\Appointment;
use App\Models\EmployeeConsultation;
use App\Models\FirstyearConsultation;
use App\Models\OutpatientConsultation;
use App\Models\ReleaseResult;
use App\Models\Staff;
use App\Models\StudentConsultation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MonitorController extends Controller
{
    public function index(Request $request){

        $searchTerm = $request->input('search');
        $status = $request->input('status');
        
        $currentDateTime = Carbon::now();
    
        $query = Appointment::query();
        
        $query->where('statusVisit', '!=', '6')
              ->whereDate('dateVisit', '=', $currentDateTime);
    
        if ($searchTerm) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('appointment_record', 'like', '%' . $searchTerm . '%')
                  ->orWhere('visitor_id', 'like', '%' . $searchTerm . '%')
                  ->orWhere('appointment_type', 'like', '%' . $searchTerm . '%')
                  ->orWhere('nameVisitor', 'like', '%' . $searchTerm . '%')
                  ->orWhere('purposeVisit', 'like', '%' . $searchTerm . '%');
            });
        }
    
        if ($status) {
            $query->where('statusVisit', $status);
        }
    
        $results = $query->paginate(15);
    
        return VisitorResource::collection($results);
    }
    
    public function release(Request $request){

        $searchTerm = $request->input('search');
        
        $releaseResults = ReleaseResult::select('record_number')
        ->where(function($query) {
            $query->where('request_for_medtech', 'ready')
                ->where('request_for_radtech', 'ready')
                ->where('count_of_request', 2);
        })->orWhere(function($query) {
            $query->where('request_for_medtech', 'ready')
                ->where('request_for_radtech', 'none')
                ->where('count_of_request', 1);
        })->orWhere(function($query) {
            $query->where('request_for_medtech', 'none')
                ->where('request_for_radtech', 'ready')
                ->where('count_of_request', 1);
        })->get();

        $recordNumbers = $releaseResults->pluck('record_number');

        $studentConsultations = StudentConsultation::with(['student', 'userRelease', 'staff'])
            ->whereIn('record_number', $recordNumbers)->get();
        $employeeConsultations = EmployeeConsultation::with(['employee', 'userRelease', 'staff'])
            ->whereIn('record_number', $recordNumbers)->get();
        $outpatientConsultations = OutpatientConsultation::with(['outpatient', 'userRelease', 'staff'])
            ->whereIn('record_number', $recordNumbers)->get();
        $firstyearConsultations = FirstyearConsultation::with(['firstyear', 'userRelease', 'staff'])
            ->whereIn('record_number', $recordNumbers)->get();

            $studentConsultations = $studentConsultations->filter(function ($studentConsultation) use ($searchTerm) {
                return strpos($studentConsultation->record_number, $searchTerm) !== false
                    || strpos($studentConsultation->requested_by, $searchTerm) !== false;
            });
            
            // Filter employee consultations
            $employeeConsultations = $employeeConsultations->filter(function ($employeeConsultation) use ($searchTerm) {
                return strpos($employeeConsultation->record_number, $searchTerm) !== false
                    || strpos($employeeConsultation->requested_by, $searchTerm) !== false;
            });
            
            // Filter outpatient consultations
            $outpatientConsultations = $outpatientConsultations->filter(function ($outpatientConsultation) use ($searchTerm) {
                return strpos($outpatientConsultation->record_number, $searchTerm) !== false
                    || strpos($outpatientConsultation->requested_by, $searchTerm) !== false;
            });
            
            // Filter first year consultations
            $firstyearConsultations = $firstyearConsultations->filter(function ($firstyearConsultation) use ($searchTerm) {
                return strpos($firstyearConsultation->record_number, $searchTerm) !== false
                    || strpos($firstyearConsultation->requested_by, $searchTerm) !== false;
            });
            
            // Merge filtered consultations into a single collection
            $allConsultations = collect()
                ->merge($studentConsultations)
                ->merge($employeeConsultations)
                ->merge($outpatientConsultations)
                ->merge($firstyearConsultations);
            
            // Paginate the merged collection
            $perPage = 15;
            $page = LengthAwarePaginator::resolveCurrentPage();
            $pagedData = $allConsultations->slice(($page - 1) * $perPage, $perPage)->all();
            $paginatedConsultations = new LengthAwarePaginator($pagedData, count($allConsultations), $perPage);
            
            // Return the paginated consultations
            return ReleaseResource::collection($paginatedConsultations);
    }


    public function attendingPhysician()
    {
        $staffRecords = Staff::where('type_id', '3')->get();

        $staffTypeIds = $staffRecords->pluck('type_id')->toArray();

        $physicians = Staff::with(['user'])
            ->whereIn('type_id', $staffTypeIds)
            ->whereHas('user', function ($query) use ($staffTypeIds) {
                $query->whereIn('type_id', $staffTypeIds);
            })
            ->get();

        return response()->json($physicians);
    }
    
}
