(function () {
    'use strict';

    const tabs = document.querySelectorAll('#authTabs button');
    const loginContainer = document.getElementById('loginFormContainer');
    const registerContainer = document.getElementById('registerFormContainer');
    const loginMsg = document.getElementById('messageBox');
    const regMsg = document.getElementById('registerMessageBox');

    tabs.forEach(btn => {
        btn.addEventListener('click', function () {
            tabs.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const isLogin = this.dataset.tab === 'login';
            loginContainer.style.display = isLogin ? 'block' : 'none';
            registerContainer.style.display = isLogin ? 'none' : 'block';
            loginMsg.className = 'message-box';
            loginMsg.textContent = '';
            regMsg.className = 'message-box';
            regMsg.textContent = '';
        });
    });

    function togglePassword(inputId, btnId) {
        const input = document.getElementById(inputId);
        const btn = document.getElementById(btnId);
        if (!input || !btn) return;
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            const icon = this.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-eye-slash');
                icon.classList.toggle('fa-eye');
            }
        });
    }
    togglePassword('password', 'togglePasswordBtn');
    togglePassword('regPassword', 'toggleRegPasswordBtn');

    function showMessage(el, text, type) {
        el.textContent = text;
        el.className = 'message-box show ' + type;
        if (type !== 'error') {
            setTimeout(() => el.classList.remove('show'), 4500);
        }
    }

    document.getElementById('loginForm').addEventListener('submit', function (e) {
        const email = document.getElementById('email').value.trim();
        const pass = document.getElementById('password').value.trim();
        if (!email || !pass) {
            e.preventDefault();
            showMessage(loginMsg, 'Please fill in all fields.', 'error');
            if (!email) document.getElementById('email').focus();
            else document.getElementById('password').focus();
        }
    });

    document.getElementById('forgotLink').addEventListener('click', function (e) {
        e.preventDefault();
        loginMsg.className = 'message-box';
        loginMsg.textContent = '';
        showMessage(loginMsg, 'Password reset link sent to your email.', 'info');
    });

    document.getElementById('registerForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const name = document.getElementById('regName').value.trim();
        const email = document.getElementById('regEmail').value.trim();
        const pass = document.getElementById('regPassword').value.trim();
        const confirm = document.getElementById('regConfirm').value.trim();

        regMsg.className = 'message-box';
        regMsg.textContent = '';

        if (!name || !email || !pass || !confirm) {
            showMessage(regMsg, 'All fields are required.', 'error');
            return;
        }
        if (pass.length < 4) {
            showMessage(regMsg, 'Password must be at least 4 characters.', 'error');
            return;
        }
        if (pass !== confirm) {
            showMessage(regMsg, 'Passwords do not match.', 'error');
            return;
        }
        // Pre-fill Sign In form with registered credentials
        const signInEmail = document.getElementById('email');
        if (signInEmail) {
            signInEmail.value = email;
        }
        const signInPass = document.getElementById('password');
        if (signInPass && pass) {
            signInPass.value = pass;
        }

        // Redirect to Sign In tab
        const loginTab = document.querySelector('#authTabs button[data-tab="login"]');
        if (loginTab) {
            loginTab.click();
        } else {
            loginContainer.style.display = 'block';
            registerContainer.style.display = 'none';
        }
    });

    window.addEventListener('load', function () {
        const email = document.getElementById('email');
        email.focus();
        if (email.value) email.setSelectionRange(0, email.value.length);
    });

    const animateElements = document.querySelectorAll('.animate-block');
    if (animateElements.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        });
        animateElements.forEach(el => observer.observe(el));
    }
})();