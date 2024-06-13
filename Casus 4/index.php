<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uitgebreide Rekenmachine</title>
    <style>
        .calculator {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            max-width: 200px;
            margin: 0 auto;
        }
        .calculator button {
            font-size: 1.5em;
            padding: 10px;
            margin: 2px;
        }
        .display {
            grid-column: span 4;
            padding: 10px;
            font-size: 1.5em;
            text-align: right;
        }
        .history {
            max-width: 200px;
            margin: 20px auto;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Uitgebreide Rekenmachine</h1>
    <div class="calculator">
        <div class="display" id="display"></div>
        <button onclick="appendToExpression('1')">1</button>
        <button onclick="appendToExpression('2')">2</button>
        <button onclick="appendToExpression('3')">3</button>
        <button onclick="appendToExpression('+')">+</button>
        <button onclick="appendToExpression('4')">4</button>
        <button onclick="appendToExpression('5')">5</button>
        <button onclick="appendToExpression('6')">6</button>
        <button onclick="appendToExpression('-')">-</button>
        <button onclick="appendToExpression('7')">7</button>
        <button onclick="appendToExpression('8')">8</button>
        <button onclick="appendToExpression('9')">9</button>
        <button onclick="appendToExpression('*')">*</button>
        <button onclick="appendToExpression('0')">0</button>
        <button onclick="appendToExpression('.')">.</button>
        <button onclick="clearDisplay()">C</button>
        <button onclick="appendToExpression('/')">/</button>
        <button onclick="appendToExpression('**')">^</button>
        <button onclick="appendToExpression('%')">%</button>
        <button onclick="appendToExpression('sqrt(')">√</button>
        <button onclick="calculate()">=</button>
    </div>
    <div class="history">
        <h2>Vorige Berekeningen</h2>
        <ul id="history"></ul>
    </div>
    <script>
        let expression = '';

        function appendToExpression(value) {
            expression += value;
            document.getElementById('display').innerText = expression;
        }

        function clearDisplay() {
            expression = '';
            document.getElementById('display').innerText = expression;
        }

        function calculate() {
            fetch('calculate.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `expression=${encodeURIComponent(expression)}`,
            })
            .then(response => response.text())
            .then(result => {
                document.getElementById('display').innerText = result;
                expression = '';
                fetchHistory();  // Fetch the history after calculation
            })
            .catch(error => {
                document.getElementById('display').innerText = 'Error';
                expression = '';
            });
        }

        function fetchHistory() {
            fetch('history.php')
                .then(response => response.json())
                .then(data => {
                    const historyElement = document.getElementById('history');
                    historyElement.innerHTML = '';
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = `${item.timestamp}: ${item.expression} = ${item.result}`;
                        historyElement.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Error fetching history:', error);
                });
        }

        // Fetch history on page load
        window.onload = fetchHistory;
    </script>
</body>
</html>
