<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutEquipmentController extends Controller
{
    public function index()
    {
        $data = AboutEquipment::get();
        return view('pages.admin.laporan.aboutequipment.about_equipment', compact('data'));
    }

    public function create()
    {
        return view('pages.admin.laporan.aboutequipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_equipment' => 'required|unique:about_equipment,name_equipment',
            'position' => 'required',
            'description' => 'required',
            'specification' => 'required',
            'img_equipment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $equipment = new AboutEquipment();

        $equipment->name_equipment = Str::upper($request->name_equipment);
        $equipment->position = $request->position;
        $equipment->description = $request->description;
        $equipment->specification = $request->specification;
        $equipment->img_equipment =  $request->file('img_equipment')->store('uploads');
        $equipment->save();

        return redirect()->route('equipment_about.index')->with('success','Add Data Successfully');

    }

    public function edit($id)
    {
        $data_id = AboutEquipment::where('id',$id)->first();
        return view('pages.admin.laporan.aboutequipment.edit', compact('data_id'));
    }

    public function update(Request $request, $id)
    {
      
        $data = $request->all();

        if($request->file('img_equipment')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $data['img_equipment'] = $request->file('img_equipment')->store('equipments');
        }

        $item = AboutEquipment::findOrFail($id);
        $item->update($data);

        return redirect()->route('equipment_about.index')->with('success', 'Data Updated Successfully');
    }

    public function destroy($id)
    {
        $image = AboutEquipment::findOrFail($id);
    
        // Hapus file gambar dari penyimpanan
        Storage::delete($image->img_equipment);
        
        // Hapus record gambar dari database
        $image->delete();

        return back()->with('success',' Record Deleted Successfully');
    }

    public function view_detail()
    {
        $data = AboutEquipment::get();
        return view('track_reports', compact('data'));
    }
}
