<!DOCTYPE html>
<html>
<head>
    <title>Slot Machine Boilerplate</title>
    <style>
        /* Center everything */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: url('{{ asset('Slot-images/5c89a2aeda44a59a73aff718e95206d2.jpg') }}') center/cover no-repeat;
        }

        /* Main container - ADD YOUR BACKGROUND IMAGE HERE */
        .slot-machine {
            width: 800px;
            height: 600px;
            background: #1a1a1a  center/cover; /* REPLACE WITH YOUR IMAGE PATH */
            border-radius: 10px;
            padding: 20px;
            font-family: Arial, sans-serif;
            position: relative;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        /* Transparent areas that will show the background image */
        .reels {
            background: rgba(31, 32, 35, 0.3); /* Adjust opacity (0.3) to make background more/less visible */
            height: 400px;
            border-radius: 5px;
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        /* Individual reel column */
        .reel {
            width: 120px;
            background: rgba(255, 255, 255, 0.1); /* Reel column background */
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        /* Control panel - transparent background */
        .controls {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.4); /* Control panel background opacity */
            padding: 10px;
            border-radius: 5px;
        }

        /* Rest of the CSS remains the same */
        .symbol {
            font-size: 40px;
            margin: 15px 0;
            color: white;
        }

        .balance {
            color: #fff;
            font-size: 24px;
        }

        .bet-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .spin-button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 24px;
            border-radius: 5px;
            cursor: pointer;
        }

        .bet-amount {
            color: #fff;
            font-size: 24px;
            margin-right: 20px;
        }

        button {
            background: #a40b0b;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Same HTML structure as before -->
    <div class="slot-machine">
        <div class="reels">
            <!-- Reel columns with symbols -->
        </div>
        <div class="controls">
            <!-- Balance and bet controls -->
        </div>
    </div>
</body>
</html>