<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
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
            $data = Service::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('icon', function($row){
                        $icon = "<i class='$row->icon'></i>";
                        return $icon;
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
                    ->addColumn('featured', function($row){
                        $featured = $row->featured;
                        if($featured==1){
                            $featured = 'Yes';
                        }else{
                            $featured = "No";
                        }
                        return $featured;
                    })
                    ->addColumn('action', function($row){
                            $editurl = route('admin.service.edit', $row->id);
                            $deleteurl = route('admin.service.destroy', $row->id);
                            $csrf_token = csrf_token();
                           $btn = "<a href='$editurl' class='edit btn btn-primary btn-sm'>Edit</a>
                           <form action='$deleteurl' method='POST' style='display:inline-block'>
                           <input type='hidden' name='_token' value='$csrf_token'>
                           <input type='hidden' name='_method' value='DELETE' />
                               <button type='submit' class='btn btn-danger'>Delete</button>
                           </form>
                           ";

                            return $btn;
                    })
                    ->rawColumns(['action', 'icon', 'status', 'featured'])
                    ->make(true);
        }

        return view('backend.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.service.create');
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
            'title'=>'required|string|max:255',
            'details'=>'required|string',
            'icon'=>'required|string',
            'status'=>'required|boolean',
            'featured'=>'required|boolean'
        ]);
        $service = Service::create([
            'title'=>$data['title'],
            'slug'=>Str::slug($data['title']),
            'details'=>$data['details'],
            'icon'=>$data['icon'],
            'status'=>$data['status'],
            'featured'=>$data['featured'],
        ]);
        $service->save();
        return redirect()->route('admin.service.index')->with('message', 'Service Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $service = Service::findorfail($id);
        return view('backend.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $service = Service::findorfail($id);
        $data = $this->validate($request, [
            'title'=>'required|string|max:255',
            'details'=>'required|string',
            'icon'=>'required|string',
            'status'=>'required|boolean',
            'featured'=>'required|boolean'
        ]);
        $service->update([
            'title'=>$data['title'],
            'slug'=>Str::slug($data['title']),
            'details'=>$data['details'],
            'icon'=>$data['icon'],
            'status'=>$data['status'],
            'featured'=>$data['featured'],
        ]);
        $service->save();
        return redirect()->route('admin.service.index')->with('message', 'Service Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $service = Service::findorFail($id);
        $service->delete();
        return redirect()->route('admin.service.index')->with('message', 'Service Successfully Deleted');
    }
}
