<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @include("/frontend/scripts/main")
    <h1>Home Blade</h1>

    <!-- == <= htmlspecialchars($1?:'rỗng); ?> chuyển về thực thể tránh lỗi xss bảo mật -->
    <h2>{{$t1 ?: 'rỗng'}}</h2>
    <!-- == <= ($htmlContent); ?> lấy nguyên kí tự code biên dịch mã dùng để render code html hoặc script -->
    <h2>{!!$htmlContent !!}</h2>
    <!--  lấy slug url < ?> -->
    <h2><?= request()->key ?: "Rỗng" ?></h2>
    <!-- vòng for -->
    @for($i = 0; $i < 3; $i++)
     <h1>{{$i}}</h1> 
    @endfor
    <!-- các cú pháp đưa trong @ với @php==<php> -->
    {{-- comment --}}
    @foreach($arr as $key=>$val)
    <h1>{{$key}}-{{$val}}</h1>
    <h2>Phan tu <?= $val ?></h2>
    @endforeach
    
    @foreach($arr as $key => $val)
    @endforeach

    // tránh xung đột biên dich {{$val}} hoặc thêm @{{$val}}
    @verbatim
    @endverbatim

    // import view path 
    @include("frontend/homeblade/add");
</body>

</html>