<?php

namespace App\Http\Controllers;

use App\Models\BookRecord;
use App\Http\Requests\StoreBookRecordRequest;
use App\Http\Requests\UpdateBookRecordRequest;
use Illuminate\Http\Request;

class BookRecordController extends Controller
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
     * @param  \App\Http\Requests\StoreBookRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function show(BookRecord $bookRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(BookRecord $bookRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRecordRequest  $request
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookRecord $bookRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookRecord  $bookRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookRecord $bookRecord)
    {
        //
    }
}
