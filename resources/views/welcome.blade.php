<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to GlobaLink</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }
        .cta-btns {
            margin-top: 20px;
        }
        .cta-btn {
            background-color: #3498db;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s;
            margin-right: 15px;
        }
        .cta-btn:hover {
            background-color: #2e86c1;
        }
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
            padding: 0 20px;
        }
        .feature {
            text-align: center;
            width: 30%;
        }
        .feature i {
            font-size: 50px;
            color: #ff2d20;
            margin-bottom: 15px;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to GlobaLink!</h1>
        <p>Connect, share, and engage with your friends and the world.</p>
        <div class="cta-btns">
            @guest
                <a href="{{ route('login') }}" class="cta-btn">Log In</a>
                <a href="{{ route('register') }}" class="cta-btn">Register</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="cta-btn">Dashboard</a>
            @endauth
        </div>
    </header>

    <section class="features">
        <div class="feature">
            <i class="fa fa-users"></i>
            <h3>Connect with Friends</h3>
            <p>Follow others and keep up with their latest posts.</p>
        </div>
        <div class="feature">
            <i class="fa fa-share-alt"></i>
            <h3>Share Your Moments</h3>
            <p>Share your photos, videos, and thoughts with the community.</p>
        </div>
        <div class="feature">
            <i class="fa fa-comment"></i>
            <h3>Engage and Chat</h3>
            <p>Like, comment, and message your friends and followers.</p>
        </div>
    </section>

    <footer>
        <p>Powered by GlobaLink - Connect with the world!</p>
        <p>&copy; 2024 GlobaLink| All rights reserved.</p>
    </footer>

</body>
</html>
