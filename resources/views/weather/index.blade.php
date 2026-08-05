<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weekly Weather</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=Zen+Kaku+Gothic+New:wght@400;700;900&display=swap');

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Zen Kaku Gothic New', sans-serif;
            min-height: 100vh;
            background: linear-gradient(180deg, #6ea8d8 0%, #a3c9e8 25%, #f5c9d6 55%, #ffe3c2 80%, #fff2df 100%);
            padding: 60px 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* soft drifting clouds */
        body::before, body::after {
            content: "";
            position: absolute;
            background: radial-gradient(circle, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0) 70%);
            width: 500px;
            height: 250px;
            top: 5%;
            left: -10%;
            filter: blur(2px);
            z-index: 0;
        }
        body::after {
            top: 15%;
            left: 60%;
            width: 400px;
            height: 200px;
        }

        .container {
            max-width: 780px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        h1 {
            text-align: center;
            font-size: 2.6rem;
            font-weight: 900;
            color: #2c3e6b;
            text-shadow: 0 2px 12px rgba(255,255,255,0.7);
            margin-bottom: 4px;
        }

        .subtitle {
            text-align: center;
            font-family: 'Kosugi Maru', sans-serif;
            color: #4a5a8a;
            font-size: 1rem;
            letter-spacing: 0.15em;
            margin-bottom: 40px;
            opacity: 0.85;
        }

        .forecast-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .day-card {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            padding: 24px 18px;
            text-align: center;
            box-shadow: 0 8px 24px rgba(80, 100, 160, 0.15);
            transition: transform 0.25s ease;
        }

        .day-card:hover {
            transform: translateY(-6px);
        }

        .day-name {
            font-weight: 700;
            font-size: 1.15rem;
            color: #2c3e6b;
            margin-bottom: 10px;
        }

        .icon {
            font-size: 2.8rem;
            margin: 6px 0;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }

        .condition {
            font-family: 'Kosugi Maru', sans-serif;
            color: #5a6a9a;
            font-size: 0.95rem;
            margin-bottom: 14px;
        }

        .temps {
            display: flex;
            justify-content: center;
            gap: 14px;
            font-size: 1rem;
        }

        .high { color: #d9695f; font-weight: 700; }
        .low { color: #4a7fc9; font-weight: 700; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Weekly Weather Forecast</h1>

        <div class="forecast-grid">
            @foreach ($weather as $day)
                @php
                    $icons = [
                        'Sunny' => '☀️',
                        'Partly Cloudy' => '⛅',
                        'Cloudy' => '☁️',
                        'Rain' => '🌧️',
                        'Rainy' => '🌧️',
                        'Snow' => '❄️',
                        'Storm' => '⛈️',
                    ];
                    $icon = $icons[$day['condition']] ?? '🌤️';
                @endphp
                <div class="day-card">
                    <div class="day-name">{{ $day['day'] }}</div>
                    <div class="icon">{{ $icon }}</div>
                    <div class="condition">{{ $day['condition'] }}</div>
                    <div class="temps">
                        <span class="high">{{ $day['high'] }}°F</span>
                        <span class="low">{{ $day['low'] }}°F</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>