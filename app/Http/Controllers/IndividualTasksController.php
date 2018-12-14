<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividualTasksController extends Controller
{
    public function index()

    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $individualtasks = $user->individualtasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'individualtasks' => $individualtasks,
            ];
    }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->individualtasks()->create([
            'content' => $request->content,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $micropost = \App\IndividualTask::find($id);

        if (\Auth::id() === $individualtask->user_id) {
            $individualtask->delete();
        }

        return back();
    }
}