<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>রেজিস্ট্রেশন সিস্টেম</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

        :root {
            --primary: #06b6d4;
            --primary-dark: #0891b2;
            --secondary: #8b5cf6;
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
            --dark: #0f172a;
            --darker: #020617;
            --card: #1e293b;
            --glass: rgba(255, 255, 255, 0.05);
            --border: rgba(255, 255, 255, 0.1);
            --text: #f1f5f9;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 50%, #1e293b 100%);
            color: var(--text);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.15;
            animation: float 20s infinite ease-in-out;
        }

        .bg-circle:nth-child(1) {
            width: 400px;
            height: 400px;
            background: var(--primary);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .bg-circle:nth-child(2) {
            width: 300px;
            height: 300px;
            background: var(--secondary);
            bottom: -50px;
            right: -50px;
            animation-delay: 7s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(50px, -50px) scale(1.1); }
            66% { transform: translate(-30px, 30px) scale(0.9); }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            position: relative;
            z-index: 1;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 50px;
            animation: slideDown 0.8s ease;
        }

        @keyframes slideDown {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .header h1 {
            font-size: 42px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .header p {
            color: var(--text-muted);
            font-size: 16px;
        }

        /* Card */
        .card {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            animation: fadeIn 0.8s ease;
            position: relative;
            overflow: hidden;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .card-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title::before {
            content: '📝';
            font-size: 28px;
        }

        /* Form */
        .form-group {
            margin-bottom: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 8px;
        }

        label .required {
            color: var(--error);
            margin-left: 4px;
        }

        input, textarea {
            width: 100%;
            padding: 14px 18px;
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 12px;
            color: var(--text);
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.1);
        }

        input::placeholder, textarea::placeholder {
            color: var(--text-muted);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Button */
        .btn-submit {
            width: 100%;
            padding: 16px 32px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(6, 182, 212, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .btn-submit.loading {
            pointer-events: none;
        }

        .btn-submit.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            right: 20px;
            margin-top: -10px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Alert */
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-top: 20px;
            display: none;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .alert.show {
            display: flex;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--success);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--error);
        }

        .alert::before {
            font-size: 20px;
        }

        .alert-success::before {
            content: '✅';
        }

        .alert-error::before {
            content: '❌';
        }

        /* Success Modal */
        .success-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            animation: fadeIn 0.3s ease;
        }

        .success-modal.show {
            display: flex;
        }

        .success-content {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 50px 40px;
            text-align: center;
            max-width: 500px;
            animation: popIn 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
        }

        @keyframes popIn {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--success), #059669);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            animation: bounce 0.6s ease;
        }

        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .success-content h3 {
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--text);
        }

        .success-content p {
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        .btn-close {
            padding: 12px 32px;
            background: var(--glass);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-close:hover {
            background: var(--border);
        }

        /* Input Validation */
        .input-error {
            border-color: var(--error) !important;
        }

        .error-message {
            color: var(--error);
            font-size: 13px;
            margin-top: 6px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 32px;
            }

            .card {
                padding: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .success-content {
                margin: 20px;
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
<div class="bg-animation">
    <div class="bg-circle"></div>
    <div class="bg-circle"></div>
</div>

<div class="container">
    <div class="header">
        <img src="https://edulife.agency/storage/loggo-agency-01.png" alt="t" height="70">
        <h1>🎯 রেজিস্ট্রেশন সিস্টেম</h1>
        <p>আপনার তথ্য দিয়ে রেজিস্টার করুন</p>
    </div>

    <div class="card">
        <h2 class="card-title">রেজিস্ট্রেশন ফর্ম</h2>

        <form id="regForm">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="name">পূর্ণ নাম <span class="required">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="আপনার পূর্ণ নাম লিখুন"
                    required
                >
                <div class="error-message" id="nameError">নাম আবশ্যক</div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="phone">ফোন নম্বর <span class="required">*</span></label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="01XXXXXXXXX"
                        required
                    >
                    <div class="error-message" id="phoneError">সঠিক ফোন নম্বর দিন</div>
                </div>

                <div class="form-group">
                    <label for="email">ইমেইল (ঐচ্ছিক)</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="example@mail.com"
                    >
                    <div class="error-message" id="emailError">সঠিক ইমেইল দিন</div>
                </div>
            </div>

            <div class="form-group">
                <label for="note">নোট / প্রতিষ্ঠান (ঐচ্ছিক)</label>
                <textarea
                    id="note"
                    name="note"
                    placeholder="অতিরিক্ত তথ্য (যদি থাকে)"
                ></textarea>
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">
                রেজিস্টার করুন
            </button>

            <div class="alert alert-success" id="successAlert">
                রেজিস্ট্রেশন সফল হয়েছে!
            </div>

            <div class="alert alert-error" id="errorAlert">
                সমস্যা হয়েছে, আবার চেষ্টা করুন
            </div>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="success-modal" id="successModal">
    <div class="success-content">
        <div class="success-icon">🎉</div>
        <h3>রেজিস্ট্রেশন সফল!</h3>
        <p>আপনার তথ্য সফলভাবে সংরক্ষণ করা হয়েছে</p>
        <button class="btn-close" onclick="closeModal()">ধন্যবাদ</button>
    </div>
</div>

<script>
    const form = document.getElementById('regForm');
    const submitBtn = document.getElementById('submitBtn');
    const successAlert = document.getElementById('successAlert');
    const errorAlert = document.getElementById('errorAlert');
    const successModal = document.getElementById('successModal');

    // Form validation
    function validateForm() {
        let isValid = true;

        // Name validation
        const name = document.getElementById('name');
        const nameError = document.getElementById('nameError');
        if (!name.value.trim()) {
            name.classList.add('input-error');
            nameError.classList.add('show');
            isValid = false;
        } else {
            name.classList.remove('input-error');
            nameError.classList.remove('show');
        }

        // Phone validation
        const phone = document.getElementById('phone');
        const phoneError = document.getElementById('phoneError');
        const phoneRegex = /^01[3-9]\d{8}$/;
        if (!phoneRegex.test(phone.value.trim())) {
            phone.classList.add('input-error');
            phoneError.classList.add('show');
            isValid = false;
        } else {
            phone.classList.remove('input-error');
            phoneError.classList.remove('show');
        }

        // Email validation (optional)
        const email = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        if (email.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value.trim())) {
                email.classList.add('input-error');
                emailError.classList.add('show');
                isValid = false;
            } else {
                email.classList.remove('input-error');
                emailError.classList.remove('show');
            }
        } else {
            email.classList.remove('input-error');
            emailError.classList.remove('show');
        }

        return isValid;
    }

    // Hide alerts
    function hideAlerts() {
        successAlert.classList.remove('show');
        errorAlert.classList.remove('show');
    }

    // Close modal
    function closeModal() {
        successModal.classList.remove('show');
    }

    // Form submit
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        hideAlerts();

        if (!validateForm()) {
            return;
        }

        submitBtn.classList.add('loading');
        submitBtn.textContent = 'অপেক্ষা করুন...';
        submitBtn.disabled = true;

        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('register.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token'),
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                successModal.classList.add('show');
                form.reset();
            } else {
                errorAlert.textContent = data.message || 'সমস্যা হয়েছে, আবার চেষ্টা করুন';
                errorAlert.classList.add('show');
            }
        } catch (error) {
            console.error('Error:', error);
            errorAlert.textContent = 'সার্ভার এরর! আবার চেষ্টা করুন';
            errorAlert.classList.add('show');
        } finally {
            submitBtn.classList.remove('loading');
            submitBtn.textContent = 'রেজিস্টার করুন';
            submitBtn.disabled = false;
        }
    });

    // Real-time validation
    document.getElementById('name').addEventListener('blur', validateForm);
    document.getElementById('phone').addEventListener('blur', validateForm);
    document.getElementById('email').addEventListener('blur', function() {
        if (this.value.trim()) {
            validateForm();
        }
    });

    // Close modal on outside click
    successModal.addEventListener('click', function(e) {
        if (e.target === successModal) {
            closeModal();
        }
    });
</script>
</body>
</html>
