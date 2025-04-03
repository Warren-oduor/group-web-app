document.addEventListener('DOMContentLoaded', function() {
  const loginTab = document.getElementById('login-tab');
  const signupTab = document.getElementById('signup-tab');
  const loginFormContainer = document.getElementById('login-form'); // Div
  const signupFormContainer = document.getElementById('signup-form'); // Div
  const signupForm = document.getElementById('signup-form-element'); // Actual form

  function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
  }

  function doPasswordsMatch(password, confirmPassword) {
    return password === confirmPassword;
  }

  function showError(input, message) {
    removeError(input);
    const errorElement = document.createElement('span');
    errorElement.classList.add('error-message');
    errorElement.style.color = '#e74c3c';
    errorElement.style.fontSize = '0.9em';
    errorElement.textContent = message;
    input.parentElement.appendChild(errorElement);
    input.classList.add('error');
  }

  function removeError(input) {
    const errorElement = input.parentElement.querySelector('.error-message');
    if (errorElement) {
      errorElement.remove();
    }
    input.classList.remove('error');
  }

  function clearForm(formContainer) {
    formContainer.querySelectorAll('.error-message').forEach(error => error.remove());
    formContainer.querySelectorAll('input:not([type="checkbox"])').forEach(input => (input.value = ''));
    formContainer.querySelectorAll('input[type="checkbox"]').forEach(input => (input.checked = false));
  }

  // Signup form submission
  signupForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const nameInput = document.getElementById('signup-name');
    const emailInput = document.getElementById('signup-email');
    const passwordInput = document.getElementById('signup-password');
    const confirmInput = document.getElementById('signup-confirm');
    const termsInput = document.getElementById('terms');

    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();
    const confirmPassword = confirmInput.value.trim();
    const termsAccepted = termsInput.checked;

    removeError(nameInput);
    removeError(emailInput);
    removeError(passwordInput);
    removeError(confirmInput);
    removeError(termsInput);

    let valid = true;

    if (!name || name.length < 2) {
      showError(nameInput, 'Full name too short, bruh!');
      valid = false;
    }

    if (!email || !isValidEmail(email)) {
      showError(emailInput, 'Email ain’t right, fix it!');
      valid = false;
    }

    if (!password || password.length < 6) {
      showError(passwordInput, 'Password needs 6+ characters, yo!');
      valid = false;
    }

    if (!confirmPassword) {
      showError(confirmInput, 'Confirm that password, fam!');
      valid = false;
    } else if (!doPasswordsMatch(password, confirmPassword)) {
      showError(confirmInput, 'Passwords don’t match, check it!');
      valid = false;
    }

    if (!termsAccepted) {
      showError(termsInput, 'Gotta agree to the terms, my dude!');
      valid = false;
    }

    if (valid) {
      console.log('Signup attempt:', { name, email, password, termsAccepted });
      signupForm.submit();
    } else {
      console.log('Validation failed, fam!');
    }
  });

  // Tab switching
  function switchTab(activeTab, inactiveTab, activeFormContainer, inactiveFormContainer) {
    activeTab.classList.add('active');
    inactiveTab.classList.remove('active');
    activeFormContainer.classList.add('active');
    inactiveFormContainer.classList.remove('active');
    clearForm(inactiveFormContainer);
  }

  loginTab.addEventListener('click', function() {
    console.log('Login tab clicked'); // Debug
    switchTab(loginTab, signupTab, loginFormContainer, signupFormContainer);
  });

  signupTab.addEventListener('click', function() {
    console.log('Signup tab clicked'); // Debug
    switchTab(signupTab, loginTab, signupFormContainer, loginFormContainer);
  });
});