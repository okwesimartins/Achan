<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trips;
use Carbon\Carbon;
class Graphcontroller extends Controller
{   //graph for admin revenue
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




//graph for admin commission

 public function admincomgraph(){

    $branch = auth()->guard('admin-api')->user()->branches()->get();
    $array2= array();
    $carbondate=Carbon::now();
    $year=$carbondate->year;
    $percentage=0.1;
    foreach($branch as $value){
        $userid= $value->userid;
        
        $tripcheck = Trips::where('airline_branch_id',$userid)->get();
        if($tripcheck){
          
               $num = Trips::where('airline_branch_id',$userid)->where('month',"January")->where('year',$year)->get()->sum('total');
               $january= (int)$num * $percentage;
               
               $num1= Trips::where('airline_branch_id',$userid)->where('month',"February")->where('year',$year)->get()->sum('total');
               $february = (int)$num1 * $percentage;

               $num2= Trips::where('airline_branch_id',$userid)->where('month',"March")->where('year',$year)->get()->sum('total');
               $march= (int)$num2 * $percentage;

               $num3= Trips::where('airline_branch_id',$userid)->where('month',"April")->where('year',$year)->get()->sum('total');
               $april= (int)$num3 * $percentage;

               $num4=Trips::where('airline_branch_id',$userid)->where('month',"May")->where('year',$year)->get()->sum('total');
               $may= (int)$num4 * $percentage;

               $num5= Trips::where('airline_branch_id',$userid)->where('month',"June")->where('year',$year)->get()->sum('total');
               $june =(int)$num5 * $percentage;

               $num6 =Trips::where('airline_branch_id',$userid)->where('month',"July")->where('year',$year)->get()->sum('total');
               $july= (int)$num6 * $percentage;

               $num7=Trips::where('airline_branch_id',$userid)->where('month',"August")->where('year',$year)->get()->sum('total');
               $august= (int)$num7 * $percentage;

               $num8= Trips::where('airline_branch_id',$userid)->where('month',"September")->where('year',$year)->get()->sum('total');
               $september = (int)$num8 * $percentage;

               $num9 =Trips::where('airline_branch_id',$userid)->where('month',"October")->where('year',$year)->get()->sum('total');
               $october=  (int)$num9 * $percentage;

               $num10=Trips::where('airline_branch_id',$userid)->where('month',"November")->where('year',$year)->get()->sum('total');
               $november= (int)$num10 * $percentage;

               $num11=Trips::where('airline_branch_id',$userid)->where('month',"December")->where('year',$year)->get()->sum('total');

               $december= (int)$num11 * $percentage;


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




//graph for branch commission
     
public function branchcomgraph(){
    $branch= auth()->guard('user-api')->user();
    $percentage= 0.1;
    $carbondate=Carbon::now();
    $year=$carbondate->year;
    $userid= $branch->userid;
    $tripcheck = Trips::where('airline_branch_id',$userid)->get();
    if($tripcheck){
          
        $bnum = Trips::where('airline_branch_id',$userid)->where('month',"January")->where('year',$year)->get()->sum('total');
        $january=$bnum * $percentage;
        $bnum1 = Trips::where('airline_branch_id',$userid)->where('month',"February")->where('year',$year)->get()->sum('total');
        $february= $bnum1 * $percentage ;
        $bnum2= Trips::where('airline_branch_id',$userid)->where('month',"March")->where('year',$year)->get()->sum('total');
        $march = $bnum2 * $percentage;
        $bnum3= Trips::where('airline_branch_id',$userid)->where('month',"April")->where('year',$year)->get()->sum('total');
        $april= $bnum3 * $percentage;


        $bnum4=Trips::where('airline_branch_id',$userid)->where('month',"May")->where('year',$year)->get()->sum('total');
        $may=$bnum4 * $percentage;
        $bnum5= Trips::where('airline_branch_id',$userid)->where('month',"June")->where('year',$year)->get()->sum('total');

        $june =$bnum5 * $percentage;
        $bnum6=Trips::where('airline_branch_id',$userid)->where('month',"July")->where('year',$year)->get()->sum('total');
        $july =$bnum6 * $percentage;

        $bnum7=Trips::where('airline_branch_id',$userid)->where('month',"August")->where('year',$year)->get()->sum('total');
        $august = $bnum7 * $percentage;
        $bnum8= Trips::where('airline_branch_id',$userid)->where('month',"September")->where('year',$year)->get()->sum('total');
        $september = $bnum8 * $percentage;

        $bnum9=Trips::where('airline_branch_id',$userid)->where('month',"October")->where('year',$year)->get()->sum('total');
        $october = $bnum9 * $percentage;

        $bnum10=Trips::where('airline_branch_id',$userid)->where('month',"November")->where('year',$year)->get()->sum('total');
        $november = $bnum10 * $percentage;

        $bnum11=Trips::where('airline_branch_id',$userid)->where('month',"December")->where('year',$year)->get()->sum('total');
        $december = $bnum11 * $percentage;

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




    //graph for branch revenue

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
