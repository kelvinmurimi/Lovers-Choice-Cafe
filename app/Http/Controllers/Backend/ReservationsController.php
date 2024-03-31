<?php

declare(strict_types=1);

namespace App\Http\Controllers\backend;
use App\Enums\TableStatus;
use App\Http\Requests\ReservationStoreRequest;

use App\Models\Table;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    //
    public function index()
    {
        $reservations = Reservation::latest()->with('table')->paginate(6);
        return view('backend.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('backend.reservations.create', compact('tables'));
    }

    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('danger', 'Please choose the table base on guests.');
        }
       /* $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('info', 'This table is reserved for this date.');
            }
        }*/
        Reservation::create($request->validated());

        return to_route('backend.reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function edit($id)
    {
        $reservation= Reservation::findOrFail($id);
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('backend.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(ReservationStoreRequest $request, $id)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('danger', 'Please choose the table base on guests.');
        }
        $reservation= Reservation::findOrFail($id);
       // $request_date = Carbon::parse($request->res_date);
      /*  $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }*/

        $reservation->update($request->validated());
        return to_route('backend.reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation=Reservation::findOrFail($id);
        $reservation->delete();

        return to_route('backend.reservations.index')->with('danger', 'Reservation deleted successfully.');
    }
}
