<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Notifications\MessageCreated;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Messenger;

class MessagesController extends Controller
{
    /**
     * MessagesController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'profile.check']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Auth::user()->threads()->paginate();

        return view('frontend.account.messages.index', [
            'threads' => $threads
        ]);
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
        $this->validateForm($request);

        $user = User::findBySlug($request->user_to);

        if ($user) {
            $message = Messenger::from(Auth::id())
                ->to($user->id)
                ->message($request->message)
                ->send();

            $user->notify(new MessageCreated($message));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $user = User::findBySlug($slug);

        $thread = Messenger::from(Auth::id())
            ->to($user->id)
            ->getThread();

        if ($thread) {
            return view('frontend.account.messages.show', [
                'thread' => $thread,
                'user'   => $user
            ]);
        }

        return redirect()->back();

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

    /**
     * Validate request form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'user_to' => 'required',
            'message' => 'required'
        ]);
    }
}