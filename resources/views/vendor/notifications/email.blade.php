<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #125688;
        }

        p {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #125688;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0d436b;
        }

        .subcopy {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }

        .break-all {
            word-break: break-all;
        }

        .signature {
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hello!</h1>
        <p>Thank you for using our service.</p>
        <p>Please click the button below to continue:</p>
        <a href="{{ $actionUrl }}" class="btn">{{ $actionText }}</a>
        <div class="subcopy">
            If you're having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below into your
            web browser:
            <br>
            <span class="break-all">{{ $displayableActionUrl }}</span>
        </div>
        <div class="signature">
            Regards,<br>
            {{ config('app.name') }}
        </div>
    </div>
</body>

</html>
