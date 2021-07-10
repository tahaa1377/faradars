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

    <form method="get" action="/search_gcse">
        <button type="submit" class="btn btn-primary">جستجو</button>
        <input id="searchbox" name="q"  style="width: 40%;direction: rtl;display: inline-block;vertical-align: middle" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="عنوان آموزش مورد نظر خود را وارد نمایید.">
        <span style="direction: rtl;">جستجو کنید</span>

    </form>
    <br>
    <br>
    <br>

    <div style="width: 100%;height: 70px;background: #005691;">
        <h1 style="font-size: 25px;color: #fff;text-align: right;margin-right: 10%;padding: 15px 0">
            <?=$result[0]->title?>
        </h1>
    </div>
    <br>
    <div class="dirtl">
        <ul style="list-style: none;display: inline-flex;width: 100% ">
            <li style="width: 20%">        دسترسی به اطلاعات این آموزش:</li>

            <li   style="width: 15%;cursor: pointer;">
                <a  class="btnamaozesh" href="#section1">اطلاعات کلی</a>
            </li>

            <li  style="width: 15%;cursor: pointer;">
                <a class="btnamaozesh" href="#section2">محتوا و سرفصل ها</a>
            </li>

            <li  style="width: 15%;cursor: pointer;">
                <a class="btnamaozesh" href="#section3">پیش نمایش و دانلود</a>
            </li>


            <li  style="width: 15%;cursor: pointer;">
                <a class="btnamaozesh" href="#section4">اطلاعات تکمیلی</a>
            </li>

            <li  style="width: 10%;cursor: pointer;">
                <a class="btnamaozesh" href="#section5">دیدگاه ها</a>
            </li>

        </ul>
    </div>

<br>

    <div id="section1">

            <div class="row offset-1">

                <div class="col-md-5 dirtl " style="text-align: right" >

                        <span >
<?=$result[0]->brief?>
                         </span>
    <br>
<br>
                    <span style="font-weight: bold">  👤 مدرس:</span><?=$result[0]->teacherName?>
                    <br>
                    <br>
                    <?
                    $time=$result[0]->time;
                    $hour=floor($time/60);
                    $min=$time%60;

                    ?>
                      <span style="font-weight: bold"> 🕓 مدت زمان:</span> <?=$hour?> ساعت و <?=$min?> دقیقه


                    <br>
                    <br>
                    <br>
                    <span style="color: darkblue;direction: rtl">
                                            <?if($result[0]->price != 0){?>
                                            هزینه آموزش:   <span style="font-weight: bold">    <?=$result[0]->price?> تومان </span>
                                                <?}else{?>
                                                هزینه آموزش:<span style="font-weight: bold">    رایگان</span>
                                                <?}?>
                    </span>


<span style="float: left;vertical-align: middle">
            <button type="button" class="btn btn-primary btn-lg">افزودن به سبد</button>



</span>
                </div>

                <div style="text-align: right;" class="col-md-6">
                    <img src="<?=$result[0]->imageUrl?>">
                    <br>
                    <br>
                    <br>
                    <div>
                        <h2 style="color: darkblue;">
                                                    درباره مدرس
                        </h2>
                        <br>
                        <br>
                        <div class="box_teacher">

                            <div style="display: inline-flex">
                            <div style="display: inline;margin-top: 10px">

                                <span style="color: darkblue;font-size: 110%;font-weight: bold">
                                <?=$result[0]->teacherName?><br>
                                    </span>
                                <span style="color: black;font-size: 110%;font-weight: bold">
                                  مدرس فرادرس<br>
                                </span >
                                <span style="color: red;font-size: 105%;">
                                  <?=$result[0]->tahsilat?><br>
                                </span>
                            </div>
                            <div style="display: inline" class="image_teacher">
                                        <img style="display: inline-block;margin: 2px 2px 2px 15px" src="<?=$result[0]->teacherImageUrl?>">
                                    </div>

                            </div>
                            <hr style="background-color: #000;">
                                <div class="dirtl" style="margin-right: 10px">
                                    <?=$result[0]->teacherDescription?>
                             </div>
                            <br>
                        </div>

                    </div>
                </div>


            </div>
    </div>
    <br>
    <br>
    <br>

    <div id="section2">
        <div class="container">

        <h2 style="color: darkblue;float: right;">
    توضیحات
</h2>
        <br>
        <br>

        <div style="text-align: right;direction: rtl">
            <?=$result[0]->description?>
        </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="section3">
        <div class="container">

            <div style="width: 100%;height: 80px;background-color: #fae6c1;border: 1px solid #C2BDBD;">
                <h2 style="color: #626161;margin-top: 10px">
                    پیش نمایش

                </h2>
            </div>

            <?

            foreach ($videos as $video){?>

            <div style="border: 1px solid #C2BDBD;">


                <div style="color: darkblue;background-color: #EDFFF6;height: 70px;">
                    <h5>
                        پیش نمایش <?=$video->videoNumber?> : <?=$video->videoName?> - <?=$video->videoTime?> دقیقه
                    </h5>
                </div>


                <div style="margin: 40px 0">
                    <video width="60%" height="309px" controls>

                            <source src="<?=$video->videoUrl?>" type="video/mp4">


                    </video>
                </div>


            </div>


        <?}?>

        </div>


        </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="section4">
        <div class="container">
            <h5 style="float: right;color: darkblue">
                سایر آموزش های <?=$result[0]->teacherName?>
            </h5>
<br>
<br>
            <div style="border: 0.5px solid #C2BDBD;padding: 0 10px;">

                <div class="row">
                    <?foreach ($elses as $new){
                        if ($new->product_id != $result[0]->product_id){?>
                    <div class="col-md-3 col-sm-6" >
                        <div class="productpanel" >
                            <a href="/courses/<?=$new->href?>">
                                <img src="<?=$new->imageUrl?>" style="width: 100%;height: 52%">

                                <h3 style="margin-top: 7px;font-size: 90%;color: darkblue;direction: rtl;">
                                    <?=$new->title?>
                                </h3>

                                <br>
                            </a>
                            <div class="addTobtn">افزودن به سبد</div>

                            <?if($new->price != 0){?>
                            <div class="addTobtnprice"><?=$new->price?>&nbsp;تومان</div>
                            <?}else{?>
                            <div class="addTobtnprice" style="color: green;font-weight: bold">رایگان!</div>
                            <?}?>
                        </div>
                    </div>

                    <?}}?>
                </div>

            </div>

        </div>



    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="section5">
        <div class="container">
            <h5 style="float: right;color: darkblue">
                دیدگاه ها
            </h5>
            <br>
            <br>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


@endsection
@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("a").on('click', function(event) {

                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){

                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>
@endsection