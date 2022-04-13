<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //Returns an array with employee IDs from multiple select form//

        $employees = $request->input('employees');

        //Returns an array with employee IDs from multiple select form//
       
        //Filter with employee id gotten from form : ->whereIn('employee_id', $employees)//

        $meetings = DB::table('shifts')
            ->join('employees', 'employees.id', '=', 'shifts.employee_id')
            ->select('shifts.mondayAm', 'employees.firstname', 'employees.lastname')
            ->whereIn('employee_id', $employees)
            ->selectRaw('SUM(mondayAm) as monday_am')
            ->groupBy('shifts.employee_id')
            ->having("monday_am", '=', 0)
            ->get();

            if (count($meetings) != count($employees))
            {
                $meetings = DB::table('shifts')
                    ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                    ->select('shifts.mondayPm', 'employees.firstname', 'employees.lastname')
                    ->whereIn('employee_id', $employees)
                    ->selectRaw('SUM(mondayPm) as monday_pm')
                    ->groupBy('shifts.employee_id')
                    ->having("monday_pm", '=', 0)
                    ->get();
                if (count($meetings) != count($employees))

                {
                    $meetings = DB::table('shifts')
                        ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                        ->select('shifts.tuesdayAm', 'employees.firstname', 'employees.lastname')
                        ->whereIn('employee_id', $employees)
                        ->selectRaw('SUM(tuesdayAm) as tuesday_am')
                        ->groupBy('shifts.employee_id')
                        ->having("tuesday_am", '=', 0)
                        ->get();
                    if (count($meetings) != count($employees))
                    {
                        $meetings = DB::table('shifts')
                            ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                            ->select('shifts.tuesdayPm', 'employees.firstname', 'employees.lastname')
                            ->whereIn('employee_id', $employees)
                            ->selectRaw('SUM(tuesdayPm) as tuesday_pm')
                            ->groupBy('shifts.employee_id')
                            ->having("tuesday_pm", '=', 0)
                            ->get();
                        if (count($meetings) != count($employees))
                        {
                            
                            $meetings = DB::table('shifts')
                                ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                                ->select('shifts.wednesdayAm', 'employees.firstname', 'employees.lastname')
                                ->whereIn('employee_id', $employees)
                                ->selectRaw('SUM(wednesdayAm) as wednesday_am')
                                ->groupBy('shifts.employee_id')
                                ->having("wednesday_am", '=', 0)
                                ->get();
                            if (count($meetings) != count($employees))
                            {
                                $meetings = DB::table('shifts')
                                    ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                                    ->select('shifts.wednesdayPm', 'employees.firstname', 'employees.lastname')
                                    ->whereIn('employee_id', $employees)
                                    ->selectRaw('SUM(wednesdayPm) as wednesday_pm')
                                    ->groupBy('shifts.employee_id')
                                    ->having("wednesday_pm", '=', 0)
                                    ->get();
                                if (count($meetings) != count($employees))
                                {
                                    $meetings = DB::table('shifts')
                                        ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                                        ->select('shifts.thursdayAm', 'employees.firstname', 'employees.lastname')
                                        ->whereIn('employee_id', $employees)
                                        ->selectRaw('SUM(thursdayAm) as thursday_am')
                                        ->groupBy('shifts.employee_id')
                                        ->having("thursday_am", '=', 0)
                                        ->get();
                                    if (count($meetings) != count($employees))
                                    {
                                        $meetings = DB::table('shifts')
                                            ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                                            ->select('shifts.thursdayPm', 'employees.firstname', 'employees.lastname')
                                            ->whereIn('employee_id', $employees)
                                            ->selectRaw('SUM(thursdayPm) as thursday_pm')
                                            ->groupBy('shifts.employee_id')
                                            ->having("thursday_pm", '=', 0)
                                            ->get();
                                        if (count($meetings) != count($employees))
                                        {
                                            $meetings = DB::table('shifts')
                                                ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                                                ->select('shifts.fridayAm', 'employees.firstname', 'employees.lastname')
                                                ->whereIn('employee_id', $employees)
                                                ->selectRaw('SUM(fridayAm) as friday_am')
                                                ->groupBy('shifts.employee_id')
                                                ->having("friday_am", '=', 0)
                                                ->get();
                                            if (count($meetings) != count($employees))
                                            {

                                                $meetings = DB::table('shifts')
                                                    ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                                                    ->select('shifts.fridayPm', 'employees.firstname', 'employees.lastname')
                                                    ->whereIn('employee_id', $employees)
                                                    ->selectRaw('SUM(fridayPm) as friday_pm')
                                                    ->groupBy('shifts.employee_id')
                                                    ->having("friday_pm", '=', 0)
                                                    ->get();
                                                if (count($meetings) != count($employees))
                                                {
                                                    return redirect('/inviteEmployees')->with('msg', "Aucun créneau de réunion trouvé. Veuillez inviter différents employés.");
                                                }
                                                else 
                                                {
                                                    
                                                    $meetingDay = "Vendredi Après-midi";
                                                    return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                                                }


                                            }
                                            else 
                                            {
                                                
                                                $meetingDay = "Vendredi Matin";
                                                return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                                            }


                                        }
                                        else 
                                        {
                                           
                                            $meetingDay = "Jeudi Après-midi";
                                            return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                                        }


                                    }
                                    else 
                                    {
                                       
                                        $meetingDay = "Jeudi Matin";
                                        return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                                    }

                                }

                                else 
                                {
                                    
                                    $meetingDay = "Mercredi Après-midi";
                                    
                                    return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                                }




                            }
                            else 
                            {
                                
                                $meetingDay = "Mercredi Matin";
                                return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                            }



                        }


                        else 
                        {
                            
                            $meetingDay = "Mardi Après-midi";
                            return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                        }
                       

                    }
                    else 
                    {
                        
                        $meetingDay = "Mardi Matin";
                        return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                    }
                    






                }
                else 
                {
                    
                    $meetingDay = "Lundi Après-midi";
                    return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
                }

                    



            } 
            else 
            {
               
                $meetingDay = "Lundi Matin";
                return view('createMeeting', compact('employees', 'meetings', 'meetingDay'));
            }



        
    
        

       


        



        // $meetings = DB::table('shifts')
        //         ->select('shifts.*', 'shifts.employee_id', 'employees.lastname')
        //         ->join('employees', 'employees.id', '=', 'shifts.employee_id')
                
        //         ->selectRaw('SUM(mondayAm) as monday_am')
                
        //         ->groupBy('shifts.employee_id')
        //         ->having("monday_am", '=', 0)
        //         ->get();
               
        // $total_length = DB::table('shifts')->select('shifts.employee_id')->get();
        

        // $employees = DB::table('employees')
        //         ->select('*')
        //         ->get();
             
     
        //     if (count($meetings) != count($employees))
        //     {
        //         $meetings = DB::table('shifts')
        //         ->join('employees', 'employees.id', '=', 'shifts.employee_id')
        //         ->select('shifts.employee_id', 'employees.lastname')
        //         ->selectRaw('SUM(mondayPm) as monday_pm')
                
        //         ->groupBy('shifts.employee_id')
        //         ->having("monday_pm", '=', 0)
        //         ->get();
                
        //         if(count($meetings) != count($total_length))

        //         { 
        //             return redirect('/')->with('msg', "Aucun employé n'est disponible en même temps :(");

        //         } else return view('meeting', compact('meetings', 'employees'));

        //     }   else return view('meeting', compact('meetings', 'employees'));

            
                
            



        
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
