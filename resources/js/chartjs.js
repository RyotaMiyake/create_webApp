import Chart from "chart.js/auto";
import axios from 'axios';

const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
    type: "line",
    data: {
        //labels: ["月", "火曜", "水曜", "木曜", "金曜", "土曜", "日曜"],
        datasets: [
            {
                label: "勉強時間推移",
                //data: コントローラから取得,
                borderColor: "rgb(75, 192, 192)",
                backgroundColor: "rgba(75, 192, 192, 0.5)",
            },
        ],
    },
    options: {
        scales: {
              y: {
                    min: 0,
                    ticks: {
                        display: true,
                        stepSize: 1,
                    },
                    title:{
                        display: true,
                        text: '勉強時間（時間）'
                    }
              }
        }
  }
});

// Laravelのチャートデータ取得処理の呼び出し
axios
    .get("/chart-get")
    .then((response) => {
        // Chartの更新
        myChart.data.labels = response.data[0]
        myChart.data.datasets[0].data = response.data[1];
        myChart.update();
    })
    .catch(() => {
        alert("失敗しました");
    });