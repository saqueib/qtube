<?php

namespace App\Http\Controllers;

use App\Channel;
use App\API\ApiHelper;
use App\Repos\Repository;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    use ApiHelper;

    /**
     * @var Repository
     */
    protected $model;

    /**
     * ChannelController constructor.
     *
     * @param Channel $channel
     */
    public function __construct(Channel $channel)
    {
        $this->model = new Repository( $channel );

        // Protect all except reading
        $this->middleware('auth:api', ['except' => ['index', 'show'] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->with('user')->latest()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // run the validation
        $this->beforeCreate($request);

        return $request->user()->channels()
            ->create( $request->only($this->model->getModel()->fillable));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $channel = $this->model->with('user')->findOrFail($id);

        // check for videos
        if( $request->has('videos') ) {
            $channel->videos = $channel->videos()->with(['channel', 'category'])->latest()->paginate(8);
        }

        return $channel;
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
        $this->beforeUpdate($request);

        // validate the channel id belongs to user
        if( ! $request->user()->channels()->find($id) ) {
            return $this->errorForbidden('You can only edit your channel.');
        }

        if (! $this->model->update($request->only($this->model->getModel()->fillable), $id) ) {
            return $this->errorBadRequest('Unable to update.');
        }

        return $this->model->find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // run before delete checks
        if (! $request->user()->channels()->find($id)) {
            return $this->errorNotFound('Channel not found.');
        }

        return $this->model->delete($id) ? $this->noContent() : $this->errorBadRequest();
    }
}
