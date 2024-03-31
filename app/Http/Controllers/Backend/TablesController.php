<?php

declare(strict_types=1);

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    //

    public function index()
    {
        $tables = Table::all();
        return view('backend.tables.index', compact('tables'));
    }
    public function create()
    {
        return view('backend.tables.create');
    }


    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return to_route('backend.tables.index')->with('success', 'Table created successfully.');
    }

    public function edit($id)
    {
        $table = Table::findOrFail($id);
        return view('backend.tables.edit', compact('table'));
    }
    public function update(TableStoreRequest $request, $id)
    {
        $table = Table::findOrFail($id);
        $table->update($request->validated());

        return to_route('backend.tables.index')->with('success', 'Table updated successfully.');
    }

    public function destroy($id)
    {
        $table= Table::findOrFail($id);
        $table->reservations()->delete();
        $table->delete();

        return to_route('backend.tables.index')->with('danger', 'Table daleted successfully.');
    }

}
