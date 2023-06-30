<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Contributors;
use App\Models\Setting;

class CampaignController extends Controller
{
    public function index(){
        $campaigns = Campaign::all();
        
        return view('welcome',["campaigns"=>$campaigns]);
    }
    
    public function add(){
       
        return view('campaigns.add');
       
        //return redirect("/")->withSuccess('Campaign added successfully');

    }
    public function save(Request $request){
       
        $data = $request->all();
      //  print_r($data);die;
        if ($request->hasFile('image')) {
            //$uploadedImage = $request->file('image')->store('images',['disk' => 'public']);
            
            //$uploadedImage = \Storage::disk('public')->putFile('images', $request->file('image'));


            $path = $request->file('image')->store('image');
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);


            $data['image'] = url('images/').'/'.$fileName;
        }
        
        $campaign = Campaign::create($data);
        
        return redirect("/")->withSuccess('Campaign added successfully');

    }
    public function delete($id=0){
        Campaign::where('id',$id)->delete();
        return redirect("/")->withSuccess('Campaign deleted successfully');

    }
     public function view($id=0){
        $campaign = Campaign::where('id',$id)->first();
        $contributors = Contributors::where('campaign_id',$id)->get();
        $fundsCollected = Contributors::where('campaign_id',$id)->sum('fund_given');
        return view('campaigns.view',["campaign"=>$campaign,"contributors"=>$contributors,"fundsCollected"=>$fundsCollected]);


    }
    
    public function settings(){
        $settings = Setting::first();
        
         return view('campaigns.settings',["setting"=>$settings]);
    }
    public function save_settings(Request $request){
            $data = $request->all();
            $contributors = Setting::where('id',$data['id'])->update(array('convince_fee'=>$data['convince_fee']));
            return back()->withSuccess('Settings updated successfully');
    }
}
