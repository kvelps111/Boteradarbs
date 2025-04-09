<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Machine</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #e63946;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-family: 'Arial', sans-serif;
            z-index: 1000;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .back-button:hover {
            background: #f1faee;
            transform: scale(1.1);
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: url('Slot-images/5c89a2aeda44a59a73aff718e95206d2.jpg') center/cover no-repeat;
            background-size: cover;
            animation: backgroundMove 15s infinite linear;
            font-family: 'Arial', sans-serif;
        }

        @keyframes backgroundMove {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 100% 100%;
            }
        }

        .slot-machine {
            width: 800px;
            height: 600px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 20px;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 5px solid #ffbe0b;
            animation: slotMachineGlow 1s infinite alternate;
        }

        @keyframes slotMachineGlow {
            0% {
                box-shadow: 0 0 10px #ffbe0b, 0 0 20px #ffbe0b, 0 0 30px #ffbe0b;
            }

            100% {
                box-shadow: 0 0 30px #ffbe0b, 0 0 50px #ffbe0b, 0 0 70px #ffbe0b;
            }
        }

        .reels-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
            height: 300px;
        }

        .reel {
    width: 120px;
    height: 100%;
    border: 2px solid #a40b0b;
    border-radius: 5px;
    overflow: hidden;
    position: relative;
    background: #fff;
    /* Remove any transform/tilting effect */
    transform: none;  /* Ensure there's no transformation applied */
    animation: none;   /* Ensure there's no animation applied */
}


        @keyframes reelSpin {
            0% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(10deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .reel-symbol {
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            animation: symbolShake 0.5s infinite ease-in-out;
        }

        

        .controls {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
        }

        .info-panel {
            display: flex;
            justify-content: space-around;
            width: 100%;
            background: #222;
            padding: 10px;
            border-radius: 5px;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 0 10px #ffbe0b;
        }

        .info-item {
            text-align: center;
        }

        .info-label {
            font-size: 14px;
            color: #ccc;
        }

        .info-value {
            font-size: 24px;
            font-weight: bold;
        }

        button {
            background: #ffbe0b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background: #d4a300;
            transform: scale(1.1);
        }

        button:disabled {
            background: #888;
            cursor: not-allowed;
        }

        .bet-controls {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .bet-btn {
            padding: 5px 10px;
            font-size: 16px;
            transition: transform 0.3s ease;
        }

        .bet-btn:hover {
            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            .slot-machine {
                width: 100%;
                height: auto;
                padding: 10px;
            }

            .reels-container {
                height: 200px;
            }

            .reel {
                width: 60px;
            }

            .reel-symbol {
                height: 60px;
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <a href="/dashboard" class="back-button">Back to Dashboard</a>

    <div class="slot-machine">
        <div class="info-panel">
            <div class="info-item">
                <div class="info-label">BALANCE</div>
                <div class="info-value" id="balance">1000</div>
            </div>
            <div class="info-item">
                <div class="info-label">BET</div>
                <div class="info-value" id="bet">10</div>
            </div>
            <div class="info-item">
                <div class="info-label">WINNINGS</div>
                <div class="info-value" id="winnings">0</div>
            </div>
        </div>

        <div class="reels-container" id="reels">
            <!-- Reels will be generated by JavaScript -->
        </div>

        <div class="controls">
            <div class="bet-controls">
                <button class="bet-btn" id="decrease-bet">-</button>
                <button class="bet-btn" id="increase-bet">+</button>
            </div>
            <button id="spin-btn">SPIN</button>
        </div>
    </div>

    <script>
        // Configuration - PUT YOUR IMAGE PATHS HERE
        const symbols = [
            { name: "book-10", image: "Slot-images/book-10-.webp", multiplier: 2 },
            { name: "book-A", image: "Slot-images/book-A-.webp", multiplier: 3 },
            { name: "book-J", image: "Slot-images/book-J-.webp", multiplier: 4 },
            { name: "book-K", image: "Slot-images/book-K-.webp", multiplier: 5 },
            { name: "book-lembergs", image: "Slot-images/book-lembergs-.png", multiplier: 10 }
        ];

        function preloadImages() {
            symbols.forEach(symbol => {
                const img = new Image();
                img.src = symbol.image;
            });
        }
        preloadImages();

        // Game state
        let balance = 1000;
        let bet = 10;
        let winnings = 0;
        let isSpinning = false;

        // DOM elements
        const reelsContainer = document.getElementById('reels');
        const balanceDisplay = document.getElementById('balance');
        const betDisplay = document.getElementById('bet');
        const winningsDisplay = document.getElementById('winnings');
        const spinBtn = document.getElementById('spin-btn');
        const increaseBetBtn = document.getElementById('increase-bet');
        const decreaseBetBtn = document.getElementById('decrease-bet');

        // Initialize the reels
        function initializeReels() {
            reelsContainer.innerHTML = '';
            for (let i = 0; i < 5; i++) {
                const reel = document.createElement('div');
                reel.className = 'reel';
                reel.id = `reel-${i}`;

                // Create 3 visible symbols per reel (we'll animate the position)
                for (let j = 0; j < 3; j++) {
                    const symbol = document.createElement('div');
                    symbol.className = 'reel-symbol';
                    const randomSymbol = symbols[Math.floor(Math.random() * symbols.length)];
                    symbol.innerHTML = `<img src="${randomSymbol.image}" alt="${randomSymbol.name}" style="max-width:80%; max-height:80%;">`;
                    reel.appendChild(symbol);
                }

                reelsContainer.appendChild(reel);
            }
        }

        // Spin the reels
        function spinReels() {
    if (isSpinning || balance < bet) return;

    isSpinning = true;
    balance -= bet;
    balanceDisplay.textContent = balance;
    winnings = 0;
    winningsDisplay.textContent = winnings;
    spinBtn.disabled = true;

    // Spin each reel without the shaking effect
    const reels = document.querySelectorAll('.reel');
    const spinPromises = [];

    reels.forEach((reel, index) => {
        spinPromises.push(new Promise(resolve => {
            const spinDuration = 2000 + (index * 500);
            const startTime = Date.now();

            const spinInterval = setInterval(() => {
                const symbolElements = reel.querySelectorAll('.reel-symbol');
                symbolElements.forEach(symbol => {
                    // This removes the shaking logic and just scrolls the symbols
                    const randomSymbol = symbols[Math.floor(Math.random() * symbols.length)];
                    
                    // Clear existing content and add new symbol
                    symbol.innerHTML = `<img src="${randomSymbol.image}" alt="${randomSymbol.name}" style="max-width:80%; max-height:80%;">`;
                });

                if (Date.now() - startTime > spinDuration) {
                    clearInterval(spinInterval);
                    resolve();
                }
            }, 100);
        }));
    });

    Promise.all(spinPromises).then(() => {
        setTimeout(() => {
            calculateResults();
            isSpinning = false;
            spinBtn.disabled = false;
        }, 300);
    });
}


        // Calculate winnings based on visible symbols
        function calculateResults() {
            const reels = document.querySelectorAll('.reel');
            const visibleSymbols = [];

            reels.forEach(reel => {
                const symbolsInReel = reel.querySelectorAll('.reel-symbol');
                const middleSymbol = symbolsInReel[1];
                const imgElement = middleSymbol.querySelector('img');

                // Get just the filename without path
                const imgSrc = imgElement.src.split('/').pop();
                visibleSymbols.push(imgSrc);
            });

            // Count matches
            const symbolCounts = {};
            visibleSymbols.forEach(symbol => {
                symbolCounts[symbol] = (symbolCounts[symbol] || 0) + 1;
            });

            // Calculate winnings
            for (const [symbolImg, count] of Object.entries(symbolCounts)) {
                if (count >= 3) {
                    const symbol = symbols.find(s => s.image.includes(symbolImg));
                    if (symbol) {
                        const multiplier = symbol.multiplier * (count / 3);
                        winnings += Math.floor(bet * multiplier);
                    }
                }
            }

            balance += winnings;
            balanceDisplay.textContent = balance;
            winningsDisplay.textContent = winnings;
        }

        // Bet controls
        function increaseBet() {
            if (isSpinning) return;
            bet = Math.min(bet + 10, 100); // Max bet 100
            betDisplay.textContent = bet;
        }

        function decreaseBet() {
            if (isSpinning) return;
            bet = Math.max(bet - 10, 10); // Min bet 10
            betDisplay.textContent = bet;
        }

        // Event listeners
        spinBtn.addEventListener('click', spinReels);
        increaseBetBtn.addEventListener('click', increaseBet);
        decreaseBetBtn.addEventListener('click', decreaseBet);

        // Initialize the game
        initializeReels();
    </script>
</body>

</html>
