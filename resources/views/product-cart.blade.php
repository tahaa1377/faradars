
<meta charset="UTF-8">
<?

function c11onvert($text){
    if (strlen($text) > 18){
        $text=substr($text,0,28);
         return $text.="...";
    }
    return $text;
}

?>
<div style="padding: 20px 0;background-color: rgba(255,255,255,0.4);width: 80%;height: 64px;position: relative;margin: auto auto">


    <div class="row">
        <?$sum=0?>
        <?foreach ($results as $result){ ?>
        <br>
        <div class="col-8" style="height: 10px;font-size: 90%;">
       <a href="/courses/<?=$result->href?>"><?=c11onvert($result->title)?></a>
        </div>
        <div class="col-4" style="font-size: 80%">
            <?=$result->price?>
            <?$sum+=$result->price?>
        </div>
        <br>
        <br>

        <div style="width: 100%;background-color: darkgrey;height: 1px">

        </div>
        <?}?>
    </div>

    <div class="row">
        <div class="col-6">
            جمع :
        </div>
        <div class="col-6">
            <?=$sum?>
        </div>
    </div>
<br>
<br>

    <div class="row">
        <div class="col-6">
            <button type="button" class="btn btn-primary btn-sm">پرداخت</button>

        </div>
        <div class="col-6">

        </div>
    </div>
<br>

</div>