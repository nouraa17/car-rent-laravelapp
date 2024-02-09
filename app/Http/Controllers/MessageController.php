<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MessageController extends Controller
{
    private $columns = [
        'fname',
        'lname',
        'email',
        'message'
    ];

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $messages = Message::get();
        $unreadCount = Message::where('is_viewed', false)->count();

        return view('admin.messages.listMessages', compact('messages', 'unreadCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        $formData = $request->only($this->columns);
        Message::create($formData);
        $mail = new ContactMail($formData);
        Mail::to('car_rent@example.com')->send($mail);
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        if ($message) {
            $message->is_viewed = true;
            $message->save();
        }
        return view('admin.messages.showMessage', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::where('id', $id)->delete();
        return redirect('listMessages')->with('success', 'Message has been deleted successfully!');
    }

}
