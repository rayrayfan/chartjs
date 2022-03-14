<?php
require_once("./db_connect.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>各分位載具消費張數金額</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <style>
      .font{
  background: linear-gradient(to left, #3a1c71, #d76d77);
  background: -webkit-linear-gradient(to top, #3a1c71, #d76d77, #ffaf7b);
  background-clip: text;
  -webkit-background-clip: text;
  color: transparent;
}
  </style>
  <body>
  <div class="container"><p>&emsp; </p>
        <div class="text-center"><h4>各縣市 <font class="font" size="20">電腦系統設計服務業</font> 支付載具_消費金額總平均</h4></div>
        <div class="container"style="position: relative; height:40vh; width:40vw">
            <!-- <h4 class="text-center">甜甜圈圖表</h4> -->
            <canvas id="myChart"/></canvas>
            <p>&emsp; </p>
            <p>&emsp; </p><small class="fst-italic text-end">單位:百</small>
            <?php
                $sql="SELECT*FROM march11 ORDER BY id ASC;";
                $result= $conn -> query($sql);
                $data=$result->fetch_all(MYSQLI_ASSOC);
                $datapolar= json_encode($data);
            ?>
            <script>
                    let label=[];
                    let dataa=[];
                    let datapol=<?=$datapolar?>.map(function(item){
                        let datalet={
                            one:item["one"],
                            two:item["two"]
                        };
                        label.push(datalet.one);
                        dataa.push(datalet.two);
                        return datalet;
                    })
                    var ctx = document.getElementById('myChart');
        const data = {
            labels:label,
            datasets: [{
                label: 'My First Dataset',
                data:dataa,
                backgroundColor:[
                // 台北市
                "rgba(207,186,240, 1)",
                // 新北市
                'rgba(163,196,243, 1)',
                // 台中
                'rgba(144,219,244, 1)',
                // 基隆
                'rgba(142,236,245, 1)',
                // 台南
                'rgba(152,245,225, 1)',
                // 高雄
                'rgba(185,251,192, 1)',
                // 宜蘭
                'rgba(251,248,204, 5)',
                // 桃園
                'rgba(253,228,207, 10)',
                // 嘉義市
                'rgba(208, 140, 96, 0.5)',
                // 新竹縣
                'rgba(122, 28, 11, 0.5)',
                // 彰化縣
                'rgba(173, 46, 36, 0.5)',
                // 新竹市
                'rgba(222, 116, 135, 0.8)',
                // 雲林縣
                'rgba(255,207,210, 10)',
                // 嘉義縣
                'rgba(241,192,232, 1)',
                ],
                // hoverOffset: 20
            }]
        };

        const config = {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                // maintainAspectRatio: false
                aspectRatio: 1,
            }
        };
        const myChart = new Chart(ctx, config)
        </script>
        </div>
        </div>
        </div>
    </div>







    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>