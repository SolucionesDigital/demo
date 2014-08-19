(function($){

    "use strict";

    $(function(){

        var barsData = {
            labels : [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio" ],
            datasets : [{
                fillColor : "rgba(19, 110, 82, 1)",
                strokeColor : "rgba(204, 229, 156, 1)",
                data : [ 28, 48, 80, 68, 50, 70, 80 ]
            }]
        };

        var barsOptions = {
            scaleFontColor  : "#555555",
            barShowStroke   : false,
            scaleFontSize   : 12,
            scaleOverride   : true,
            scaleSteps      : 10,
            scaleStepWidth  : 10,
            scaleStartValue : 0,
            barValueSpacing : 0,
            barStrokeWidth  : -4
        };

        var barChart = new Chart(document.getElementById('bar').getContext("2d")).Bar( barsData, barsOptions );

    });

})(jQuery);
