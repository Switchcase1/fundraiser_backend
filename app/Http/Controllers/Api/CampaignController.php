<?php

namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Setting; 
use App\Models\Campaign;
use App\Models\Contributors;
use Illuminate\Support\Facades\Http;


class CampaignController extends Controller
{
    public function list(){
        
        $campaigns = Campaign::select('campaigns.*', \DB::raw('SUM(contributors.fund_given) As fundsCollected'))
         ->leftJoin('contributors', 'contributors.campaign_id', '=', 'campaigns.id')
         ->groupBy('campaigns.id')
         ->get();
        
       
    
        return response()->json(['campaigns'=>$campaigns], 200);
    }
    public function get_data(Request $request){
     
        $id = $request->get('id');
        $campaign = Campaign::where('id',$id)->first();
        $fundsCollected = Contributors::where('campaign_id',$id)->sum('fund_given');
        $campaign->fundsCollected = $fundsCollected;
        return response()->json($campaign, 200);
        
    }
    public function donate(Request $request){
        $campaign_id = $request->get('id');
        $amount = $request->get('amount');
        $header = $request->header('Authorization');
        
        
        //deduct convince fee from amount 2.5% or saved from admin
        $settings = Setting::first();
        $convince_fee = $settings->convince_fee;
        if($convince_fee>0){
            $percentage_amount = $amount*$convince_fee/100;
            if($percentage_amount>0){
                $amount = $amount - $percentage_amount;
            }
        }
        
        
        //get user
        $user = User::where('token',$header)->first();
       
        $data=array(
            'campaign_id'=>$campaign_id,
            'contributor_id'=>$user->id,
            'fund_given'=>$amount
        );
        
        
        $fundsCollected = Contributors::create($data);
        
        
       
        return response()->json([], 200);
    }
}
