<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = Team::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                        $image = Storage::disk('uploads')->url($row->image);
                        $image = "<img src='$image' style='height:100px; width:100px'>";
                        return $image;
                    })
                    ->addColumn('status', function($row){
                        $status = $row->status;
                        if($status==1){
                            $status = "Approved";
                        }else{
                            $status = "Not Approved";
                        }

                        return $status;
                    })

                    ->addColumn('action', function($row){
                            $editurl = route('admin.team.edit', $row->id);
                            $deleteurl = route('admin.team.destroy', $row->id);
                            $csrf_token = csrf_token();
                           $btn = "<a href='$editurl' class='edit btn btn-primary btn-sm'>Edit</a>
                           <form action='$deleteurl' method='POST' style='display:inline-block;'>
                           <input type='hidden' name='_token' value='$csrf_token'>
                           <input type='hidden' name='_method' value='DELETE' />
                               <button type='submit' class='btn btn-danger'>Delete</button>
                           </form>
                           ";

                            return $btn;
                    })
                    ->rawColumns(['action', 'image', 'status'])
                    ->make(true);
        }
        return view('backend.team.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request, [
            'name'=>'required|string',
            'post'=>'required|string',
            'details'=>'required|string|max:250',
            'facebook'=>'required|string',
            'twitter'=>'required|string',
            'instagram'=>'required|string',
            'linkedin'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'status'=>'required|max:1|min:0',
        ]);
        $imagename='';
        if($request->hasfile('image')){
            $imagename = $request->image->store('team', 'uploads');
        }

        $team = Team::create([
            'name'=>$data['name'],
            'post'=>$data['post'],
            'details'=>$data['details'],
            'facebook'=>$data['facebook'],
            'twitter'=>$data['twitter'],
            'instagram'=>$data['instagram'],
            'linkedin'=>$data['linkedin'],
            'image'=>$imagename,
            'status'=>$data['status'],
        ]);
        $team->save();
        return redirect()->route('admin.team.index')->with('message', 'Team Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $team = Team::findorFail($id);
        return view('backend.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $team = Team::findorFail($id);
        $data = $this->validate($request, [
            'name'=>'required|string',
            'post'=>'required|string',
            'details'=>'required|string|max:250',
            'facebook'=>'required|string',
            'twitter'=>'required|string',
            'instagram'=>'required|string',
            'linkedin'=>'required|string',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'status'=>'required|max:1|min:0',
        ]);
        $imagename='';
        if($request->hasfile('image')){
            $imagename = $request->image->store('team', 'uploads');
        }
        else{
            $imagename = $team->image;
        }

        $team->update([
            'name'=>$data['name'],
            'post'=>$data['post'],
            'details'=>$data['details'],
            'facebook'=>$data['facebook'],
            'twitter'=>$data['twitter'],
            'instagram'=>$data['instagram'],
            'linkedin'=>$data['linkedin'],
            'image'=>$imagename,
            'status'=>$data['status'],
        ]);
        $team->save();
        return redirect()->route('admin.team.index')->with('message', 'Team Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $team = Team::findorFail($id);
        $team->delete();
        return redirect()->route('admin.team.index')->with('message', 'Team Successfully Deleted');
    }
}
