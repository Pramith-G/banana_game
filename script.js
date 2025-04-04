let score = 0;
let gameCount = 0;
let timeLeft = 600;
const scoreDisplay = document.getElementById('score');
const timerDisplay = document.getElementById('timer');
const img = document.getElementById('bananaImage');
const options = document.getElementById('options');
const timeoutBox = document.getElementById("timeoutBox");

function loadGame() {
    fetch('https://marcconrad.com/uob/banana/api.php')
        .then(res => res.json())
        .then(data => {
            img.src = data.question;
            options.innerHTML = ''; // Clear old buttons

            for (let i = 1; i <= 9; i++) {
                const btn = document.createElement('button');
                btn.innerText = i;
                btn.classList.add('option-btn'); // Add styling
                
                btn.onclick = function () {
                    disableButtons();  // Prevent multiple clicks
                    
                    if (i == data.solution) {
                        this.style.backgroundColor = "green"; 
                        this.style.color = "white";
                        score++;
                    } else {
                        this.style.backgroundColor = "red"; 
                        this.style.color = "white";
                    }

                    scoreDisplay.innerText = 'Score: ' + score;
                    gameCount++;

                    if (gameCount >= 3) {
                        clearInterval(timerInterval);
                        saveScore();
                        showTimeoutMessage();
                    } else {
                        setTimeout(loadGame, 1000);
                    }
                };

                options.appendChild(btn);
            }
        })
        .catch(error => console.error("Error loading game:", error));
}

function disableButtons() {
    document.querySelectorAll('.option-btn').forEach(button => {
        button.disabled = true;
    });
}

function saveScore() {
    fetch('save_score.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'score=' + score
    });
}

function updateTimer() {
    timeLeft--;
    timerDisplay.textContent = `Time: ${timeLeft}`;
    if (timeLeft < 20) {
        timerDisplay.style.backgroundColor = "red";
        timerDisplay.style.color = "white";
    }
    if (timeLeft === 0) {
        clearInterval(timerInterval);
        saveScore();
        showTimeoutMessage();
    }
}

function showTimeoutMessage() {
    timeoutBox.style.display = "block";
}

function closeTimeoutBox() {
    timeoutBox.style.display = "none";
    window.location.href = 'home.php';
}

let timerInterval = setInterval(updateTimer, 1000);
window.onload = loadGame;
