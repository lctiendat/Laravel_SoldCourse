<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="row">
                    <h1>{{ $details['title'] }}</h1>
                </div>
                <div class="row">
                    <p>Chào mừng quý khách hàng {{ $details['nameGuest'] }} đến với website của chúng tôi,</p>
                    <p>Thông tin các kênh hỗ trợ vui lòng tham khảo tại <a href="">đây</a></p>
                    <p>Chân thành cảm ơn và kính chào.
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
