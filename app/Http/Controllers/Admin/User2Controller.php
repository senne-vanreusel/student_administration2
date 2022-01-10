<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;

class User2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterSelect = $request->filterSelect;
        $filter = '%' . $request->filter .'%';

        $filterS =($filterSelect===null || $filterSelect ==="m1" || $filterSelect==="m2") ?'name':null;
        $filterS =($filterSelect==="m3" || $filterSelect ==="m4" ) ?'email':$filterS;
        $filterS =($filterSelect==="m5" ) ?'active':$filterS;
        $filterS =($filterSelect==="m6" ) ?'admin':$filterS;
        $order =($filterSelect==="m2" || $filterSelect==="m6" ) ?'desc':'asc';
        $order =($filterSelect==="m4"  ) ?'desc':$order;

        $users = User::where([['name','like',$filter],['email','like',$filter]])->orderBy($filterS,$order)->paginate(10);
        $result = compact('users');
        Json::dump($result);
        return view('admin.users.index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('admin/users2');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect('admin/users2');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return redirect('admin/users2');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|min:3|email'
        ]);

        // Update genre
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->active == 1){
            $user->active = 1;
        }else{
            $user->active = 0;
        }

        if($request->admin == 1){
            $user->admin = 1;
        }else{
            $user->admin = 0;
        }
        $user->save();

        // Return a success message to master page
        return response()->json([
            'type' => 'success',
            'text' => "The User <b>$user->name</b> has been updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'type' => 'success',
            'text' => "The User <b>$user->name</b> has been deleted"
        ]);
    }

    public function qryUsers()
    {
        $users = User::orderBy('name')
            ->get();
        return $users;
    }
}
