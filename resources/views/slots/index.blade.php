<!DOCTYPE html>
<html>
<head>
    <title>Slot Machine</title>
    <style>
        /* Added box-sizing for consistent dimensions */
        * {
            box-sizing: border-box;
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #a40b0b;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-family: Arial, sans-serif;
            z-index: 1000;
            transition: background 0.3s ease;
        }

        .back-button:hover {
            background: #8a0909;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: url('Slot-images/slot-background.jpg') center/cover no-repeat;
        }

        .slot-machine {
            width: 800px;
            height: 600px;
            background: #1a1a1a center/cover;
            border-radius: 10px;
            padding: 20px;
            font-family: Arial, sans-serif;
            position: relative;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .reels {
            height: 400px; /* Updated height for better display */
            width: 100%;
            border-radius: 5px;
            display: flex;
            justify-content: space-around; /* Ensure even distribution */
            align-items: center; /* Align reels vertically */
            overflow: hidden;
        }

        .reel {
            width: calc(100% / 3); /* Adjusted width for three reels */
            height: 400px; /* Match the height of reels container */
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .symbol {
            width: 100px;
            height: 100px;
        }

        .controls {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.4);
            padding: 10px;
            border-radius: 5px;
        }

        .balance, .bet-amount {
            color: #fff;
            font-size: 24px;
        }

        button {
            background: #a40b0b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #8a0909;
        }

        .spin-button {
            background: #4CAF50;
            color: white;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .slot-machine {
                width: 100%;
                height: auto; /* Adjust height for smaller screens */
            }

            .reel {
                width: 100px; /* Smaller reels for smaller screens */
                height: 100px;
            }
        }
    </style>
</head>
<body>
    <a href="/dashboard" class="back-button">Back to Dashboard</a>

    <div class="slot-machine">
        <div class="reels" id="reels">
            <!-- Reels will be dynamically populated -->
        </div>
        <div class="controls">
            <div class="balance">Balance: $<span id="balanceValue">1000</span></div>
            <div class="bet-controls">
                <button onclick="decreaseBet()">-</button>
                <div class="bet-amount">$<span id="betValue">100</span></div>
                <button onclick="increaseBet()">+</button>
            </div>
            <button class="spin-button" onclick="spin()">SPIN</button>
        </div>
    </div>

    <script>
        // Game State
        let balance = 1000;
        let currentBet = 100;
        const minBet = 10;
        const maxBet = 1000;
        const images = ['book-10-.jpg', 'book-A-.jpg', 'book-J-.jpg', 'book-K-.webp'];
        const imageFolderPath = 'Slot-images/';

        // DOM Elements
        const balanceElement = document.getElementById('balanceValue');
        const betElement = document.getElementById('betValue');
        const reels = document.getElementById('reels');

        function updateDisplay() {
            balanceElement.textContent = balance;
            betElement.textContent = currentBet;
        }

        function populateReels() {
            reels.innerHTML = ''; // Clear existing reels
            for (let i = 0; i < 3; i++) { // Number of reels
                const reel = document.createElement('div');
                reel.className = 'reel';
                for (let j = 0; j < 5; j++) { // Number of symbols per reel
                    const randomImage = images[Math.floor(Math.random() * images.length)];
                    const imageElement = document.createElement('img');
                    imageElement.src = `${imageFolderPath}${randomImage}`;
                    imageElement.className = 'symbol';
                    reel.appendChild(imageElement);
                }
                reels.appendChild(reel);
            }
        }

        function spin() {
            populateReels();
            const reelElements = document.querySelectorAll('.reel');
            reelElements.forEach((reel, index) => {
                reel.style.transition = 'transform 2s ease-in-out';
                reel.style.transform = `translateY(-${200 * Math.floor(Math.random() * 5)}px)`; // Randomize position
            });
        }

        // Initialize
        updateDisplay();
        populateReels();
    </script>
</body>
</html>
