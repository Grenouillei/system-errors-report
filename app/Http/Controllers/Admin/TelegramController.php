<?php

namespace App\Http\Controllers\Admin;

use App\Models\Telegram;
use App\Services\TelegramService;
use Illuminate\Http\Request;

class TelegramController extends AdminController
{

    protected $service;
    protected $title = 'Telegram API';

    public function __construct(TelegramService $service)
    {
        $this->service = $service;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->content = view('admin.telegram.index')->with([
            'model' => Telegram::findOrFail(1),
            'title' => $this->title
        ])->render();
        return $this->renderOutput();
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
    public function store(Request $request,Telegram $telegram)
    {
        $this->service->store($request,$telegram);
        return redirect()->route('telegrams.index');
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
    public function update(Request $request, Telegram $telegram)
    {
        $this->service->store($request,$telegram);
        return redirect()->route('telegrams.index');
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
