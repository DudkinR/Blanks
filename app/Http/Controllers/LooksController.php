<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LooksController extends Controller
{
    public function index(){
        return view("looks.index");
    }
    public function search(Request $request){
        $search=[];
        $sw=[];
        $words=$request->search;
        //
        if(isset($request->cats)){
        $search= array_merge($this->cat($words),$search);
        $sw['cats']=1;
        }
        if(isset($request->projects)){
        $search= array_merge($this->project($words),$search);
        $sw['projects']=1;
        }// posetions
        if(isset($request->blanks)){
        $search= array_merge($this->blank($words),$search);
        $sw['blanks']=1;
        }// items
        if(isset($request->items)){
        $search= array_merge($this->item($words),$search);
        $sw['items']=1;
        }// blanks
         if(isset($request->positions)){
        $search= array_merge($this->position($words),$search);
        $sw['positions']=1;
        }
        usort($search, function ($a, $b) {
            return $b[4] <=> $a[4];
        });
        // return 10 first
        $mass = array_slice($search, 0, 10);

       // $search->orderBy(4,'desc');

        return view("looks.index",['search'=>$mass,'words'=>$request->search,'sw'=>$sw]);
    }
    public function  countW($words, $m){
            // выдать сколько слов из масива $words есть в мавиве $mass 2 и 3
            $count = 0;
            foreach ($words as $word) {
                $wds = explode($word, $m[2]);
                $count += count($wds) - 1;
                $wds = explode($word, $m[3]);
                $count += count($wds) - 1;
            }
            return $count;
      }
    public function normalstringtoMass($string){
        if(trim($string)!==''){
        $string=strip_tags($string);
      //  $string=get_meta_tags($string);
        $string=htmlentities($string);
       $mass= explode(" ",$string);}
       else $mass=[];
       return  $mass;
    }
    public function position($words){

        $words=$this->normalstringtoMass($words);
        $res= \App\Models\Position::where(
            "author_id",
            "=",
            Auth::id()
        )
        ->where( 
             function($q) use($words){ 
 
                 foreach($words as $word){
                     $q->orwhere('name','like','%'.$word.'%')
                     ->orwhere('description','like','%'.$word.'%')
                     ->orwhere('abv','like','%'.$word.'%');
                 }
                 return $q;
             }
         )->get();
         $rtt=[];
         foreach($res as $row){
             $rt[0]='2'; // 0 position
              $rt[1]=$row->id;
              $rt[2]=$row->name;
              $rt[3]=$row->description;
              $rt[4]=$this->countW($words, $rt); // function how many words
              $rtt[]=$rt;
         };
         return  $rtt;   
 
     }
     public function blank($words){
        $words=$this->normalstringtoMass($words);
        $res= \App\Models\Blank::where(
            "author_id",
            "=",
            Auth::id()
        )
        ->where( 
             function($q) use($words){ 
 
                 foreach($words as $word){
                     $q->orwhere('name','like','%'.$word.'%')
                     ->orwhere('tcheme','like','%'.$word.'%')
                     ;
                 }
                 return $q;
             }
         )->get();
         $rtt=[];
         foreach($res as $row){
             $rt[0]='3'; // 0 blank
              $rt[1]=$row->id;
              $rt[2]=$row->name;
              $rt[3]=$row->tcheme;
              $rt[4]=$this->countW($words, $rt);  // function how many words
              $rtt[]=$rt;
         };
         return  $rtt;   
     }
     public function item($words){
        $words=$this->normalstringtoMass($words);
        $res= \App\Models\Item::where(
            "author_id",
            "=",
            Auth::id()
        )
        ->where( 
             function($q) use($words){ 
 
                 foreach($words as $word){
                     $q->orwhere('name','like','%'.$word.'%')
                     ->orwhere('content','like','%'.$word.'%')
                     ;
                 }
                 return $q;
             }
         )->get();
         $rtt=[];
         foreach($res as $row){
             $rt[0]='4'; // 4 item
              $rt[1]=$row->id;
              $rt[2]=$row->name;
              $rt[3]=$row->content;
              $rt[4]=$this->countW($words, $rt); // function how many words
              $rtt[]=$rt;
         };
         return  $rtt;   
     }
     
    public function cat($words){
        $words=$this->normalstringtoMass($words);
       $res= \App\Models\Category::where(
            "author_id",
            "=",
            Auth::id()
        )
        ->where( 
            function($q) use($words){ 

                foreach($words as $word){
                    $q->orwhere('name','like','%'.$word.'%')
                    ->orwhere('description','like','%'.$word.'%');
                }
                return $q;
            }
        )->get();
        $rtt=[];
        foreach($res as $row){
            $rt[0]='0'; // 0 category
             $rt[1]=$row->id;
             $rt[2]=$row->name;
             $rt[3]=$row->description;
             $rt[4]=$this->countW($words, $rt);  // function how many words
             $rtt[]=$rt;
        };
        return  $rtt;   

    }
    public function project($words){
        $words=$this->normalstringtoMass($words);
        $res= \App\Models\Project::where(
            "author_id",
            "=",
            Auth::id()
        )
        ->where( 
             function($q) use($words){ 
 
                 foreach($words as $word){
                     $q->orwhere('name','like','%'.$word.'%');
                 }
                 return $q;
             }
         )->get();
         $rtt=[];
         foreach($res as $row){
             $rt[0]='1'; // 1 project
              $rt[1]=$row->id;
              $rt[2]=$row->name;
              $rt[3]=$row->name;
              $rt[4]=$this->countW($words, $rt);  // function how many words
              $rtt[]=$rt;
         };
         return  $rtt;   
 
     }
}
