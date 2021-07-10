<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{


    public function logout(){
        session_destroy();
        session_start();
        session_regenerate_id();
       // $GLOBALS['']
      return redirect('/my-account');
    }


    public function account(){

        $instance=new ProductController();
        $cartId=$instance->get_cart_id();
        $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));

        if (isset($_SESSION['user_id'])){
            return view('vorood',$data);
        }
        return view('account',$data);
    }

    public function a(){


         if (isset($_SESSION['user_id'])){
             $instance=new ProductController();
             $cartId=$instance->get_cart_id();
             $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));
             return view('vorood',$data);
         }


        if (!empty($_POST['sign_email']) && isset($_POST['sign_email'])
            && !empty($_POST['sign_password']) && isset($_POST['sign_password']) &&
            !empty($_POST['sign_password_again']) && isset($_POST['sign_password_again'])
        ){
           $email =$_POST['sign_email'];
           $passwords=$_POST['sign_password'];
           $repasswords=$_POST['sign_password_again'];


           $result=DB::select("SELECT * FROM `users` WHERE `email`=?",[$email]);

           if ($result == null && strlen($passwords) > 4 && $passwords===$repasswords){
             DB::insert("INSERT INTO `users`(`email`, `password`) VALUES (?,?)",array($email,md5($passwords)));

               $result=DB::select("SELECT * FROM `users` WHERE `email`=? and `password`=?",[$email,md5($repasswords)]);
               $_SESSION['user_id']=$result[0]->user_id;
               $_SESSION['email']=$result[0]->email;
               $instance=new ProductController();
               $cartId=$instance->get_cart_id();
               $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));
               return view('vorood',$data);

           }
            return view('account');
        }

        if (!empty($_POST['login_email']) && isset($_POST['login_email']) &&
            !empty($_POST['login_password']) && isset($_POST['login_password'])
        ){
           $email =$_POST['login_email'];
           $passwordl=$_POST['login_password'];


            $result=DB::select("SELECT * FROM `users` WHERE `email`=? and `password`=?",[$email,md5($passwordl)]);

            if ($result != null){

                $_SESSION['user_id']=$result[0]->user_id;
                $_SESSION['email']=$result[0]->email;

                $instance=new ProductController();
                $cartId=$instance->get_cart_id();
                $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));
                return view('vorood',$data);
            }
            return view('account');

        }else{
            return view('account');

        }

    }

    public function t()
    {


        $da=DB::table('users')->get();
$da=collect($da);
      //  $daa=json_decode($da,true);

        //$user= User::find(2);
      //$da['a']=   DB::table('users')->where('user_id','<>',0)->paginate(2);
      // print_r (User::all()->paginate());
//$da['a']= User::all()->paginate(2);
//       echo DB::table('users')->limit(1)->toSql();
//return $da;

        $da=$da->where('user_id','>',2);

        print_r($da);
        $da=DB::table('users')->get();
        print_r($da);
    }
}
