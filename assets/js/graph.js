$(document).ready(function(){
    var myChart = null;

    fetchYear();

    function showGraph(title,labels, data, colors) {
        var ctx = document.getElementById('myChart').getContext('2d');
        if(myChart !== null) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: title,
                    data: data,
                    backgroundColor: colors
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function fetchYear(){
        $.ajax({
            type  : 'ajax',
            url   : '/Invoice/graph/fetchYear',
            async : true,
            dataType : 'json',
            success : function(resp){
                var labels = [];
                var data = [];
                var colors = [];
                resp.forEach(function(item) {
                    labels.push(item.DATE);
                    data.push(item.TOTAL);
                    colors.push(dynamicColors());
                });

                showGraph('Yearly Sales', labels, data, colors);
            }

        });
    }
    function fetchMonthly(){
        $.ajax({
            type  : 'ajax',
            url   : '/Invoice/graph/fetchMonthly',
            async : true,
            dataType : 'json',
            success : function(resp){
                var labels = [];
                var data = [];
                var colors = [];
                resp.forEach(function(item) {
                    labels.push(item.DATE);
                    data.push(item.TOTAL);
                    colors.push(dynamicColors());
                });

                showGraph('Yearly Sales', labels, data, colors);
            }

        });
    }

    function fetchDay(){
        $.ajax({
            type  : 'ajax',
            url   : '/Invoice/graph/fetchDay',
            async : true,
            dataType : 'json',
            success : function(resp){
                var labels = [];
                var data = [];
                var colors = [];
                resp.forEach(function(item) {
                    labels.push(item.DATE);
                    data.push(item.TOTAL);
                    colors.push(dynamicColors());
                });

                showGraph('Yearly Sales', labels, data, colors);
            }

        });
    }

    $('#yearly').on('click',function(){
        fetchYear();
    });

    $('#monthly').on('click',function(){
        fetchMonthly();
    });

    $('#daily').on('click',function(){
        fetchDay();
    });

    function dynamicColors() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgba(" + r + "," + g + "," + b + ", 0.5)";
    }
});