<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return $request;
        $contact = new Contact();
        $contact->fullname = $this->replaceSpecialCharacters($request->fullname);
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->content = $this->replaceSpecialCharacters($request->content);
        $saveContact = $contact->save();

        if($saveContact) {
            $message = ["msg" => "Thank you for your contact. I will respond back soon. !!", "status" => true];
            return $message;
        }else {
            $message = ["msg" => "Oh! Sorry. Your contact could not be sent. Please try again!!!", "status" => false];
        }
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

    private function replaceSpecialCharacters($string){
        $arraySpecialCharaters = ['<', '>', '&', '"', '\''];
        $replace   = ['&lt;', '&gt;', '	&amp;', '&quot;', '&#039;'];
        return str_replace($arraySpecialCharaters, $replace, $string);
    }
}
