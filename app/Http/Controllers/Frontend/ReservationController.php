<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStepOneRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request){
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::today()->addWeek();
        return view('reservations.step-one', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(StoreStepOneRequest $request){
        $validated = $request->validated();
        if(!$request->session()->has('reservation')){
            $reservation = New Reservation();
            $reservation->fill($validated);
            dd($reservation);
            $request->session()->put('reservation', $reservation);
        }else{
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        return to_route('reservations.step.two');
    }

    public function stepTwo(Request $request){

        $reservation = $request->session()->get('reservation');

        $reservation_tables_id = Reservation::orderBy('res_date')->get()->filter( function($value) use ($reservation){
            return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d') ;
        })->pluck('table_id');

        $tables = Table::where('status', TableStatus::Avaliable)
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $reservation_tables_id)
            ->get();

        return view('reservations.step-two', compact('reservation', 'tables'));

    }

    public function storeStepTwo(Request $request){

        $validated = $request->validate([
            'table_id' => ['required']
        ]);

        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');
        return to_route('thankyou');
    }
}
