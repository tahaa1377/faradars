
@section('js')
    <script src="/js/buy.min.js"></script>
@endsection
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
        <button type="button" class="btn btn-primary btn_basket"><span id="productCount"><?=$productCount[0]->t?></span>&nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i></button><br>
        <div id="park">
        </div>
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
        <div class="row">

        <ul style="width: 100%">

               <li style="padding: 20px 0"><a href="#">تماس با ما</a></li>

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

    <div style="width: 100%;background-color: #f8f9fa">


    <div class="container" >

<div style="font-size: 116%;direction: rtl">
    در میان بیش از ده هزار ساعت آموزش منتشر شده در بزرگ‌ترین مرجع دروس ویدئویی کشور، جستجو کنید ...
</div>
        <br>

        <form method="get" action="/search_gcse">
            <button type="submit" class="btn btn-primary">جستجو</button>
            <input name="q" style="width: 40%;direction: rtl;display: inline-block;vertical-align: middle" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="عنوان آموزش مورد نظر خود را وارد نمایید.">
        </form>

    </div>
        <br>

        <div class="container dirtl" >

            <div class="row w25">


               <div  style="font-weight: bold;font-size: 130%;"> به آسانی یاد بگیرید.</div>


                <div class="dirtl" style="margin-top:70px;margin-bottom: 20px;">
                به خانواده ۴۰۰ هزار نفری فرادرس ملحق شوید، و از هزاران ساعت آموزش تخصصی استفاده کنید.

                </div>
                <br>
                <div style="margin-bottom: 20px">
                <button type="button" class="btn btn-success ">ثبت نام</button>&nbsp;
                <button type="button" class="btn btn-primary ">همه فرادرس‌ها</button>
                </div>
                <br>
            </div>



        <div class="row w75">
            <?foreach ($types as $type){ ?>
            <div class="col-md-3 col-4">
                    <div class="productType">
                        <div>
                          <a href="<?=$type->hreff?>"><img style="width: 100px;height: 100px;margin-top: 5px;background-color: darkgrey" src="<?=$type->hrefImage?>"></a>
                        </div>

                    </div>
            </div>
            <?}?>
        </div>
        </div>
        <br>
        <br>
    </div>

    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">


    </div>
    </div>

    <div class="container">
    <div style="text-align: right">
    <span style="font-size: 130%;color: darkblue">جدیدترین آموزش‌ها</span>
    <img src="/image/new-cours.svg">

    </div>
        <br>
        <div style="width: 100%;height: 3px;background-color: cornflowerblue"></div>
<br>
        <div class="row ">

                <?foreach ($newest as $new){ ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12" >
                <div class="productpanel" >
                    <a href="/courses/<?=$new->href?>">
                      <img src="<?=$new->imageUrl?>" style="width: 100%;height: 52%">

                    <h3 style="margin-top: 7px;font-size: 90%;color: darkblue;direction: rtl;">
                        <?=$new->title?>
                    </h3>

                        <br>
                    </a>
                    <div data-id="<?=$new->product_id?>" class="addTobtn">افزودن به سبد</div>

                    <?if($new->price != 0){?>
                    <div class="addTobtnprice"><?=$new->price?>&nbsp;تومان</div>
                    <?}else{?>
                    <div class="addTobtnprice" style="color: green;font-weight: bold">رایگان!</div>
                    <?}?>
                </div>
                    </div>

                    <?}?>
        </div>
        <div>
            <button style="float: left;" type="button" class="btn btn-secondary ">فهرست کامل جدیدترین آموزش‌ها</button>
        </div>
    </div>

<br>
<br>


    <div class="container">
        <div style="text-align: right">
            <span style="font-size: 130%;color: darkblue">فرادرس‌های پرمخاطب (یک ماه اخیر)</span>
            <img src="/image/star.svg">

        </div>
        <br>
        <div style="width: 100%;height: 3px;background-color: cornflowerblue"></div>
        <br>

        <div class="row">

            <?foreach ($favorites as $favorite){ ?>
            <div class="col-md-3 col-sm-6" >
                <div class="productpanel">
                    <a href="/courses/<?=$favorite->href?>">
                    <img src="<?=$favorite->imageUrl?>" style="width: 100%;height: 52%">

                    <h3 style="margin-top: 7px;font-size: 90%;color: darkblue;direction: rtl">
                        <?=$favorite->title?>
                    </h3>

                    <br>
                    </a>
                    <div data-id="<?=$favorite->product_id?>" class="addTobtn">افزودن به سبد</div>
                    <?if($favorite->price != 0){?>
                    <div class="addTobtnprice"><?=$favorite->price?>&nbsp;تومان</div>
                    <?}else{?>
                    <div class="addTobtnprice" style="color: green;font-weight: bold">رایگان!</div>
                <?}?>

                </div>
            </div>

            <?}?>
        </div>

        <div>
            <button style="float: left;" type="button" class="btn btn-secondary ">فهرست کامل جدیدترین آموزش‌ها</button>
        </div>

    </div>


    <br>
    <br>


    <div class="container">
        <div style="text-align: right">
            <span style="font-size: 130%;color: darkblue">جدیدترین آموزش‌های رایگان</span>
            <img src="/image/free.svg">

        </div>
        <br>
        <div style="width: 100%;height: 3px;background-color: cornflowerblue"></div>
        <br>

        <div class="row">

            <?foreach ($frees as $free){ ?>
            <div class="col-md-3 col-sm-6" >
                <div class="productpanel">
                    <a href="/courses/<?=$free->href?>">
                    <img src="<?=$free->imageUrl?>" style="width: 100%;height: 52%">

                    <h3 style="margin-top: 13px;font-size: 90%;color: darkblue;direction: rtl">
                        <?=$free->title?>
                    </h3>

                    <br>
                    </a>
                    <div data-id="<?=$free->product_id?>" class="addTobtn">افزودن به سبد</div>

                    <div class="addTobtnprice" style="color: green;font-weight: bold">رایگان!</div>

                </div>
            </div>

            <?}?>
        </div>
        <div>
            <button style="float: left;" type="button" class="btn btn-secondary ">فهرست کامل جدیدترین آموزش‌ها</button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div style="width: 100%; height: 50px; background-color: darkgray">
        تمامی حقوق مادی و معنوی این سایت متعلق به فلان شرکت است
    </div>
@endsection
