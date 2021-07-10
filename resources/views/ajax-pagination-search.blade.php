
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

