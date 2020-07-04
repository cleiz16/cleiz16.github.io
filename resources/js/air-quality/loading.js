function doit() {
        get_location(); 
        select_zone();       
        setImageforweatherDiv(id_weather,description);
        $('#owm_temp').html(Math.round(Number(cur_temp))-273 + "°C");
        $('#owm_hum').html(cur_humidity+"%");
        $('#owm_pressure').html(cur_pressure+"Pa");
        set_background_image();
        warning_scale();
    }
    doit();