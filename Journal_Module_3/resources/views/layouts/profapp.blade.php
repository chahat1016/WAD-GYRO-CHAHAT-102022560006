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
            margin: 0;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 60%, #f093fb 100%);
        }

        /* === PROFILE CARD === */
        .profile-wrapper {
            position: relative;
            width: 90%;
            max-width: 550px;
            animation: fadeIn 0.8s ease forwards;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            border-radius: 25px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
            padding: 2rem 2.3rem;
            text-align: center;
            transition: all 0.3s ease;
            animation: popUp 1s ease;
        }

        .profile-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 1.8rem;
        }

        .avatar {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            margin-bottom: 1rem;
            animation: avatarFloat 4s ease-in-out infinite;
        }

        @keyframes avatarFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        .profile-identity h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .profile-identity p {
            font-size: 0.9rem;
            opacity: 0.85;
        }

        .profile-info {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            padding: 1rem 1.5rem;
            margin-top: 1rem;
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.05);
            animation: slideUp 1s ease;
        }

        .info-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .info-group:last-child { border-bottom: none; }

        .label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #d5d8ff;
        }

        .value {
            font-weight: 500;
            color: #fff;
            text-align: right;
            font-size: 0.9rem;
        }

        .btn-wrapper { margin-top: 1.5rem; }

        .btn-back {
            display: inline-block;
            padding: 0.5rem 1.1rem;
            border-radius: 10px;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #667eea, #764ba2);
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.25);
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #764ba2, #667eea);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes popUp {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .profile-card { padding: 1.8rem 1.3rem; }
        }
    </style>
</head>

<body>
    @yield('content')
</body>
</html>
