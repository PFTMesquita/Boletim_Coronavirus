const request = new XMLHttpRequest();
request.open('GET', "dados-grafico.json")
request.send();
request.addEventListener("readystatechange", () => {
    
    if(request.readyState === 4 && request.status === 200) {

        let parse = JSON.parse(request.response);
        console.log(parse.obitos);
    }

})

let ctx = document.getElementById("myChart");
let chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            'Abr',
            'Mai',
            'Jun',
            'Jul',
            'Ago',
            'Set',
            'Out',
            'Nov',
            'Dez'
        ],
        datasets: [
            {
                label: 'Infectados Confirmados',
                data: [01, 164, 511, 755, 1241],
                borderColor: '#1CC88A',
                borderCapStyle: 'but',
                fill: false
            },  
            {
                label: 'Óbitos',
                data: [0, 13, 63, 108, 157],
                borderColor: '#4E73DF',
                borderCapStyle: 'but',
                fill: false
            }
        ]
    },
    options: {
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true
                    }
                }
            ]
        }
    }
});

