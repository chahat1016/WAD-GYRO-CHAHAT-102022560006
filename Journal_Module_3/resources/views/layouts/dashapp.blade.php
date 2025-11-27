<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top left, #667eea 0%, #764ba2 40%, #f093fb 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            color: #1a1a2e;
        }

        .dashboard-container {
            position: relative;
            z-index: 2;
            width: 90%;
            max-width: 1100px;
            animation: fadeUp 1s ease forwards;
        }

        .dashboard-card {
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            overflow: hidden;
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-profile-top {
            position: absolute;
            top: 1.2rem;
            right: 1.5rem;
            padding: 0.4rem 0.9rem;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(135deg, #764ba2, #667eea);
            box-shadow: 0 3px 10px rgba(118, 75, 162, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
            z-index: 3;
        }

        .btn-profile-top:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #667eea, #764ba2);
            box-shadow: 0 5px 16px rgba(102, 126, 234, 0.4);
        }

        .animated-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(130deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15), rgba(240, 147, 251, 0.15));
            animation: gradientShift 12s infinite alternate;
            z-index: 0;
        }

        .dashboard-body {
            display: flex;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
            padding: 3rem 4rem;
            align-items: center;
        }

        .dashboard-left {
            flex: 1;
            text-align: center;
            position: relative;
            min-width: 280px;
            margin-bottom: 2rem;
        }

        .logo-wrapper {
            position: relative;
            width: 200px;
            height: 200px;
            margin: auto;
        }

        .logo-center {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 150px;
            height: 150px;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            animation: float 3.5s ease-in-out infinite;
        }

        .logo-center img {
            width: 70%;
        }

        .logo-ring {
            position: absolute;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: pulse 4s infinite ease-in-out;
        }

        .ring-1 {
            width: 200px;
            height: 200px;
            border: 3px solid #667eea;
            opacity: 0.2;
        }

        .ring-2 {
            width: 230px;
            height: 230px;
            border: 2px solid #f093fb;
            opacity: 0.1;
            animation-delay: 1s;
        }

        .dashboard-right {
            flex: 2;
            padding: 1rem 2rem;
        }

        .greeting-box {
            margin-bottom: 2rem;
        }

        .greeting-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 700;
            line-height: 1.2;
        }

        .highlight-name {
            color: #4c51bf;
            position: relative;
        }

        .highlight-name::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            border-radius: 2px;
            animation: shimmer 3s infinite linear;
        }

        .wave {
            display: inline-block;
            animation: wave 1.8s infinite;
            transform-origin: 70% 70%;
        }

        .greeting-sub {
            font-size: 1.1rem;
            color: #fff;
            opacity: 0.9;
            font-weight: 300;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 1.25rem;
        }

        .info-card {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 1.2rem 1.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
            color: white;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        }

        .info-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }

        .icon-wrapper {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.7rem;
            margin-right: 1rem;
        }

        .icon-wrapper.primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        .icon-wrapper.secondary {
            background: linear-gradient(135deg, #f093fb, #e03aff);
            color: #fff;
            box-shadow: 0 4px 10px rgba(240, 147, 251, 0.3);
        }

        .info-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.85;
            font-weight: 600;
            transform: translateY(6px);
        }

        .info-value {
            font-size: 1.4rem;
            font-weight: 600;
            margin-top: 6px;
        }

        /* ✨ Animations */
        @keyframes gradientShift {
            0% {
                background-position: left;
            }

            100% {
                background-position: right;
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200px 0;
            }

            100% {
                background-position: 200px 0;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(-50%, -52%);
            }

            50% {
                transform: translate(-50%, -48%);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.2;
            }

            50% {
                transform: translate(-50%, -50%) scale(1.05);
                opacity: 0.1;
            }
        }

        @keyframes wave {

            0%,
            100% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(15deg);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease forwards;
        }

        .fade-in.delay-1 {
            animation-delay: 0.4s;
        }

        .fade-in.delay-2 {
            animation-delay: 0.8s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: none;
            }
        }

        @media (max-width: 768px) {
            .dashboard-body {
                padding: 2rem;
                text-align: center;
            }

            .dashboard-right {
                padding: 0;
            }

            .btn-profile-top {
                top: 0.8rem;
                right: 0.8rem;
                font-size: 0.8rem;
                padding: 0.35rem 0.8rem;
            }
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>
