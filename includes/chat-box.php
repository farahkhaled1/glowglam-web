<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBox</title>
</head>
<style>
    .live-chat {
        background-color: #f08db1;
        border-radius: 50% !important;
        width: 73px;
        color: white;
        height: 67px;


        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 999999;

        margin-right: 20px;
    }

    .fa-comment {
        color: white;
        font-size: 30px;
    }

    button:hover {
        color: white !important;
        transform: scale(1.1);
    }
</style>

<body>
    <button class="btn live-chat"><a href="http://localhost/glowglam/live-chat/index.php"><i class="fa fa-fw fa-comment"></i></a></button>
</body>

</html>