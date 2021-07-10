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
                <button type="button" class="btn btn-primary"><span id="productCount"><?if(empty($productCount[0]->t)){?><?=0;}?></span>&nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </button>
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

    <form method="get" action="/search_gcse">

        <button type="submit" class="btn btn-primary">جستجو</button>

        <input name="q" style="width: 40%;direction: rtl;display: inline-block;vertical-align: middle" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="عنوان آموزش مورد نظر خود را وارد نمایید.">
        <span style="direction: rtl;">جستجو کنید</span>


    </form>
    <br>
    <br>
    <br>
    <div style="width: 100%;height: 70px;background: #005691;">
        <h1 style="font-size: 25px;color: #fff;text-align: right;margin-right: 5%;padding: 15px 0">
            حساب کاربری من
        </h1>
    </div>
    <br>
    <br>


    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <h4 style="color: #084D83;text-align: right">ثبت نام</h4>
                <form style="border: 1px solid #eaeaea;padding: 50px 20px;background-color: #f7f7f7" method="post">

                    @csrf
                    <div class="form-group">

                        <div class="row dirtl">
                            <div class="col-md-5">
                                <span >ای-میل *</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="sign_email" >
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="row dirtl">
                            <div class="col-md-5">
                                <span >رمز عبور *</span>
                            </div>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="sign_password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="row dirtl">
                            <div class="col-md-5">
                                <span >ورود مجدد رمز عبور *</span>
                            </div>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="sign_password_again" >
                            </div>
                        </div>

                    </div>
                    <br>
                    <button style="float: left" name="sign" type="submit" class="btn btn-primary btn-lg">ثبت نام</button>
                    <br>
                </form>
                <span class="dirtl" style="float: right;font-size: 90%">
                لطفا ایمیل خود را با دقت وارد نمایید، زیرا ایمیل شما همان نام کاربری‌تان می باشد و همچنین تمامی اطلاعات سفارش به ایمیل شما ارسال خواهد شد.
                </span>
            </div>
            <div class="col-md-6">
                <h4 style="color: #084D83;text-align: right">ورود</h4>


                <form style="border: 1px solid #eaeaea;padding: 77px 20px;background-color: #f7f7f7" method="post" >
                    @csrf
                    <div class="form-group">
                        <div class="row dirtl">
                            <div class="col-md-5">
                                <span > نام کاربری (ای-میل) *</span>
                            </div>
                            <div class="col-md-7">
                                <input  type="text" class="form-control" name="login_email" >

                            </div>
                        </div>


                    </div>

                    <div class="form-group">

                        <div class="row dirtl">
                            <div class="col-md-5">
                                <span >رمز عبور *</span>
                            </div>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="login_password" >

                            </div>

                        </div>

                    </div>
                    <br>
                    <button style="float: left" name="login" type="submit" class="btn btn-primary btn-lg">ورود</button>
                    <br>
                </form>
                <span class="dirtl" style="float: right;font-size: 90%">
                    مخاطب گرامی، اگر قبلا در سایت فرادرس ثبت نام کرده اید، از طریق فرم بالا جهت ورود به حساب کاربری استفاده کنید.
                </span>
            </div>

        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

@endsection