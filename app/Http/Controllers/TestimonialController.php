<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
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
            $data = Testimonial::latest()->get();
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
                            $editurl = route('admin.testimonial.edit', $row->id);
                            $deleteurl = route('admin.testimonial.destroy', $row->id);
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
        return view('backend.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.testimonial.create');
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
            'company_name'=>'required|string',
            'post'=>'required|string',
            'message'=>'required|string|max:250',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'status'=>'required|max:1|min:0',
        ]);
        $imagename='';
        if($request->hasfile('image')){
            $imagename = $request->image->store('testimonial', 'uploads');
        }

        $testimonial = Testimonial::create([
            'name'=>$data['name'],
            'company_name'=>$data['company_name'],
            'post'=>$data['post'],
            'message'=>$data['message'],
            'image'=>$imagename,
            'status'=>$data['status'],
        ]);
        $testimonial->save();
        return redirect()->route('admin.testimonial.index')->with('message', 'Testimonial Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $testimonial = Testimonial::findorfail($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $testimonial = Testimonial::findorfail($id);

        $data = $this->validate($request, [
            'name'=>'required|string',
            'company_name'=>'required|string',
            'post'=>'required|string',
            'message'=>'required|string|max:250',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'status'=>'required|max:1|min:0',
        ]);
        $imagename='';
        if($request->hasfile('image')){
            $imagename = $request->image->store('testimonial', 'uploads');
        }else{
            $imagename = $testimonial->image;
        }

        $testimonial->update([
            'name'=>$data['name'],
            'company_name'=>$data['company_name'],
            'post'=>$data['post'],
            'message'=>$data['message'],
            'image'=>$imagename,
            'status'=>$data['status'],
        ]);
        $testimonial->save();
        return redirect()->route('admin.testimonial.index')->with('message', 'Testimonial Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $testimonial = Testimonial::findorFail($id);
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('message', 'Testimonial Successfully Deleted');
    }
}
