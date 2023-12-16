<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Circles</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            padding: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .circle {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            border-radius: 50%;
            margin: 10px;
        }

        .red {
            background-color: red;
        }

        .green {
            background-color: green;
        }

        .blue {
            background-color: blue;
        }
        .yellow {
            background-color: yellow;
        }
        .button-container {
            margin-top: 20px;
        }

        .action-button {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Choose a Table</h1>

        <div class="grid" id="circleGrid">
            <?php
                $conn = new mysqli("localhost", "root", "", "stock");
                $sql = "SELECT * FROM `tab`";
                $result = $conn->query($sql);
                if ($result) {
                    while ($row = $result->fetch_array()) {
                        $circleClass = ($row["mode"] == 'r' && $row['client'] == $_SESSION['userc'] ) ? 'yellow' : $circleClass = ($row["mode"] == 'r') ? 'red' : 'green';
            ?>
                        <div class="circle <?php echo $circleClass; ?>" data-id="<?php echo $row['num']; ?>">
                            <?php echo $row["num"]; ?>
                        </div>
            <?php
                    }
                } 
                else {
                    echo "0 results";
                }
            ?>
        </div>

        <div class="button-container">
            <button class="action-button" onclick="sendSelectedNumbers()">confirm</button>
        </div>
    </div>
    <div style="position: fixed; bottom: 10px; right: 10px;">
        <a href="index.php" style="text-decoration: none; color: #4CAF50; font-weight: bold;">Return to Home</a>
    </div>
    <script>
        var selectedNumbers = [];

        function toggleSelection(circle) {
            var dataId = circle.getAttribute('data-id');

            if (circle.classList.contains('green')) {
                if (!selectedNumbers.includes(dataId)) {
                    selectedNumbers.push(dataId);
                    circle.classList.add('blue');
                } else {
                    selectedNumbers = selectedNumbers.filter(number => number !== dataId);
                    circle.classList.remove('blue');
                }
            }
        }

        function sendSelectedNumbers() {
            if (selectedNumbers.length > 0) {
                var selectedNumbersString = selectedNumbers.join(',');
                window.location.href = 'take.php?numbers=' + selectedNumbersString;
            } else {
                alert('Please select at least one table.');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            var circles = document.querySelectorAll('.circle');

            circles.forEach(function (circle) {
                circle.addEventListener('click', function () {
                    toggleSelection(circle);
                });
            });
        });
    </script>
</body>
</html>
