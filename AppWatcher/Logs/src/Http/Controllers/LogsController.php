<?php

namespace AppWatcher\Logs\Http\Controllers;

use AppWatcher\App\Repositories\AppRepository;
use AppWatcher\Logs\Repositories\LogRepository;
use AppWatcher\Logs\Repositories\TagRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Validator;

class LogsController extends Controller
{
    /**
     * @var AppWatcher\Logs\Repositories\LogRepository
     */
    private $log;

    public function __construct(LogRepository $log)
    {
        $this->log = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->has('tag')) {
            return $this->log->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->input('tag'));
            })->paginate(15);
        }

        return $this->log->paginate(15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('logs::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request, AppRepository $appRepo, TagRepository $tagRepo)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'log'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $app = $appRepo->findByAttributes(
            [
                'app_key'    => $request->header('app-key'),
                'app_secret' => $request->header('app-secret'),
            ]
        );
        $tags = [];
        if ($request->has('tags')) {
            $tags = $tagRepo->getTagsRelatedtoApp($request->input('tags'), $app);
        }

        $this->log->createLog($request->all(), $tags, $app);
    }

    /**
     * Show the specified resource.
     *
     * @return Response
     */
    public function show()
    {
        return view('logs::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        return view('logs::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
    }
}
