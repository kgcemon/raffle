<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>লটারি ড্র সিস্টেম</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap');

        :root {
            --primary: #ff6b35;
            --secondary: #f7931e;
            --dark: #1a1a2e;
            --darker: #0f0f1e;
            --accent: #00d4ff;
            --gold: #ffd700;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: var(--accent);
            border-radius: 50%;
            opacity: 0.3;
            animation: float 15s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0) scale(1); }
            33% { transform: translateY(-100px) translateX(50px) scale(1.2); }
            66% { transform: translateY(-50px) translateX(-50px) scale(0.8); }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            position: relative;
            z-index: 1;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            animation: slideDown 0.8s ease;
        }

        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .header h1 {
            font-size: 48px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(255, 107, 53, 0.3);
            margin-bottom: 10px;
        }

        .header p {
            font-size: 18px;
            color: #aaa;
        }

        .drum-container {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .drum-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 107, 53, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .drum-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }

        .participants-count {
            font-size: 24px;
            font-weight: 700;
            color: var(--accent);
        }

        .draw-button {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            padding: 18px 40px;
            font-size: 20px;
            font-weight: 700;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .draw-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .draw-button:hover::before {
            width: 300px;
            height: 300px;
        }

        .draw-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.6);
        }

        .draw-button:active {
            transform: translateY(0);
        }

        .draw-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .names-display {
            position: relative;
            height: 400px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
        }

        .names-viewport {
            position: absolute;
            width: 100%;
            transition: transform 0.1s ease-out;
        }

        .name-item {
            padding: 20px 40px;
            margin: 8px 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
            border-radius: 15px;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .name-item.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-color: var(--gold);
            transform: scale(1.1);
            box-shadow: 0 0 40px rgba(255, 107, 53, 0.8), 0 0 80px rgba(255, 107, 53, 0.4);
            font-size: 32px;
            font-weight: 900;
            color: #fff;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
        }

        .winner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .winner-content {
            text-align: center;
            animation: zoomIn 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        @keyframes zoomIn {
            from { transform: scale(0); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .countdown {
            font-size: 120px;
            font-weight: 900;
            color: var(--gold);
            text-shadow: 0 0 50px var(--gold);
            animation: pulse 1s ease infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .winner-announcement {
            margin-top: 40px;
        }

        .winner-title {
            font-size: 48px;
            color: var(--accent);
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .winner-name {
            font-size: 80px;
            font-weight: 900;
            background: linear-gradient(90deg, var(--gold), #ffed4e, var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 2s ease-in-out infinite;
            text-shadow: 0 0 80px rgba(255, 215, 0, 0.8);
        }

        @keyframes shimmer {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: var(--gold);
            position: absolute;
            animation: confettiFall 3s ease-out forwards;
        }

        @keyframes confettiFall {
            to {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        .participants-table {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .table-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--accent);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(247, 147, 30, 0.2));
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #ddd;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        tbody tr.eliminated {
            opacity: 0.3;
            text-decoration: line-through;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-active {
            background: rgba(0, 212, 255, 0.2);
            color: var(--accent);
        }

        .status-winner {
            background: rgba(255, 215, 0, 0.2);
            color: var(--gold);
        }

        .loading {
            text-align: center;
            padding: 40px;
            font-size: 24px;
            color: var(--accent);
        }
    </style>
</head>
<body>
<div class="particles" id="particles"></div>

<div class="container">
    <div class="header">
        <h1>🎰 লটারি ড্র সিস্টেম</h1>
        <p>লটারি ড্র অভিজ্ঞতা</p>
    </div>

    <div class="drum-container">
        <div class="drum-header">
            <div class="participants-count">
                অংশগ্রহণকারী: <span id="activeCount">0</span>/<span id="totalCount">0</span>
            </div>
            <button class="draw-button" id="drawButton">
                🎲 লটারি ড্র করুন
            </button>
        </div>

        <div class="names-display" id="namesDisplay">
            <div class="names-viewport" id="namesViewport">
                <div class="loading">লোড হচ্ছে...</div>
            </div>
        </div>
    </div>

    <div class="participants-table">
        <div class="table-title">📋 অংশগ্রহণকারীদের তালিকা</div>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>নাম</th>
                <th>ফোন</th>
                <th>ইমেইল</th>
                <th>স্ট্যাটাস</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            <tr><td colspan="5" class="loading">লোড হচ্ছে...</td></tr>
            </tbody>
        </table>
    </div>
</div>

<div class="winner-overlay" id="winnerOverlay">
    <div class="winner-content">
        <div class="countdown" id="countdown">3</div>
        <div class="winner-announcement" id="winnerAnnouncement" style="display: none;">
            <div class="winner-title">🎉 বিজয়ী 🎉</div>
            <div class="winner-name" id="winnerName"></div>
        </div>
    </div>
</div>

<audio id="drumRollSound" src="https://cdn.freesound.org/previews/171/171671_2437358-lq.mp3" preload="auto"></audio>
<audio id="winnerSound" src="https://cdn.freesound.org/previews/270/270319_5123851-lq.mp3" preload="auto"></audio>
<audio id="tickSound" src="https://cdn.freesound.org/previews/341/341695_5858296-lq.mp3" preload="auto"></audio>

<script>
    let participants = [];
    let activeParticipants = [];
    let winners = [];
    let isDrawing = false;

    const drawButton = document.getElementById('drawButton');
    const namesViewport = document.getElementById('namesViewport');
    const tableBody = document.getElementById('tableBody');
    const winnerOverlay = document.getElementById('winnerOverlay');
    const countdown = document.getElementById('countdown');
    const winnerAnnouncement = document.getElementById('winnerAnnouncement');
    const winnerName = document.getElementById('winnerName');
    const activeCount = document.getElementById('activeCount');
    const totalCount = document.getElementById('totalCount');

    const drumRollSound = document.getElementById('drumRollSound');
    const winnerSound = document.getElementById('winnerSound');
    const tickSound = document.getElementById('tickSound');

    async function init() {
        createParticles();
        await loadParticipants();
    }

    function createParticles() {
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.width = Math.random() * 10 + 5 + 'px';
            particle.style.height = particle.style.width;
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.animationDuration = Math.random() * 10 + 10 + 's';
            particlesContainer.appendChild(particle);
        }
    }

    async function loadParticipants() {
        try {
            const response = await fetch("{{ route('register.list') }}");
            const data = await response.json();

            if (data.registrations && data.registrations.length > 0) {
                participants = data.registrations;
                activeParticipants = [...participants];
                renderNamesDisplay();
                renderTable();
                updateCounts();
            } else {
                namesViewport.innerHTML = '<div class="loading">কোনো অংশগ্রহণকারী পাওয়া যায়নি!</div>';
                tableBody.innerHTML = '<tr><td colspan="5" class="loading">কোনো ডাটা নেই</td></tr>';
                drawButton.disabled = true;
            }
        } catch (error) {
            console.error('Error loading participants:', error);
            namesViewport.innerHTML = '<div class="loading">ডাটা লোড করতে সমস্যা হয়েছে!</div>';
            tableBody.innerHTML = '<tr><td colspan="5" class="loading">ত্রুটি ঘটেছে</td></tr>';
            drawButton.disabled = true;
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function renderNamesDisplay() {
        namesViewport.innerHTML = '';
        activeParticipants.forEach((p, i) => {
            const div = document.createElement('div');
            div.className = 'name-item';
            div.textContent = p.name;
            div.dataset.index = i;
            namesViewport.appendChild(div);
        });
    }

    function renderTable() {
        tableBody.innerHTML = '';
        participants.forEach((p, i) => {
            const isWinner = winners.includes(p);
            const isActive = activeParticipants.includes(p);
            const tr = document.createElement('tr');
            if (!isActive) tr.classList.add('eliminated');

            tr.innerHTML = `
                    <td>${i + 1}</td>
                    <td>${escapeHtml(p.name)}</td>
                    <td>${escapeHtml(p.phone)}</td>
                    <td>${escapeHtml(p.email || '')}</td>
                    <td><span class="status-badge ${isWinner ? 'status-winner' : 'status-active'}">${isWinner ? '🏆 বিজয়ী' : isActive ? '✓ সক্রিয়' : '✗ বাছাই হয়েছে'}</span></td>
                `;
            tableBody.appendChild(tr);
        });
    }

    function updateCounts() {
        activeCount.textContent = activeParticipants.length;
        totalCount.textContent = participants.length;
    }

    async function animateScroll() {
        const items = Array.from(namesViewport.children);
        const totalItems = items.length;
        let speed = 50;
        let iterations = 0;
        const maxIterations = 50;

        drumRollSound.currentTime = 0;
        drumRollSound.play();

        while (iterations < maxIterations) {
            const randomIndex = Math.floor(Math.random() * totalItems);

            items.forEach(item => item.classList.remove('active'));
            items[randomIndex].classList.add('active');

            const itemHeight = items[randomIndex].offsetHeight + 16;
            const containerHeight = 400;
            const offset = randomIndex * itemHeight - (containerHeight / 2) + (itemHeight / 2);
            namesViewport.style.transform = `translateY(-${offset}px)`;

            tickSound.currentTime = 0;
            tickSound.play();

            await sleep(speed);
            speed += 3;
            iterations++;
        }

        drumRollSound.pause();
        return items.find(item => item.classList.contains('active'));
    }

    async function showCountdown() {
        countdown.style.display = 'block';
        winnerAnnouncement.style.display = 'none';

        for (let i = 3; i > 0; i--) {
            countdown.textContent = i;
            tickSound.currentTime = 0;
            tickSound.play();
            await sleep(1000);
        }

        countdown.style.display = 'none';
    }

    function createConfetti() {
        for (let i = 0; i < 100; i++) {
            setTimeout(() => {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.top = -10 + 'px';
                confetti.style.background = ['#ff6b35', '#f7931e', '#00d4ff', '#ffd700'][Math.floor(Math.random() * 4)];
                confetti.style.animationDelay = Math.random() * 0.5 + 's';
                document.body.appendChild(confetti);

                setTimeout(() => confetti.remove(), 3000);
            }, i * 30);
        }
    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function performDraw() {
        if (isDrawing || activeParticipants.length === 0) {
            alert('আর কোনো অংশগ্রহণকারী নেই!');
            return;
        }

        isDrawing = true;
        drawButton.disabled = true;

        const winnerItem = await animateScroll();
        const winnerIndex = parseInt(winnerItem.dataset.index);
        const winner = activeParticipants[winnerIndex];

        winnerOverlay.style.display = 'flex';
        await showCountdown();

        winnerName.textContent = winner.name;
        winnerAnnouncement.style.display = 'block';
        winnerSound.play();
        createConfetti();

        await sleep(5000);

        winnerOverlay.style.display = 'none';

        winners.push(winner);
        activeParticipants.splice(winnerIndex, 1);

        renderNamesDisplay();
        renderTable();
        updateCounts();

        isDrawing = false;
        drawButton.disabled = false;

        if (activeParticipants.length === 0) {
            alert('🎉 সকল অংশগ্রহণকারীর ড্র সম্পন্ন হয়েছে!');
            drawButton.disabled = true;
        }
    }

    drawButton.addEventListener('click', performDraw);

    init();
</script>
</body>
</html>
