<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>怪医圣手</title>
  <link href="https://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <style>
    td{
      font-size: 34px;
    }
  </style>
</head>
<body>
  <h1>怪医圣手</h1>
  <table class="table table-striped">
    <thead>
      <tr><h2>章节</h2></tr>
    </thead>

    <tbody>
      @foreach($chapters as $chapter)
      <tr>
        <td><a href="/detail/{{$chapter['id']}}">{{$chapter['title']}}</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>