<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $appointmentType = $request->input('type'); // Default value is 'firstyear' if not provided
    
        $query = Schedule::query();
    
        $query->where('appointment_type', $appointmentType)
            ->whereDate('date', '>', now()->toDateString()) 
            ->where('slot', '>', 0)
            ->orderBy('date', 'asc');
    
        $contentList = $query->paginate(10);
    
        return ScheduleResource::collection($contentList);
    }
    

    public function store(ScheduleRequest $request , $appointment_type){



        if($request){

            $requestData = $request->all();


            $slotLimit = $requestData['slotLimit'];
    
            foreach ($requestData['selectedTimes'] as $selectedTime) {
                foreach ($requestData['selectedDates'] as $selectedDate) {
    
                    // $formattedDate = Carbon::parse($selectedDate)->format('M d, Y');
    
                    Schedule::create([
                        'date' => $selectedDate,
                        'time' => $selectedTime,
                        'slot' => $slotLimit,
                        'appointment_type'=>$appointment_type
    
                    ]);
                }
            }
        
            return response()->json(['message' => 'Schedule/s added successfully']);
        }
  
    }


}
