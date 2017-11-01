<?php

namespace AppWatcher\App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use AppWatcher\App\Repositories\AppRepository;
use AppWatcher\App\Http\Requests\CreateAppRequest;

class AppController extends Controller
{
    /**
     * @var AppWatcher\App\Repositories\AppRepository
     */
    private $app;

    public function __construct(AppRepository $app)
    {
        $this->app = $app;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('app::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('app::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateAppRequest $request)
    {
        $app = $this->app->create($request->all());
        Auth::user()->apps()->attach($app->id, ['role' => 'admin']);
        return redirect('apps')->withSuccess('App: '.$app->name.' has been created successfully !');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('app::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('app::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }


    public function dashboard(Request $request){
        return view('app::dashboard');
    }
}
