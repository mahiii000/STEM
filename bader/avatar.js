document.addEventListener('DOMContentLoaded', () => {
  const avatarButtons = document.querySelectorAll('.avatar-option');
  const currentAvatar = document.getElementById('current-avatar-img');
  const confirmButton = document.getElementById('confirm-button');

  const defaultAvatar = currentAvatar.getAttribute('src');
  let previewAvatar = null;

  // Load saved avatar on load
  const savedAvatar = localStorage.getItem('selectedAvatar');
  if (savedAvatar) {
    currentAvatar.src = savedAvatar;
    highlightSelected(savedAvatar);
  } else {
    highlightSelected(defaultAvatar);
  }

  avatarButtons.forEach(button => {
    const img = button.querySelector('img');
    button.addEventListener('click', () => {
      previewAvatar = img.getAttribute('src');
      currentAvatar.src = previewAvatar;
      clearSelected();
      button.classList.add('selected');
    });
  });

  confirmButton.addEventListener('click', () => {
    if (previewAvatar) {
      localStorage.setItem('selectedAvatar', previewAvatar);
      alert("Avatar confirmed! ✅");
    } else {
      alert("Please select an avatar before confirming.");
    }
  });

  function clearSelected() {
    avatarButtons.forEach(btn => btn.classList.remove('selected'));
  }

  function highlightSelected(src) {
    avatarButtons.forEach(btn => {
      const img = btn.querySelector('img');
      if (img.getAttribute('src') === src) {
        btn.classList.add('selected');
      }
    });
  }
});
