<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Show the image on page load using jQuery</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type='text/javascript'>
        $(function () {
            var overlay = $('<div id="overlay"></div>');
            overlay.show();
            overlay.appendTo(document.body);
            $('.popup').show();
            $('.close').click(function () {
                $('.popup').hide();
                overlay.appendTo(document.body).remove();
                return false;
            });

            $('.x').click(function () {
                $('.popup').hide();
                overlay.appendTo(document.body).remove();
                return false;
            });
        });
    </script>
    <style type="text/css">
        #overlay
        {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            filter: alpha(opacity=70);
            -moz-opacity: 0.7;
            -khtml-opacity: 0.7;
            opacity: 0.7;
            z-index: 100;
            display: none;
        }
        .img a
        {
            text-decoration: none;
        }
        .popup
        {
            width: 100%;
            margin: 0 auto;
            display: none;
            position: fixed;
            z-index: 101;
        }
        .img
        {
            min-width: 564px;
            width: 564px;
            min-height: 150px;
            height:auto;
            margin: 80px auto;
            background: #f3f3f3;
            position: relative;
            z-index: 103;
            padding: 1px;
            border-radius: 5px;
            box-shadow: 0 2px 5px #000;
           
        }
        .img p
        {
            clear: both;
            color: #555555;
            text-align: justify;
        }
        .img p a
        {
            color: #d91900;
            font-weight: bold;
        }
        .img .x
        {
            float: right;
            height: 35px;
            left: 22px;
            position: relative;
            top: -25px;
            width: 34px;
        }
        .img .x:hover
        {
            cursor: pointer;
        }
    </style>
   
</head>
<body>
    <div class='popup'>
        <div class="img">
            <img src="images/quit.png" alt='quit' class='x'
                id='x' />   
            <img src="uploads/1558362229.jpg" />
          
        </div>
    </div>
</body>
</html>