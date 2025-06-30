document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.profile-form');

    // Password & Confirm Password
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');

    const passwordValidationIcon = passwordInput.closest('.input-wrapper').querySelector('.validation-icon');
    const confirmPasswordValidationIcon = confirmPasswordInput.closest('.input-wrapper').querySelector('.validation-icon');

    // Password Visibility Toggle (if icons added)
    const setupToggleVisibility = (inputId, toggleId) => {
        const input = document.getElementById(inputId);
        const toggle = document.getElementById(toggleId);
        if (toggle) {
            toggle.addEventListener('click', () => {
                input.type = input.type === 'password' ? 'text' : 'password';
            });
        }
    };

    // Show or hide validation icon
    const toggleValidation = (icon, show) => {
        icon.style.display = show ? 'block' : 'none';
    };

    passwordInput.addEventListener('input', () => {
        const isValid = passwordInput.value.length >= 8;
        toggleValidation(passwordValidationIcon, isValid);

        const match = confirmPasswordInput.value === passwordInput.value && confirmPasswordInput.value !== '';
        toggleValidation(confirmPasswordValidationIcon, match);
    });

    confirmPasswordInput.addEventListener('input', () => {
        const match = confirmPasswordInput.value === passwordInput.value && confirmPasswordInput.value !== '';
        toggleValidation(confirmPasswordValidationIcon, match);
    });

    setupToggleVisibility('password', 'toggle-password-icon');
    setupToggleVisibility('confirm-password', 'toggle-confirm-password-icon');

    // Emirate to Area mapping
    
    const emirateSelect = document.getElementById('emirate');
    const areaSelect = document.getElementById('area');

    emirateSelect.addEventListener('change', () => {
        const selected = emirateSelect.value;
        areaSelect.innerHTML = '<option value="">-Select Area</option>';

        if (selected && emirateAreaMap[selected]) {
            emirateAreaMap[selected].forEach(area => {
                const option = document.createElement('option');
                option.value = area;
                option.textContent = area;
                areaSelect.appendChild(option);
            });
        }
    });

    // Handle form submission
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Profile saved successfully!');
        // You can add real submission logic here (AJAX or form POST)
    });
});
