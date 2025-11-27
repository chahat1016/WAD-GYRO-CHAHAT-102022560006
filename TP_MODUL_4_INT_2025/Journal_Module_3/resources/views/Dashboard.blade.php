
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Laravel Practicum</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: linear-gradient(135deg, #4b3f72 0%, #3a3258 100%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
            color: #fff;
        }
        .dashboard-container { 
            background: rgba(255, 255, 255, 0.15); /* Glass effect background */
            backdrop-filter: blur(10px);
            border-radius: 20px; 
            padding: 40px; 
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3); 
            max-width: 900px; 
            width: 90%;
            display: grid;
            grid-template-areas: 
                "icon header link"
                "icon time date";
            grid-template-columns: 100px 1fr auto;
            gap: 20px 30px;
        }
        .profile-icon { 
            grid-area: icon;
            width: 100px; height: 100px; border-radius: 50%; 
            overflow: hidden; 
            background-color: #f0f0f0; 
            display: flex; 
            justify-content: center; 
            align-items: center;
        }
        .profile-icon img { 
            width: 100%; height: 100%; object-fit: contain; 
        }
        .header-content { grid-area: header; text-align: left; }
        .greeting { font-size: 2.2em; font-weight: 600; margin-bottom: 5px; }
        .student-name { color: #8ef7ff; }
        .welcome-text { font-size: 1.1em; color: #ccc; margin-top: 0; }
        .profile-link-area { grid-area: link; align-self: start; }
        .profile-link { 
            text-decoration: none; 
            background-color: #5c6ac4; 
            color: white; 
            padding: 10px 20px; 
            border-radius: 20px; 
            display: inline-block; 
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .profile-link:hover { background-color: #4354a3; }
        .info-card { 
            background: rgba(255, 255, 255, 0.1); 
            border-radius: 10px; 
            padding: 15px; 
            text-align: center; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .time-card { grid-area: time; }
        .date-card { grid-area: date; }
        .card-title { font-weight: 300; font-size: 0.9em; margin-bottom: 5px; color: #c0c0c0; }
        .card-value { font-size: 1.8em; font-weight: bold; color: #fff; }

        @media (max-width: 600px) {
            .dashboard-container {
                grid-template-areas: 
                    "icon header"
                    "link link"
                    "time date";
                grid-template-columns: auto 1fr;
                gap: 15px;
            }
            .profile-link-area { text-align: center; }
            .greeting { font-size: 1.8em; }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        
        {{-- EAD Logo as Profile Icon (assuming the image is available in public/images) [cite: 166] --}}
        <div class="profile-icon">
            <img src="{{ asset('images/logo-ead.png') }}" alt="EAD Logo">
        </div>

        <div class="header-content">
            {{-- Greeting message based on time [cite: 157-162] --}}
            <div class="greeting">{{ $greeting }}!, <span class="student-name">{{ $studentData['name'] }}</span></div>
            <p class="welcome-text">Welcome to the EAD Practicum Dashboard.</p>
        </div>

        <div class="profile-link-area">
            <a href="{{ route('profile') }}" class="profile-link">View Profile</a>
        </div>

        {{-- Current Access Time (WIB) [cite: 164] --}}
        <div class="info-card time-card">
            <div class="card-title">ACCESS TIME (WIB)</div>
            <div class="card-value">{{ $accessTime }}</div>
        </div>
        
        {{-- Today's Date (d-m-Y) [cite: 165] --}}
        <div class="info-card date-card">
            <div class="card-title">DATE</div>
            <div class="card-value">{{ $accessDate }}</div>
        </div>
    </div>
</body>
</html>