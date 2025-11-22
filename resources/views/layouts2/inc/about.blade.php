<div class="container">
    <div class="row">
        <div class="col-lg-6">
            {{-- Latest Withdrawals --}}
            <div class="container mt-5">
                <h4 class="text-info fw-bold mb-3">LATEST WITHDRAWALS</h4>
                <div class="cashout-scroll">
                    <ul class="cashout-list">
                        @php
                            $names = [
                                'John',
                                'Mark',
                                'Ken',
                                'Ralph',
                                'Mico',
                                'Allen',
                                'James',
                                'Bryan',
                                'Carlo',
                                'Evan',
                                'Jayson',
                                'Liam',
                                'Noah',
                                'Zeke',
                                'Renz',
                                'Aldrin',
                            ];
                            function maskName($name)
                            {
                                $len = strlen($name);
                                return $len <= 2
                                    ? $name
                                    : substr($name, 0, 1) . str_repeat('*', $len - 2) . substr($name, -1);
                            }
                        @endphp

                        @for ($i = 0; $i < 100; $i++)
                            @php
                                $name = $names[array_rand($names)];
                                $masked = maskName($name);
                                $amount = rand(100, 5000);
                                $timestamp = strtotime('-' . rand(0, 7) . ' days');
                                $date = date('M d, Y', $timestamp);
                            @endphp
                            <li>
                                <span class="user">{{ $masked }}</span>
                                <span class="amount">₱{{ number_format($amount) }}</span>
                                <span class="date">{{ $date }}</span>
                                <a href="{{ asset('images/team-hayahay-logo-2.png') }}" data-lightbox="recibos"
                                    class="recibo-btn">View Payout</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <section class="about-section my-5 py-5 text-center">
                <div class="container">
                    <img src="{{ asset('images/team-hayahay-logo-1.png') }}" alt="Team Hayahay Logo"
                        class="about-logo mb-4">
                    <h3 class="about-title">Who We Are</h3>
                    <p class="about-text mt-3">
                        <strong>TEAM HAYAHAY</strong> is a well-established and active gaming support group in the
                        Philippines dedicated
                        to providing a smooth, honest, and reliable service experience to online players. We assist
                        thousands of
                        gamers nationwide by offering fast and secure <span class="highlight">cash-in</span> and
                        <span class="highlight">withdrawal</span> services for multiple gaming platforms.
                    </p>
                    <hr class="about-divider my-4">
                    <h4 class="about-subtitle">Our Mission</h4>
                    <p class="about-text">
                        To serve the gaming community with <span class="highlight">reliable service</span>,
                        <span class="highlight">secure transactions</span>, and <span class="highlight">responsible
                            support</span>.
                    </p>
                    <h4 class="about-subtitle mt-4">Our Vision</h4>
                    <p class="about-text">
                        To be recognized as one of the most <span class="highlight">trusted</span>, <span
                            class="highlight">consistent</span>,
                        and <span class="highlight">player-first</span> gaming communities in the country.
                    </p>
                    <h4 class="about-subtitle mt-4">Core Values</h4>
                    <ul class="about-values mt-3">
                        <li>⚡ Fast & Reliable Transactions</li>
                        <li>🤝 Respect and Professional Support</li>
                        <li>🔒 Secure and Confidential</li>
                        <li>🎮 Community and Fun</li>
                    </ul>
                    <a href="https://m.me/651565208039176" target="_blank" class="about-contact-btn mt-4">Contact
                        Support</a>
                </div>
            </section>
        </div>

    </div>

</div>
