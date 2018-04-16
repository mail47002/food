<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index(Request $request)
    {
        $search = $request->input('s', false);

        return view('backend.users.index', [
            'users' => User::search($search)->paginate(15)
        ]);
    }

    public function create()
    {
        return view('backend.users.create', [
            'user' => new User
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $user = User::create($request->all());

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'Страница успешно создана!');
    }

    public function edit($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('backend.users.edit', [
                'user' => $user
            ]);
        }

        return redirect()->route('admin.users.index');
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        if ($user) {
            $this->validateForm($request);

            $user->fill($request->all())->save();

            return redirect()->back()->with('success', 'Страница успешно обновлена!');
        }

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            return response()->json([
                'success' => 'Страница успешно удалена!'
            ]);
        }

        return response()->json([
            'error' => 'Не удалось удалить страницу!'
        ]);
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'slug'          => 'required',
            'meta_title'    => 'required'
        ]);
    }
}
