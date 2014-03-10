(function(){
    var color_stops = [
        [11,192,194],
        [248,99,243],
        [252,88,67]
    ];

    var update_ticks = 10;
    var ticks_between_stops = 20000;

    var current_stop_position = Math.floor(Math.random()*color_stops.length);
    var current_ticks = Math.floor(Math.random()*ticks_between_stops);
    var on_tick = function()
    {
        // Get information on where we're going and where we've been
        var next_stop_position = current_stop_position + 1;
        if (next_stop_position >= color_stops.length) {
            next_stop_position = 0;
        }

        var previous_color_stop = color_stops[current_stop_position];
        var next_color_stop = color_stops[next_stop_position];
        var current_percent = current_ticks/ticks_between_stops;

        // Update the color
        var linear_interpolate = function(old_value, new_value, percent) {
            return Math.round(old_value + ((new_value - old_value) * percent));
        }

        var new_color = [
            linear_interpolate(previous_color_stop[0], next_color_stop[0], current_percent),
            linear_interpolate(previous_color_stop[1], next_color_stop[1], current_percent),
            linear_interpolate(previous_color_stop[2], next_color_stop[2], current_percent)
        ];

        document.body.parentNode.style.background = 'rgb('+new_color[0]+','+new_color[1]+','+new_color[2]+')';
        document.body.style.background = 'rgb('+new_color[0]+','+new_color[1]+','+new_color[2]+')';

        // Increment how far we are
        current_ticks += update_ticks;

        // If we're past the threshhold for switching colors, switch colors
        if (current_ticks >= ticks_between_stops) {
            current_ticks = 0;
            current_stop_position += 1;

            // If we're at the end of the stops, wrap to the beginning
            if (current_stop_position >= color_stops.length) {
                current_stop_position = 0;
            }
        }
    }

    window.addEventListener('load', function(){
        on_tick();
        setInterval(on_tick, update_ticks);
    });
})();