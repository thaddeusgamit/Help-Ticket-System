<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Carbon\Carbon;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $user = auth()->id();

        $condition =  ['user_id' => $user];



        $tickets = Ticket::where($condition)->get();

        return view('users.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create_ticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {




        $create_ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);


        if ($request->file('attachment')) {
            $this->storeAttachment($request, $create_ticket);
        }




        return redirect(route('users.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $user)
    {


        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    //store of attachemnts

    protected function storeAttachment($request, $ticket)
    {
        $ext      = $request->file('attachment')->extension();
        $contents = file_get_contents($request->file('attachment'));
        $filename = 'FILE' . '_' . Carbon::now()->format('m-d-Y');
        $path     = "$filename.$ext";
        $request->attachment->move(public_path('attachments'), $path);
        $ticket->update(['attachment' => $path]);
    }
}
