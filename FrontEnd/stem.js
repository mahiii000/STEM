document.addEventListener('DOMContentLoaded', () => {
    // ====== 1. Add hover/stretch effect to nav icons ======
    const navIcons = document.querySelectorAll('.main-nav ul li a');
    navIcons.forEach((icon) => {
        icon.style.transition = 'transform 0.3s ease';
        icon.style.cursor = 'pointer';
        icon.addEventListener('mouseenter', () => {
            icon.style.transform = 'scale(1.1)';
        });
        icon.addEventListener('mouseleave', () => {
            icon.style.transform = 'scale(1)';
        });
    });

    // ====== 2. Stretch effect for the Edit button ======
    const editButton = document.querySelector('.edit-button');
    if (editButton) {
        editButton.style.transition = 'transform 0.3s ease';
        editButton.addEventListener('mouseenter', () => {
            editButton.style.transform = 'scale(1.05)';
        });
        editButton.addEventListener('mouseleave', () => {
            editButton.style.transform = 'scale(1)';
        });

        editButton.addEventListener('click', () => {
            alert('Edit button clicked! You can add profile editing features here.');
        });
    }

    // ====== 3. Make logo interactive (like a button) ======
    const logoImg = document.querySelector('.logo img');
    if (logoImg) {
        logoImg.style.cursor = 'pointer';
        logoImg.style.transition = 'transform 0.3s ease';
        logoImg.addEventListener('mouseenter', () => {
            logoImg.style.transform = 'scale(1.1)';
        });
        logoImg.addEventListener('mouseleave', () => {
            logoImg.style.transform = 'scale(1)';
        });

        logoImg.addEventListener('click', () => {
            alert('Logo clicked! You can link this to the homepage.');
        });
    }

    // ====== 4. Make the "500+" certificate a button with hover effect ======
    const certCount = document.querySelector('.purple-text');
    if (certCount) {
        certCount.style.cursor = 'pointer';
        certCount.style.backgroundColor = '#f3e8ff';
        certCount.style.padding = '5px 10px';
        certCount.style.borderRadius = '8px';
        certCount.style.transition = 'transform 0.3s ease, background-color 0.3s ease';

        certCount.addEventListener('mouseenter', () => {
            certCount.style.transform = 'scale(1.1)';
            certCount.style.backgroundColor = '#e9d5ff';
        });
        certCount.addEventListener('mouseleave', () => {
            certCount.style.transform = 'scale(1)';
            certCount.style.backgroundColor = '#f3e8ff';
        });

        certCount.addEventListener('click', () => {
            alert('Certificates clicked! You can show certificate details here.');
        });
    }

    // ====== 5. Badge click + hover effect (already done before) ======
    const badges = document.querySelectorAll('.badge-image');
    badges.forEach((badge) => {
        badge.style.cursor = 'pointer';
        badge.style.transition = 'transform 0.3s ease';

        badge.addEventListener('mouseenter', () => {
            badge.style.transform = 'scale(1.1)';
        });

        badge.addEventListener('mouseleave', () => {
            badge.style.transform = 'scale(1)';
        });

        badge.addEventListener('click', () => {
            alert(`You clicked on: ${badge.alt}`);
        });
    });

    // ====== 6. Avatar image fallback ======
    const avatarImg = document.querySelector('.Profile-avatar img');
    if (avatarImg) {
        avatarImg.onerror = function () {
            this.src = 'images/default-avatar.png'; // Fallback avatar image
        };
    }
});

document.addEventListener('DOMContentLoaded', () => {
  const trigger = document.querySelector('.custom-select-trigger');
  const options = document.querySelector('.custom-options');
  const selected = document.querySelector('.selected-code');
  const flag = trigger.querySelector('.flag-icon');

  trigger.addEventListener('click', () => {
    options.style.display = options.style.display === 'block' ? 'none' : 'block';
  });

  document.querySelectorAll('.custom-option').forEach(option => {
    option.addEventListener('click', () => {
      const code = option.getAttribute('data-value');
      const flagCode = option.getAttribute('data-flag');
      selected.textContent = code;
      flag.src = `https://flagcdn.com/${flagCode}.svg`;
      options.style.display = 'none';
    });
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', (e) => {
    if (!trigger.contains(e.target) && !options.contains(e.target)) {
      options.style.display = 'none';
    }
  });
});
