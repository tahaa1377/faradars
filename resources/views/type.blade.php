@extends('them')

@section('section')

<br>


    <div id="navt">
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

    <div style="width: 100%;height: 70px;background: #005691;">
        <h1 style="font-size: 25px;color: #fff;text-align: right;margin-right: 5%;padding: 15px 0">
            مجموعه آموزش‌‌های
        </h1>
    </div>

    <img src="<?=$how_to_learn[0]->typeImage?>">


    <br>
    <br>
@endsection
