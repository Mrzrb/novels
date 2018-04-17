<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>怪医圣手</title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <style>
    div{
      font-size: 36px;
    }
    .btn{
      font-size: 38px;
    }
    .btmn{
      margin-top: 120px;
    }
  </style>
</head>
<body>
  <h1>{{$chapter['title']}}</h1>
  @php
  $strArr = [
    '过来，给老子亲一下',
    '要抱抱啊',
    '起来吃串串了'
  ];
  @endphp
  <hr>
  <br>

  <div class="col-xs-12">
    <p>
      {!! $chapter['content'] !!}
      <!-- {{$strArr[rand(0,2)]}} -->
    </p>
  </div>
  <div class="col-xs-12 btmn"></div>
  <div class="col-xs-12">
    <a href="{{'/detail/'.$pre}}"><span class="btn btn-primary">上一章</span></a>
    <a href="/"><span class="btn btn-primary">目录</span></a>
    <a href="{{'/detail/'.$next}}"><span class="btn btn-primary">下一章</span></a>
  </div>

  <div class="col-xs-12 btmn"></div>
</body>
</html>