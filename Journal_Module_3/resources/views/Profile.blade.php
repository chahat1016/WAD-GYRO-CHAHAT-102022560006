
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Laravel Practicum</title>
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
        .profile-container { 
            background: rgba(255, 255, 255, 0.15); /* Glass effect background */
            backdrop-filter: blur(10px);
            border-radius: 20px; 
            padding: 40px; 
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3); 
            max-width: 450px; 
            width: 90%;
            text-align: center; 
        }
        .avatar { 
            background-color: #5c6ac4; 
            color: white; 
            width: 70px; 
            height: 70px; 
            line-height: 70px; 
            border-radius: 50%; 
            font-size: 2.5em; 
            font-weight: bold;
            margin: 0 auto 15px; 
        }
        h2 { margin: 0; font-size: 1.8em; }
        .nim { margin-top: 5px; font-size: 1.1em; color: #ccc; }
        .details-grid {
            margin-top: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px 10px;
            text-align: left;
        }
        .label { 
            font-weight: 600; 
            color: #ccc; 
            border-right: 1px solid rgba(255, 255, 255, 0.2); 
            padding-right: 10px;
        }
        .value { 
            color: #8ef7ff; 
            padding-left: 10px;
        }
        .full-width { grid-column: 1 / span 2; margin-top: 15px; }
        .full-width .label { border: none; }
        .back-link { 
            text-decoration: none; 
            background-color: #5c6ac4; 
            color: white; 
            padding: 10px 20px; 
            border-radius: 20px; 
            margin-top: 30px; 
            display: inline-block; 
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .back-link:hover { background-color: #4354a3; }
    </style>
</head>
<body>
    <div class="profile-container">
        {{-- Display first letter of name [cite: 168] --}}
        <div class="avatar">{{ substr($studentData['name'], 0, 1) }}</div>
        
        <h2>{{ $studentData['name'] }}</h2>
        {{-- Display NIM [cite: 169] --}}
        <p class="nim">{{ $studentData['nim'] }}</p>

        <div class="details-grid">
            {{-- Study Program [cite: 171] --}}
            <span class="label">Study Program (Prodi):</span>
            <span class="value">{{ $studentData['study_program'] }}</span>
            
            {{-- Faculty [cite: 172] --}}
            <span class="label">Faculty:</span>
            <span class="value">{{ $studentData['faculty'] }}</span>

            {{-- Class [cite: 170] --}}
            <span class="label">Class:</span>
            <span class="value">{{ $studentData['class'] }}</span>

            {{-- Email [cite: 173] --}}
            <span class="label">Email:</span>
            <span class="value">{{ $studentData['email'] }}</span>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">← Dashboard</a>
    </div>
</body>
</html>