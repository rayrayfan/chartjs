<?php
require_once("./db_connect.php");
$sql="SELECT `receipt`,sum(`number`) AS `total` FROM `receipt`group by`receipt`";
$result= $conn -> query($sql);
$data=$result->fetch_all(MYSQLI_ASSOC);
$pie= json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>載具</title>
</head>
<body>
	<h1 class="text-center">載具別總類張數比例</h1>  
	<canvas id="myChart" width="800" height="600"></canvas>

    <script>
		let label1=[];
		let data1=[];
		let pieChart=<?=$pie?>.map(function(item){
                        let newItem={
                            a:item["receipt"],
                            b:item["total"]
                        };
                        label1.push(newItem.a);
                        data1.push(newItem.b);
                        return newItem;
                    });

		console.log(pieChart);

        
		var ctx = document.getElementById('myChart');
		const data=  {
				labels: label1,
				datasets: [{
					data:data1,
					backgroundColor: [
						'rgba(251,248,204, 5)',
						'rgba(173, 46, 36, 0.5)',
						'rgba(207,186,240, 1)',
					],
					hoverOffset: 4
				}]
			};	

		const config = {
        	type: 'pie',
        	data: data,
        	options: {
				responsive: true,
            	aspectRatio: 1,
        	},
};

    const myChart = new Chart(ctx,config)
        
    </script>
</body>
</html>