<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-container input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-container button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .login-container button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="login-container">
        <h3>LOGIN</h3>

        <?php if (session()->getFlashdata('msg')) : ?>
            <div style="color:red;"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>

        <?php if (isset($validation)) : ?>
            <div style="color:red;">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>
        <div class="con">
            <form action="/auth/login" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
</body>

</html>