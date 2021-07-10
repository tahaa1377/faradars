@extends('them')

@section('section')

    <form style="border: 1px solid #eaeaea;padding: 20px 20px;background-color: #f7f7f7" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >نام محصول</span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="product_name" >
                </div>
            </div>

        </div>


        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >نوع</span>
                </div>
                <div class="col-md-9">
                    <select name="selector" style="width: 100%">
                        <option value=""></option>
                        <option value="programming">programming</option>
                        <option value="ai">ai</option>
                        <option value="computer science">computer science</option>
                        <option value="robotic">robotic</option>
                        <option value="data minig">data minig</option>
                        <option value="electrical engineer">electrical engineer</option>
                        <option value="software engineer">software engineer</option>
                        <option value="wordpress">wordpress</option>
                        <option value="webmastering">webmastering</option>
                        <option value="control engineering">control engineering</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >اطلاعات کوتاه</span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="product_brief">
                </div>
            </div>
        </div>


        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >اطلاعات بلند</span>
                </div>
                <div class="col-md-9">
                    <textarea  class="form-control" name="product_description"></textarea>
                </div>
            </div>
        </div>


        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >توضیحات انگلیسی</span>
                </div>
                <div class="col-md-9">
                    <input type="text"  class="form-control" name="product_href">
                </div>
            </div>
        </div>


        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >مدت زمان آموزش</span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="product_time" >
                </div>
            </div>

        </div>

        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >قیمت آموزش</span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="product_price" >
                </div>
            </div>

        </div>

        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >مدرس</span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="product_teacher" >
                </div>
            </div>

        </div>

        <div class="form-group">

            <div class="row dirtl">
                <div class="col-md-3">
                    <span >عکس</span>
                </div>
                <div class="col-md-9">
                    <input type="file" class="form-control" name="product_image" >
                </div>
            </div>

        </div>

        <br>
        <button style="float: contour" name="sign" type="submit" class="btn btn-primary btn-lg">تایید</button>
        <br>
    </form>

@endsection