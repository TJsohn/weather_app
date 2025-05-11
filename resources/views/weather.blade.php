<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <title>Weather App</title>
</head>

<body>
    <div>
        <h1>Weather App</h1>
        <label class="label" for ="city">Enter city name</label>
        <form method="get" action="{{ route('weather') }}">
            <input type="text" name="city" class="input" placeholder="e.g., London" id="city"
                autocomplete="off" value="{{ $city }}" />
            <button type="submit" class="btn btn-default">Get Weather</button>
        </form>
    </div>

    @if ($error)
        <div class="alert" style="color: var(--accent-1); margin-top: 1em;">
            {{ $error }}
        </div>
    @elseif(!empty($weatherData))
        <h2>Weather in {{ $weatherData['name'] }}</h2>
        <table>
            <tr class="table-header">
                <th>Attribute</th>
                <td>Value</td>
            </tr>
            <tr>
                <th>Temperature</th>
                <td>{{ $weatherData['main']['temp'] }} °C</td>
            </tr>
            <tr>
                <th>Weather</th>
                <td>{{ $weatherData['weather'][0]['description'] }}</td>
            </tr>
            <tr>
                <th>Humidity</th>
                <td>{{ $weatherData['main']['humidity'] }}%</td>
            </tr>
            <tr>
                <th>Wind Speed</th>
                <td>{{ $weatherData['wind']['speed'] }} m/s</td>
            </tr>
        </table>
    @endif

</body>

</html>
