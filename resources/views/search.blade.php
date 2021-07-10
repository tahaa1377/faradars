@extends('them')

@section('section')

    <div class="container">
        <div style="background-color: #edf3ff;display: inline;padding: 5px;float: right;margin: 8px 0px 0px 0;direction: rtl">
            <span><i style="font-size: 140%;color: red" class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
            <span style="font-weight: bold;color: red;">۵۷۹۱۶۰۰۰</span>
            <span> (پیش شماره ۰۲۱) </span>
            <span style="opacity: 0.4">- تمام ساعات اداری</span>

        </div>
        {{--////////////////////////////////////--}}
        <div style="float: left;margin: 0 0 0 15px;position: fixed;z-index: 1000;background-color: white">
            <? if ( empty($_SESSION) or ( !empty($_SESSION)  and $_SESSION['email'] != '1377tahaa@gmail.com')){ ?>
            <div class="btn-group" role="group" aria-label="Basic example" >
                <a><button type="button" class="btn btn-primary">سبد خرید</button></a>
                <button type="button" class="btn btn-primary"><span id="productCount"><?=$productCount[0]->t?></span>&nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i></button>
            </div>
            <?}else{?>
            <div class="btn-group" role="group" aria-label="Basic example" >
                <a href="/add_product"><button type="button" class="btn btn-primary">درج محصول</button></a>
            </div>
            <?}?>
            <? if (!isset($_SESSION['user_id'])){?>
            <a style="font-size: 18px;text-decoration: none" class="login-register right" href="/my-account" >ورود / ثبت نام</a>
            <? }else{ ?>
            &nbsp; <a style="font-size: 18px;text-decoration: none" class="login-register right" href="/my-account" >حساب کاربری</a>&nbsp;/&nbsp;

            <a style="font-size: 18px;text-decoration: none" class="login-register right" href="/logout" >خروج</a>&nbsp;&nbsp;
            <?}?>
        </div>
        {{--///////////////////////////--}}
        <br>
        <br>
        <br>

        <div id="navt" >
            <div class="container">
                <div class="row ">

                    <ul style="width: 100%">
                        <li   style="padding: 20px 0"><a href="#">تماس با ما</a></li>

                        <li style="padding: 20px 0"><a href="#">همکاری با ما</a></li>

                        <li style="padding: 20px 0"><a href="#">سؤالات رایج</a></li>

                        <li style="padding: 20px 0"><a href="#">محیط کاربری</a></li>

                        <li style="padding: 20px 0"><a href="/">خانه</a></li>

                        <li ><a href="#"><img src="/image/FaraDars-Header-A.png" alt=""></a></li>

                    </ul>



                </div>
            </div>
        </div>


    </div>

    <div style="direction: rtl">
        <button type="button" class="btn btn-success btn-lg">آموزش‌های پیشنهادی</button>

        <a href="/explore-topics" target="_blank"><button type="button" class="btn btn-primary btn-lg">دسته‌بندی موضوعی</button></a>
        <button type="button" class="btn btn-primary btn-lg">جدیدترین فرادرس‌ها</button>
        <button type="button" class="btn btn-primary btn-lg">فرادرس‌های رایگان</button>
        <button type="button" class="btn btn-danger btn-lg">⭐️پیشنهادهای ویژه</button>

    </div>
    <br>
    <br>

    <div style="width: 100%;height: 70px;background: #005691;">
        <h1 style="font-size: 25px;color: #fff;text-align: right;margin-right: 5%;padding: 15px 0">
            نتایج جستجو
        </h1>
    </div>
    <br>
    <br>

    <form method="get" action="/search_gcse">
        <button type="submit" class="btn btn-primary">جستجو</button>
        <input id="searchbox" name="q" value="<?=$searchbox?>" style="width: 40%;direction: rtl;display: inline-block;vertical-align: middle" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="عنوان آموزش مورد نظر خود را وارد نمایید.">
    </form>
    <br>
<section id="ajax_search">


    <div class="container">
        <div class="row">
        <? foreach ($searchs as $search){ ?>
            <div class="col-md-12">

                <div class="searchresult dirtl">

                <img style="width: 114px; height: 68px;float: right;margin: 20px 0 20px 5px" src="<?=$search->imageUrl?>">

                    <a href="/courses/<?=$search->href?>">
                    <div style="display: block;color: blue;font-size: 105%;float: right;margin-top: 15px;">
                        <?=$search->title?><?if($search->price == 0){?> - رایگان <?}?>
                    </div>
                    </a>
                    <br>
                    <br>
                    <div style="color: green;float: right;text-align: right;display: block">
                        https://faradars.org/courses/<?=$search->href?>
                    </div>

                    <br>
                    <div style="float: right;font-size: 80%;">
                        <?=$search->title?>، با تدریس <?=$search->teacherName?>
                    </div>
                    <br>
                    <hr>
                </div>

            </div>
            <?}?>
        </div>
    </div>

    <br>
    <br>

    {{--////////////////////////--}}
    {{--<button data-pageination="1" type="button" class="btn btn-secondary pageination">1</button>--}}
    &nbsp;
    <div class="btn-group mr-2" role="group" aria-label="First group">

        <?for ($i=1;$i<=$counts;$i++){?>

        <? if ($i < 1)  { continue;}?>
        <?  if ($i > $counts){ continue;}?>

        <? if ($pageIndex == $i){ ?>
        <button  type="button" class="btn btn-light"><?=$i?></button>

        <?}else{?>

        <button data-pageination="<?=$i?>" type="button" class="btn btn-secondary pageination"><?=$i?></button>
        <?}

        }?>

    </div>


</section>
    {{--//////////////////////--}}
<br>
<br>
<br>
<br>
@endsection

@section('js')
<script src="/js/search.min.js"></script>
@endsection