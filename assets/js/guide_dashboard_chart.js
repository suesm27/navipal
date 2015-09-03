var month_by_month_earning = [];
var guide_id = document.getElementById('guide_id').value;
// var hardcodenames = ['sue', 'sourabh', 'ray'];
$(document).ready(function(){
  $(function initialize() {
    $.get('/guides/get_month_by_month_earnings_by_guide_id/'+guide_id, function(res) {
      for(var i=0; i<res.month_by_month_earnings.length; i++){
        month_by_month_earning.push(parseInt(res.month_by_month_earnings[i].count));
      }
        // Load the fonts
        Highcharts.createElement('link', {
         href: '//fonts.googleapis.com/css?family=Unica+One',
         rel: 'stylesheet',
         type: 'text/css'
       }, null, document.getElementsByTagName('head')[0]);

    // Apply the theme
    // Highcharts.setOptions(Highcharts.theme);
    $('#linechart').highcharts({
        title: {
            text: 'Monthly Earnings',
            x: -20 //center
        },
        subtitle: {
            text: 'Based on total bookings',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Earning ($)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valuePrefix: '$'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Earnings',
            data: month_by_month_earning
        }]
    });
  }, "json");
$('form').submit(function(){
  return false;
});

});
});