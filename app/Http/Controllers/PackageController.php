<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Products;
use App\Models\Packages;
use App\Models\DetailPackages;
use Illuminate\Support\Facades\DB;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::all();
        return view('package.index',['packages'=>DB::table('packages')->paginate(8)]);
    }

    public function index_list()
    {
        $packages = Packages::all();
        return view('package.index_list',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        return view('package.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'normal_price' => 'required|numeric',
            'end_price' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->file('photo')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['photo'] = $request->file('photo')->store('photo');
        }
        
        $producted = Packages::create($validatedData);

        foreach ($request->products as $product) {
            DetailPackages::create([
                'packages_id' => $producted->id,
                'id_product' => $product,
                'quantity' => $request->quantity
            ]);
        }
     
        return redirect('/package')->with('success','Data package berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packages = Packages::find($id);
        return view('package.show', compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages = Packages::find($id);
        $products = Products::all();
        return view('package.edit',compact('packages','products'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'normal_price' => 'required|numeric',
            'end_price' => 'required|numeric',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->file('photo')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['photo'] = $request->file('photo')->store('photo');
        }

        Packages::where('id',$id)->update($validatedData);

        if($request->products){
        foreach ($request->products as $product) {
            DetailPackages::create([
                'packages_id' => $id,
                'id_product' => $product,
                'quantity' => $request->quantity
            ]);
            }
         }
     
        return redirect('/package')->with('success','Data package berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailpackages = DB::table('detail_packages')->where('packages_id', $id);
        $detailpackages->delete();
        
        $package = Packages::find($id);

        if($package->photo){
            Storage::delete($package->photo);
        }

        $package->delete();
        
        return redirect()->back()->with('success','Data packages telah dihapus');
    }

    public function destroyProducts($id)
    {
        $product = DetailPackages::find($id);
        $product->delete();
        return redirect()->back()->with('success','Data product pada packages telah dihapus');
    }
}
