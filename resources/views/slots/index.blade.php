<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestige Slot Machine</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2d2d2d;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('https://i.pinimg.com/originals/f7/8f/12/f78f12068d7da2698d75c2169c712f85.jpg');
            background-size: cover;
            background-position: center;
        }

        .slot-machine {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.6);
            text-align: center;
            width: 350px;
        }

        .title {
            font-size: 36px;
            font-weight: bold;
            color: #FFD700;
            margin-bottom: 30px;
        }

        .reels {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 30px;
        }

        .reel {
            width: 100px;
            height: 150px;
            background-color: #333;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            font-weight: bold;
            color: #fff;
            border: 3px solid #444;
            position: relative;
            overflow: hidden;
        }

        .reel div {
            position: absolute;
            top: 0;
            width: 100%;
            text-align: center;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            0% {
                top: 0;
            }

            100% {
                top: -500px;
            }
        }

        .button {
            background-color: #f39c12;
            color: white;
            padding: 15px 40px;
            font-size: 22px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #e67e22;
        }

        .message {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
            color: #e67e22;
        }

        .score {
            font-size: 28px;
            margin-top: 10px;
            color: #e67e22;
        }

        .spin-button {
            position: relative;
        }

        .message {
            font-size: 20px;
            color: #fff;
        }

        .reel div {
            font-family: 'Times New Roman', serif;
        }
    </style>
</head>

<body>
    <div class="slot-machine">
        <div class="title">Prestige Slot</div>
        <div class="reels">
            <div class="reel" id="reel1"></div>
            <div class="reel" id="reel2"></div>
            <div class="reel" id="reel3"></div>
        </div>
        <button class="button spin-button" onclick="spin()">Spin</button>
        <div class="message" id="message"></div>
        <div class="score" id="score">Score: 0</div>
    </div>

    <script>
        const symbols = ['🦁', '📜', '🐍', '💎', '🪙'];
        let score = 0;

        // Function to generate random symbols for reels
        function getRandomSymbols() {
            return [
                symbols[Math.floor(Math.random() * symbols.length)],
                symbols[Math.floor(Math.random() * symbols.length)],
                symbols[Math.floor(Math.random() * symbols.length)],
                symbols[Math.floor(Math.random() * symbols.length)],
                symbols[Math.floor(Math.random() * symbols.length)],
            ];
        }

        function spin() {
            const reel1 = document.getElementById('reel1');
            const reel2 = document.getElementById('reel2');
            const reel3 = document.getElementById('reel3');
            const message = document.getElementById('message');
            const scoreBoard = document.getElementById('score');

            // Generate random symbols for each reel
            const reelSymbols1 = getRandomSymbols();
            const reelSymbols2 = getRandomSymbols();
            const reelSymbols3 = getRandomSymbols();

            // Add symbols to reels
            reel1.innerHTML = reelSymbols1.map(symbol => `<div>${symbol}</div>`).join('');
            reel2.innerHTML = reelSymbols2.map(symbol => `<div>${symbol}</div>`).join('');
            reel3.innerHTML = reelSymbols3.map(symbol => `<div>${symbol}</div>`).join('');

            // Reset message
            message.textContent = '';

            // Check win condition after animation completes
            setTimeout(() => {
                // Check if all three reels have the same symbol on the first row
                if (reelSymbols1[0] === reelSymbols2[0] && reelSymbols1[0] === reelSymbols3[0]) {
                    message.textContent = 'You Win!';
                    score += 10; // Increase score for a win
                } else {
                    message.textContent = 'Try Again!';
                }

                // Update score
                scoreBoard.textContent = `Score: ${score}`;
            }, 1000); // Animation delay
        }
    </script>
</body>

</html>
