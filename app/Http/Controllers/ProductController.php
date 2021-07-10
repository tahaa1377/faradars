<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mobile_Detect;

class ProductController extends Controller
{


    public function how_to_learn($how_to_learn){
        //echo $how_to_learn;
        $data['how_to_learn']=DB::select("SELECT * FROM `type` WHERE `hreff`=?",array('/how-to-learn/'.$how_to_learn));
        return view('type',$data);

    }

    public function explore_topics(){
        $cartId=$this->get_cart_id();
        $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));
        return view('explore-topics',$data);
    }


    public function loadData()
    {

        $detect = new Mobile_Detect();

        if ( $detect->isMobile() || $detect->isTablet()) {
            echo "a";
        }else{
           echo "e";
        }

        $cartId=$this->get_cart_id();
        $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));
        $data['newest'] = DB::select("SELECT * FROM `product` ORDER BY `productOn` ASC LIMIT 4");
        $data['favorites'] = DB::select("SELECT * FROM `product` LIMIT 8");
        $data['frees'] = DB::select("SELECT * FROM `product` WHERE `price` = 0 LIMIT 4");
        $data['types']=DB::select("SELECT * FROM `type`");

        return view('mainpage', $data);

    }

    public function course($cousre_href)
    {
        $cartId=$this->get_cart_id();
        $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));
        $data['result']=DB::select("SELECT * FROM `product` LEFT OUTER JOIN teacher ON teacher.teacher_id=product.teacher_id WHERE `href`=?",array($cousre_href));
        $data['videos']=DB::select("SELECT * FROM `video` LEFT OUTER JOIN product ON video.product_id=product.product_id WHERE product.href=?  ORDER BY `videoNumber` ASC",array($cousre_href));
        $data['elses']=DB::select("SELECT * FROM `product` WHERE `teacher_id`=?",array($data['result'][0]->teacher_id));
        return view('course-intervew',$data);
    }

    public function search_gcse(){
        $cartId=$this->get_cart_id();
        $data['productCount']=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));
        $se=$_GET['q'];
        $se = '%'.$se.'%';
        //////////////////////////////////////////pagination
        $startIndex= 1;
        $count=5;
        $pageIndex=($startIndex-1)*$count;
        $data['pageIndex']=$startIndex;
        $result=DB::select("SELECT COUNT(*) AS total FROM `product` WHERE `title` LIKE ? OR `description` LIKE ? or href LIKE ?",array($se,$se,$se));
        $data['counts']=ceil($result[0]->total / 5);
        /////////////////////////////////////////////////////////////////////

        $data['searchs']=DB::select(
            "SELECT * FROM `product` left outer join `teacher` on product.teacher_id=teacher.teacher_id  WHERE `title` LIKE ? OR `description` LIKE ? or href LIKE ? LIMIT ?,?"
            ,array($se,$se,$se,$pageIndex,$count));
        $data['searchbox']=$_GET['q'];

        return view('search',$data);


    }

    public function pagination_search(){
        $page=$_POST['pageination'];
        $se=$_POST['searchboxx'];

        $se = '%'.$se.'%';

        $count=5;
        $pageIndex=($page-1)*$count;

        $result=DB::select("SELECT COUNT(*) AS total FROM `product` WHERE `title` LIKE ? OR `description` LIKE ? or href LIKE ?",array($se,$se,$se));

        $data['counts']=ceil($result[0]->total / 5);

        $data['searchs']=DB::select(
            "SELECT * FROM `product` left outer join `teacher` on product.teacher_id=teacher.teacher_id  WHERE `title` LIKE ? OR `description` LIKE ? or href LIKE ? LIMIT ?,?"
            ,array($se,$se,$se,$pageIndex,$count));

        $data['pageIndex']=$page;

        return view('ajax-pagination-search',$data);

    }

    public function add_product(){
        return view('add-product');
    }

    public function add_product_db(){
        $product_name = $_POST['product_name'];
        $type = $_POST['selector'];
        $product_brief = $_POST['product_brief'];
        $product_description = $_POST['product_description'];
        $product_href = $_POST['product_href'];
        $product_time = $_POST['product_time'];
        $product_price = $_POST['product_price'];
        $product_teacher = $_POST['product_teacher'];
        $product_image = $_FILES['product_image'];
        echo $product_image['name'];
        $result=DB::select('SELECT `teacher_id` FROM `teacher` WHERE `teacherName`=?',array($product_teacher));

        DB::insert("INSERT INTO `product`(`title`, `type`, `imageUrl`, `price`, `time`, `brief`, `description`, `href`, `teacher_id`) VALUES (?,?,?,?,?,?,?,?,?)",
            array($product_name,$type,'/image/'.$product_image['name'],$product_price,$product_time,$product_brief,$product_description,$product_href,$result[0]->teacher_id));

        return redirect('/');

    }

    public function add_to_cart(){

        $productId=$_POST['productId'];
        $cartId=$this->get_cart_id();

        $order_result=DB::select("SELECT * FROM `t_order` WHERE `product_id`=? AND `cart_id`=?",array($productId,$cartId));

       if ($order_result == null){
            DB::insert("INSERT INTO `t_order`(`cart_id`, `product_id`, `quantity`) VALUES (?,?,?)",array($cartId,$productId,1));
       }else{
            DB::update("UPDATE `t_order` SET `quantity`=`quantity`+1 WHERE `product_id`=? AND `cart_id`=?",array($productId,$cartId));
       }

       $product_count=DB::select("SELECT COUNT(`cart_id`) AS t FROM `t_order` WHERE `cart_id`=?",array($cartId));

       echo $product_count[0]->t;
    }

     function get_cart_id(){
        if (isset($_SESSION['user_id'])){

            $cart=DB::select("SELECT * FROM `cart` WHERE `user_id`=? AND `payed`=0",array($_SESSION['user_id']));


            if ($cart==null){//momkene ba session vared shode bashe

                $cart=DB::select(" SELECT * FROM `cart` WHERE `session_id`=? AND `payed`=0",array(session_id()));

                if ($cart == null){//cart nadarim va bayad besazim
                    DB::insert("INSERT INTO `cart`(`user_id`, `session_id`, `payed`) VALUES (?,?,0)",array($_SESSION['user_id'],session_id()));

                    $cart=DB::select("SELECT cart_id FROM `cart` WHERE `user_id`=? AND `payed`=0 limit 1",array($_SESSION['user_id']));
                    $cart_id=$cart[0]->cart_id;
                    return $cart_id;

                }else{//yani gablan ba seesion vared shode
                    DB::update("UPDATE `cart` SET `user_id`=? WHERE `session_id`=? AND `payed`=0 ",array($_SESSION['user_id'],session_id()));
                    $cart_id=$cart[0]->cart_id;
                    return $cart_id;
                }


            }else{
                $cart=DB::select("SELECT cart_id FROM `cart` WHERE `user_id`=? AND `payed`=0 limit 1",array($_SESSION['user_id']));
                $cart_id=$cart[0]->cart_id;

                return $cart_id;

            }


        }else{
            $cart=DB::select(" SELECT * FROM `cart` WHERE `session_id`=? AND `payed`=0",array(session_id()));

            if ($cart==null){//cart nadarim va bayad besazim
                DB::insert("INSERT INTO `cart`(`session_id`, `payed`) VALUES (?,0)",array(session_id()));

                $cart=DB::select("SELECT cart_id FROM `cart` WHERE `session_id`=? AND `payed`=0 limit 1",array(session_id()));
                $cart_id=$cart[0]->cart_id;

                return $cart_id;

            }else{
                $cart=DB::select("SELECT cart_id FROM `cart` WHERE `session_id`=? AND `payed`=0 limit 1",array(session_id()));
                $cart_id=$cart[0]->cart_id;

                return $cart_id;

            }


        }
    }

    public function show_cart(){
        $cartId=$this->get_cart_id();
        $data['results']=DB::select("SELECT * FROM `t_order` LEFT OUTER JOIN product on t_order.product_id=product.product_id WHERE t_order.cart_id=?",[$cartId]);
        return view('product-cart',$data);
    }


    public function t()
    {

//        $re=DB::table('product')->where("price",'>','1000')->select('title')->get();
//        foreach ($re as $r){
//            echo '<div style="direction:rtl">'.$r->title.'</div>';
//        }
        //return $re;



//        $reeee=DB::table('product')
//            ->leftJoin('teacher','product.teacher_id','=','teacher.teacher_id')
//            ->leftJoin('type','product.type','=','type.ttype')->get();

      // print_r($reeee);
    }

    public function taha()
    {

        return view('taha');

    }

}
