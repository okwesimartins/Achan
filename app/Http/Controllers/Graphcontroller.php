<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;
use Carbon\Carbon;
class Graphcontroller extends Controller
{
    public function graph(){
        $branch = auth()->guard('admin-api')->user()->branches()->get();
        $array2= array();
        $carbondate=Carbon::now();
        $year=$carbondate->year;
        
        foreach($branch as $value){
            $userid= $value->userid;
            
            $tripcheck = Trips::where('airline_branch_id',$userid)->get();
            if($tripcheck){
              
                   $january = Trips::where('airline_branch_id',$userid)->where('month',"January")->where('year',$year)->get()->sum('total');
                   $february = Trips::where('airline_branch_id',$userid)->where('month',"February")->where('year',$year)->get()->sum('total');
                   $march= Trips::where('airline_branch_id',$userid)->where('month',"March")->where('year',$year)->get()->sum('total');
                   $april= Trips::where('airline_branch_id',$userid)->where('month',"April")->where('year',$year)->get()->sum('total');
                   $may=Trips::where('airline_branch_id',$userid)->where('month',"May")->where('year',$year)->get()->sum('total');
                   $june = Trips::where('airline_branch_id',$userid)->where('month',"June")->where('year',$year)->get()->sum('total');
                   $july=Trips::where('airline_branch_id',$userid)->where('month',"July")->where('year',$year)->get()->sum('total');
                   $august=Trips::where('airline_branch_id',$userid)->where('month',"August")->where('year',$year)->get()->sum('total');
                   $september = Trips::where('airline_branch_id',$userid)->where('month',"September")->where('year',$year)->get()->sum('total');
                   $october =Trips::where('airline_branch_id',$userid)->where('month',"October")->where('year',$year)->get()->sum('total');
                   $november=Trips::where('airline_branch_id',$userid)->where('month',"November")->where('year',$year)->get()->sum('total');
                   $december=Trips::where('airline_branch_id',$userid)->where('month',"December")->where('year',$year)->get()->sum('total');


                   $array1 = [
                    "january"=>$january,
                    "february"=>$february,
                    "march"=>$march,
                    "april"=>$april,
                    "may"=>$may,
                    "june"=>$june,
                    "july"=>$july,
                    "august"=>$august,
                    "september"=>$september,
                    "october"=>$october,
                    "november"=>$november,
                    "december"=>$december
                   ];

                   array_push($array2,$array1);

            }else{
                 
                $array1 = [
                    "january"=>"0",
                    "february"=>"0",
                    "march"=>"0",
                    "april"=>"0",
                    "may"=>"0",
                    "june"=>"0",
                    "july"=>"0",
                    "august"=>"0",
                    "september"=>"0",
                    "october"=>"0",
                    "november"=>"0",
                    "december"=>"0"
                   ];

                   array_push($array2,$array1);
            }
        }

        $january = 0;
        $february = 0;
        $march =0;
        $april=0;
        $may=0;
        $june=0;
        $july=0;
        $august=0;
        $september=0;
        $october=0;
        $november=0;
        $december=0;
        foreach($array2 as $value){
       
        if(isset($value['january'])){
           
            $january +=  $value['january'];
        }  
        if(isset($value['february'])){
            $february += $value['february'];
        }
        if(isset($value['march'])){
            $march  += $value['march'];
        }
        if(isset($value['april'])){
            $april += $value['april'];
        }
        if(isset($value['may'])){
            $may += $value['may'];
        } 
        if(isset($value['june'])){
            $may += $value['june'];
        }
        if(isset($value['july'])){
            $july += $value['july'];
        }
        if(isset($value['august'])){
            $august += $value['august'];
        }
        if(isset($value['september'])){
            $september += $value['september'];
        }
        if(isset($value['october'])){
            $october += $value['october'];
        }
        if(isset($value['november'])){
            $november += $value['november'];
        }
        if(isset($value['december'])){
            $december += $value['december'];
        }
        }

        return response()->json([
                    "january"=>$january,
                    "february"=>$february,
                    "march"=>$march,
                    "april"=>$april,
                    "may"=>$may,
                    "june"=>$june,
                    "july"=>$july,
                    "august"=>$august,
                    "september"=>$september,
                    "october"=>$october,
                    "november"=>$november,
                    "december"=>$december
        ]);
    }



    //graph for branch

    public function branchgraph(){
            $branch= auth()->guard('user-api')->user();
            $carbondate=Carbon::now();
            $year=$carbondate->year;
            $userid= $branch->userid;
            $tripcheck = Trips::where('airline_branch_id',$userid)->get();
            if($tripcheck){
                  
                $january = Trips::where('airline_branch_id',$userid)->where('month',"January")->where('year',$year)->get()->sum('total');
                $february = Trips::where('airline_branch_id',$userid)->where('month',"February")->where('year',$year)->get()->sum('total');
                $march= Trips::where('airline_branch_id',$userid)->where('month',"March")->where('year',$year)->get()->sum('total');
                $april= Trips::where('airline_branch_id',$userid)->where('month',"April")->where('year',$year)->get()->sum('total');
                $may=Trips::where('airline_branch_id',$userid)->where('month',"May")->where('year',$year)->get()->sum('total');
                $june = Trips::where('airline_branch_id',$userid)->where('month',"June")->where('year',$year)->get()->sum('total');
                $july=Trips::where('airline_branch_id',$userid)->where('month',"July")->where('year',$year)->get()->sum('total');
                $august=Trips::where('airline_branch_id',$userid)->where('month',"August")->where('year',$year)->get()->sum('total');
                $september = Trips::where('airline_branch_id',$userid)->where('month',"September")->where('year',$year)->get()->sum('total');
                $october =Trips::where('airline_branch_id',$userid)->where('month',"October")->where('year',$year)->get()->sum('total');
                $november=Trips::where('airline_branch_id',$userid)->where('month',"November")->where('year',$year)->get()->sum('total');
                $december=Trips::where('airline_branch_id',$userid)->where('month',"December")->where('year',$year)->get()->sum('total');

                return response()->json([
                  
                        "january"=>$january,
                        "february"=>$february,
                        "march"=>$march,
                        "april"=>$april,
                        "may"=>$may,
                        "june"=>$june,
                        "july"=>$july,
                        "august"=>$august,
                        "september"=>$september,
                        "october"=>$october,
                        "november"=>$november,
                        "december"=>$december
                       
                ]);
                   
            }else{
                return response()->json([
                  
                    "january"=>"0",
                    "february"=>"0",
                    "march"=>"0",
                    "april"=>"0",
                    "may"=>"0",
                    "june"=>"0",
                    "july"=>"0",
                    "august"=>"0",
                    "september"=>"0",
                    "october"=>"0",
                    "november"=>"0",
                    "december"=>"0"
                   
            ]);
            }


    }
}
