$(function() {
    // const apiUrl = https: //www.life-socket.jp/api/v1/weather/location/35.6895014/139.6917337?days=7'; 
    // Call Lifesocket API to get weather information 
    // To call api, you need to add x-access-key to header 
    $.ajax({
        url: "https://www.life-socket.jp/api/v1/weather/location/35.6895014/139.6917337?days=7'",
        headers: { 'x-access-key': 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX' },
        success: function(response) { displayWeatherInfo(response); },
        error: function(xhr) {}
    });

    displayWeatherInfo = function(data) {
        const hasData = data !== null && data.Daily !== null && data.Daily.length > 0;
        if (!hasData) { return; }

        let dateHeader = '<div class="item header-bg">日付</div>';
        let rain = '<div class="item header-bg">天気</div>';
        let temp = '<div class="item header-bg">気温(℃)</div>';
        let rainPercent = '<div class="item header-bg">降水確率(％)</div>';
        let wind = '<div class="item header-bg">風向風速</div>';
        $.each(data.Daily, function(index, item) {
            moment.locale('ja');
            const date = moment(item.DateTime);
            const weekDayName = date.format('ddd');

            dateHeader += ` 
            <div class="item date-bg"> 
            <div class="info"> 
            <div>${date.format('MM/DD')}</div> 
            <div>(${weekDayName})</div> 
            </div> 
            </div>`;
            // To display weather icon, you need to download weather icon from Lifesocket 

            rain += ` 
            <div class="item"> 
            <div class="info"> 
            <div class="weather-icon"> 
            <img src="./images/weather-icons/${item.Icon}"> 
            </div> 
            <div>${item.WeatherName}</div> 
            </div> 
            </div>`;
            temp += `<div class="item"><span class="max-temp">${item.TemperatureMax}</span>/<span class="min-temp">${item.TemperatureMin}</span></div>`;
            rainPercent += `<div class="item">${item.RainPercentage}</div>`;
            wind += `<div class="item">${item.WindDirectionName} ${item.WindSpeed}m/s </div>`;
        });

        const table = ` 
        <div class="c-weather"> 
        <div class="row">${dateHeader}</div> 
        <div class="row">${rain}</div> 
        <div class="row">${temp}</div> 
        <div class="row">${rainPercent}</div> 
        <div class="row">${wind}</div> 
        </div> 
        `;

        $("#weatherInfoId").append(table);
    }
});