<?php

namespace App\Http\Controllers\Frontend;

use App\Contactus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus = Contactus::first();
        return view('frontend.contact-us',  compact('contactus'));
    }

    function sendContact(Request $request)
    {
        $this->validate($request, [
            'fname'         => 'required',
            'email'        => 'required|email',
            'message'      => 'required',
        ]);
            $data = array(
                'fname'         => $request->fname,
                'lname'         => $request->lname,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'message'      => $request->message
            );
            Mail::to('rayenbn26@gmail.com')->send(new ContactMail($data));
            return back()->with('success', 'Thanks for contacting us!');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
