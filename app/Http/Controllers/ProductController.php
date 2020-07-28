<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class ProductController extends Controller
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
            $data = Product::latest()->get();
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
                            $editurl = route('admin.product.edit', $row->id);
                            $deleteurl = route('admin.product.destroy', $row->id);
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

        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.product.create");
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
            'image'=>'required|image|mimes:png,jpg,jpeg',
            'status'=>'required|boolean'
        ]);

        $imagename = '';
        if($request->hasfile('image')){
            $imagename = $request->image->store('blog_image', 'uploads');
        }
        $product = Product::create([
            'title'=>$data['title'],
            'slug'=>Str::slug($data['title']),
            'details'=>$data['details'],
            'image'=>$imagename,
            'status'=>$data['status'],
        ]);
        $product->save();
        return redirect()->route('admin.product.index')->with('message', 'Product Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findorFail($id);
        return view('backend.product.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findorfail($id);
        $data = $this->validate($request, [
            'title'=>'required|string|max:255',
            'details'=>'required|string',
            'image'=>'image|mimes:png,jpg,jpeg',
            'status'=>'required|boolean',
        ]);

        $imagename = '';
        if($request->hasfile('image')){
            $imagename = $request->image->store('product_image', 'uploads');
        }
        else{
            $imagename = $product->image;
        }
        $product->update([
            'title'=>$data['title'],
            'slug'=>Str::slug($data['title']),
            'details'=>$data['details'],
            'image'=>$imagename,
            'status'=>$data['status'],
        ]);
        $product->save();
        return redirect()->route('admin.product.index')->with('message', 'Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findorFail($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('message', 'Product Successfully Deleted');
    }
}
