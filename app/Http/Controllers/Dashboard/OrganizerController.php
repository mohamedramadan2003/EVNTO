<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Organizer\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizers = Organizer::latest()->paginate();

        return view('dashboard.organizers.index', compact('organizers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Organizer $organizer)
    {
        return view('dashboard.organizers.create', compact('organizer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:organizers',
            'password' => 'required|string|min:7',
            'type' => 'required|string|in:Team,Mentor',
            'role_id' => 'required|exists:roles,id',
        ]);

        $organizer = Organizer::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'type' => $validatedData['type'],
            'role_id' => $validatedData['role_id'],
        ]);

        // Redirect or respond as needed
        return redirect()->route('dashboard.organizers.index')->with('success', 'Organizer created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer $organizer)
    {

        return view('organizers.edit', compact('organizer'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organizer $organizer)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:organizers,email,' . $organizer->id,
            'password' => 'nullable|string|min:8|confirmed',  // Password is optional
            'type' => 'required|string|in:Team,Mentor',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Update organizer data
        $organizer->name = $validatedData['name'];
        $organizer->email = $validatedData['email'];
        $organizer->type = $validatedData['type'];
        $organizer->role_id = $validatedData['role_id'];

        // Check if password is provided for update
        if (!empty($validatedData['password'])) {
            $organizer->password = Hash::make($validatedData['password']);
        }

        $organizer->save();

        return redirect()->route('dashboard.organizers.index')->with('success', 'Organizer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer $organizer)
    {
        $organizer->delete();

        return redirect()->route('dashboard.organizers.index')->with('success', 'Organizer deleted successfully.');
    }

}
