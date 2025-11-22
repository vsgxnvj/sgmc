<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Hayahay Top-up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-weight: 600;
            font-size: 1.2rem;
            color: #1877f2;
        }

        .card-select {
            border-radius: 8px;
            padding: 1rem;
            cursor: pointer;
            transition: 0.3s;
            border: 1px solid transparent;
            text-align: center;
            background: #fff;
        }

        .card-select:hover {
            border: 1px solid #1877f2;
            background: #e7f0ff;
        }

        .card-selected {
            border: 1px solid #1877f2;
            background: #e7f0ff;
        }

        .payment-box i {
            font-size: 2.5rem;
            color: #1877f2;
        }

        .progress-step {
            text-align: center;
            font-size: 0.85rem;
            color: #555;
        }

        .progress-step i {
            font-size: 1.2rem;
            margin-bottom: 4px;
            color: #1877f2;
        }

        .qr-box {
            width: 220px;
            height: 220px;
            border: 1px solid #ddd;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
        }

        #uploadPreview img {
            max-width: 180px;
            max-height: 180px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #1877f2;
            border-color: #1877f2;
        }

        .btn-primary:hover {
            background-color: #145dbf;
            border-color: #145dbf;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="card-header text-center mb-4">
                            <i class="fas fa-wallet me-2"></i>Top-up / Payment — Team Hayahay
                        </div>

                        <!-- Progress -->
                        <div id="stepProgress" class="mb-4">
                            <div class="progress mb-2" style="height:10px; border-radius:5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width:20%"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="progress-step"><i class="fas fa-gamepad"></i>
                                    <div>Game</div>
                                </div>
                                <div class="progress-step"><i class="fas fa-user"></i>
                                    <div>Username</div>
                                </div>
                                <div class="progress-step"><i class="fas fa-credit-card"></i>
                                    <div>Payment</div>
                                </div>
                                <div class="progress-step"><i class="fas fa-money-bill-wave"></i>
                                    <div>Amount</div>
                                </div>
                                <div class="progress-step"><i class="fas fa-check-circle"></i>
                                    <div>Confirm</div>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel -->
                        <div id="flowCarousel" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                            <div class="carousel-inner">

                                <!-- Step 1: Choose Game -->
                                <div class="carousel-item active" data-step="1">
                                    <h5 class="mb-3 fw-semibold">1 — Choose Game</h5>
                                    <div class="row g-3">
                                        <div class="col-6 col-md-3">
                                            <div class="card-select" data-game="Game A">
                                                <i class="fas fa-dice fa-2x mb-2"></i>
                                                <div class="fw-semibold">Game A</div>
                                                <small class="text-muted">Fast rounds</small>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="card-select" data-game="Game B">
                                                <i class="fas fa-chess fa-2x mb-2"></i>
                                                <div class="fw-semibold">Game B</div>
                                                <small class="text-muted">Classic strategy</small>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="card-select" data-game="Game C">
                                                <i class="fas fa-trophy fa-2x mb-2"></i>
                                                <div class="fw-semibold">Game C</div>
                                                <small class="text-muted">Tournament</small>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="card-select" data-game="Game D">
                                                <i class="fas fa-star fa-2x mb-2"></i>
                                                <div class="fw-semibold">Game D</div>
                                                <small class="text-muted">New release</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-end">
                                        <button class="btn btn-primary" id="toStep2"><i
                                                class="fas fa-arrow-right me-1"></i>Next</button>
                                    </div>
                                </div>

                                <!-- Step 2: Username -->
                                <div class="carousel-item" data-step="2">
                                    <h5 class="mb-3 fw-semibold">2 — Enter Username (Team Hayahay)</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input id="usernameInput" type="text" class="form-control"
                                                placeholder="Enter username">
                                        </div>
                                        <div class="form-text text-muted">We will verify this username is registered
                                            under Team Hayahay.</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex gap-2 mb-3">
                                                <button id="verifyBtn" class="btn btn-outline-primary"><i
                                                        class="fas fa-check me-1"></i>Verify Username</button>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div id="usernameFeedback" style="display:none;">
                                                <div class="alert" role="alert" id="usernameFeedbackMsg"></div>
                                            </div>

                                            <div id="contactRegisterBox" style="display:none;">
                                                <a href="mailto:support@teamhayahay.com" class="btn btn-warning"><i
                                                        class="fas fa-envelope me-1 "></i>Contact Us</a>
                                            </div>


                                        </div>
                                    </div>







                                    <div class="mt-4 d-flex justify-content-between">
                                        <button class="btn btn-secondary prevBtn"><i
                                                class="fas fa-arrow-left me-1"></i>Back</button>
                                        <button class="btn btn-primary" id="toStep3"><i
                                                class="fas fa-arrow-right me-1"></i>Next</button>
                                    </div>
                                </div>

                                <!-- Step 3: Payment -->
                                <div class="carousel-item" data-step="3">
                                    <h5 class="mb-3 fw-semibold">3 — Choose Mode of Payment</h5>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="card-select payment-box p-3 text-center" data-pay="gcash">
                                                <i class="fas fa-mobile-alt mb-2"></i>
                                                <div class="fw-semibold">GCASH</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card-select payment-box p-3 text-center" data-pay="paymaya">
                                                <i class="fas fa-wallet mb-2"></i>
                                                <div class="fw-semibold">PAYMAYA</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card-select payment-box p-3 text-center" data-pay="bank">
                                                <i class="fas fa-university mb-2"></i>
                                                <div class="fw-semibold">BANK TRANSFER</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-between">
                                        <button class="btn btn-secondary prevBtn"><i
                                                class="fas fa-arrow-left me-1"></i>Back</button>
                                        <button class="btn btn-primary" id="toStep4"><i
                                                class="fas fa-arrow-right me-1"></i>Next</button>
                                    </div>
                                </div>

                                <!-- Step 4: Amount -->
                                <div class="carousel-item" data-step="4">
                                    <h5 class="mb-3 fw-semibold">4 — Add Amount</h5>
                                    <div class="mb-3">
                                        <label class="form-label">Amount (PHP)</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i
                                                    class="fas fa-money-bill-wave"></i></span>
                                            <input id="amountInput" type="number" min="1"
                                                class="form-control" placeholder="Enter amount">
                                        </div>
                                        <div class="form-text text-muted">Minimum is 1 PHP</div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button class="btn btn-secondary prevBtn"><i
                                                class="fas fa-arrow-left me-1"></i>Back</button>
                                        <button class="btn btn-primary" id="toStep5"><i
                                                class="fas fa-arrow-right me-1"></i>Next</button>
                                    </div>
                                </div>

                                <!-- Step 5: Confirm -->
                                <div class="carousel-item" data-step="5">
                                    <h5 class="mb-3 fw-semibold">5 — Payment & Confirm</h5>
                                    <div class="d-flex flex-wrap gap-4 mb-3">
                                        <div class="qr-box" id="qrContainer">
                                            <div id="qrPlaceholder" class="text-center text-muted">
                                                <i class="fas fa-qrcode fa-2x"></i><br>QR will appear here
                                            </div>
                                        </div>

                                        <div class="flex-grow-1">
                                            <div class="mb-3">
                                                <label class="form-label">Account / Number</label>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div id="acctNumber" class="fw-bold">—</div>
                                                    <button id="copyAcct" class="btn btn-outline-secondary btn-sm"><i
                                                            class="fas fa-copy me-1"></i>Copy</button>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Upload Payment Screenshot</label>
                                                <input id="fileUpload" type="file" class="form-control"
                                                    accept="image/*" required>
                                                <div id="uploadPreview" class="mt-2"></div>
                                            </div>

                                            <small class="text-muted">Double-check all information before
                                                submitting.</small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button class="btn btn-secondary prevBtn"><i
                                                class="fas fa-arrow-left me-1"></i>Back</button>
                                        <button id="submitBtn" class="btn btn-success"><i
                                                class="fas fa-paper-plane me-1"></i>Submit Payment</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <p class="mt-3 text-center text-muted small">Demo verification allows any username containing
                    "teamhayahay".</p>

            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Your JS here (your previous payment flow JS) -->




    <script>
        const state = {
            selectedGame: null,
            username: '',
            usernameVerified: false,
            selectedPayment: null,
            amount: null,
            uploadedFile: null
        };

        const carouselEl = document.getElementById('flowCarousel');
        const carousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, {
            interval: false,
            ride: false
        });

        function updateProgress(step) {
            const pct = (step - 1) * 25;
            const bar = document.querySelector('#stepProgress .progress-bar');
            bar.style.width = Math.max(5, pct + 20) + '%';
            bar.setAttribute('aria-valuenow', Math.min(100, pct + 20));
        }

        function goToStep(n) {
            if (n < 1 || n > 5) return;
            carousel.to(n - 1);
            updateProgress(n);
        }

        // Step 1
        document.querySelectorAll('.card-select[data-game]').forEach(el => {
            el.addEventListener('click', () => {
                document.querySelectorAll('.card-select[data-game]').forEach(x => x.classList.remove(
                    'card-selected'));
                el.classList.add('card-selected');
                state.selectedGame = el.getAttribute('data-game');
            });
        });

        document.getElementById('toStep2').addEventListener('click', () => {
            if (!state.selectedGame) {
                alert('Please choose a game first.');
                return;
            }
            goToStep(2);
        });

        // Step 2: username demo verification
        const usernameInput = document.getElementById('usernameInput');
        const toStep3Btn = document.getElementById('toStep3');
        const contactBox = document.getElementById('contactRegisterBox');

        toStep3Btn.disabled = true;

        document.getElementById('verifyBtn').addEventListener('click', () => verifyUsername());

        document.getElementById('toStep3').addEventListener('click', () => {
            if (!state.usernameVerified) {
                alert('Please verify your username first.');
                return;
            }
            goToStep(3);
        });

        function showUsernameFeedback(message, type = 'info') {
            const fb = document.getElementById('usernameFeedback');
            const msg = document.getElementById('usernameFeedbackMsg');

            msg.textContent = message;
            msg.className = 'alert alert-' + (type === 'danger' ? 'danger' : (type === 'success' ? 'success' : 'info'));
            fb.style.display = 'block';

            if (type === 'danger') {
                contactBox.style.display = 'block';
                toStep3Btn.disabled = true;
            } else {
                contactBox.style.display = 'none';
                toStep3Btn.disabled = false;
            }
        }

        async function verifyUsername() {
            const val = usernameInput.value.trim();
            state.username = val;
            state.usernameVerified = false;

            if (!val) {
                showUsernameFeedback('Enter a username to verify.', 'danger');
                return;
            }

            showUsernameFeedback('Verifying username…', 'info');

            // Demo logic
            if (val.toLowerCase().includes('teamhayahay')) {
                state.usernameVerified = true;
                showUsernameFeedback('Username verified successfully (demo).', 'success');
            } else {
                state.usernameVerified = false;
                showUsernameFeedback('Username not registered under Team Hayahay. Please contact us.', 'danger');
            }
        }

        usernameInput.addEventListener('keypress', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                verifyUsername();
            }
        });

        // Step 3: Payment select
        document.querySelectorAll('.payment-box').forEach(el => {
            el.addEventListener('click', () => {
                document.querySelectorAll('.payment-box').forEach(x => x.classList.remove('card-selected'));
                el.classList.add('card-selected');
                state.selectedPayment = el.getAttribute('data-pay');
                populatePaymentDetails(state.selectedPayment);
            });
        });

        document.getElementById('toStep4').addEventListener('click', () => {
            if (!state.selectedPayment) {
                alert('Choose a payment method first.');
                return;
            }
            goToStep(4);
        });

        // Step 4
        document.getElementById('toStep5').addEventListener('click', () => {
            const val = Number(document.getElementById('amountInput').value);
            if (!val || val <= 0) {
                alert('Enter a valid amount.');
                return;
            }
            state.amount = val;
            populatePaymentDetails(state.selectedPayment);
            goToStep(5);
        });

        // Step 5
        document.getElementById('fileUpload').addEventListener('change', e => {
            const file = e.target.files[0];
            state.uploadedFile = file || null;
            const preview = document.getElementById('uploadPreview');
            preview.innerHTML = '';
            if (file && file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.style.maxWidth = '160px';
                img.style.maxHeight = '160px';
                img.className = 'rounded border';
                img.src = URL.createObjectURL(file);
                preview.appendChild(img);
            } else if (file) {
                preview.innerText = 'File selected: ' + file.name;
            }
        });

        document.getElementById('copyAcct').addEventListener('click', () => {
            const acct = document.getElementById('acctNumber').textContent.trim();
            if (!acct || acct === '—') return alert('No account number to copy.');
            navigator.clipboard.writeText(acct).then(() => {
                alert('Account number copied.');
            });
        });

        document.getElementById('submitBtn').addEventListener('click', () => {
            // Check username verification
            if (!state.usernameVerified) {
                if (!confirm('Username not verified. Submit anyway?')) return;
            }

            // Check payment method and amount
            if (!state.selectedPayment || !state.amount) {
                alert('Missing payment method or amount.');
                return;
            }

            // Check if receipt file is uploaded
            if (!state.uploadedFile) {
                alert('Please upload a receipt before submitting.');
                return;
            }

            const formData = new FormData();
            formData.append('game', state.selectedGame || '');
            formData.append('username', state.username || usernameInput.value.trim());
            formData.append('payment', state.selectedPayment);
            formData.append('amount', state.amount);
            formData.append('receipt', state.uploadedFile);

            setTimeout(() => {
                alert('Payment submitted (demo):\nGame: ' + state.selectedGame + '\nUser: ' + (state
                        .username || usernameInput.value.trim()) + '\nPayment: ' + state
                    .selectedPayment + '\nAmount: PHP ' + state.amount);
                window.location.reload();
            }, 450);
        });


        function populatePaymentDetails(pay) {
            const qrContainer = document.getElementById('qrContainer');
            const acct = document.getElementById('acctNumber');
            const qrPlaceholder = document.getElementById('qrPlaceholder');

            if (!pay) {
                qrPlaceholder.textContent = 'QR will appear here';
                acct.textContent = '—';
                return;
            }

            if (pay === 'gcash') {
                qrContainer.innerHTML = '<img src="https://via.placeholder.com/200?text=GCash+QR" style="max-width:100%">';
                acct.textContent = '0999-123-4567';
            } else if (pay === 'paymaya') {
                qrContainer.innerHTML =
                    '<img src="https://via.placeholder.com/200?text=PayMaya+QR" style="max-width:100%">';
                acct.textContent = '0917-555-8888';
            } else if (pay === 'bank') {
                qrContainer.innerHTML = '<img src="https://via.placeholder.com/200?text=Bank+QR" style="max-width:100%">';
                acct.textContent = 'BDO 0123-4567-890 (Ephesians O.M.)';
            } else {
                qrPlaceholder.textContent = 'QR will appear here';
                acct.textContent = '—';
            }
        }

        // Prev buttons
        document.querySelectorAll('.prevBtn').forEach(b => b.addEventListener('click', () => carousel.prev()));

        // Initialize
        updateProgress(1);
        populatePaymentDetails(null);
    </script>

</body>

</html>
