// Wait for the HTML document to be fully loaded and parsed
document.addEventListener('DOMContentLoaded', () => {

  // ===================================================================
  // 1. DATA: The "Single Source of Truth" for our page
  // All dynamic content is driven by this object.
  // ===================================================================
  const userProfile = {
    name: "Phillip",
    grade: "5th Grade",
    streak: {
      current: 5,
      longest: 5,
      // Represents Mon-Sun. true = active, false = inactive.
      days: [true, true, true, true, true, false, false],
      hasSaver: false
    },
    achievements: [
      { name: "Scholarship Badge", imgUrl: "images/image.png" },
      { name: "Coding Whiz Badge", imgUrl: "images/badge2.png" },
      { name: "Science Pro Badge", imgUrl: "images/badge3.png" },
      { name: "Perfect Attendance Badge", imgUrl: "images/badge4.png" }
    ],
    courses: [
      { title: "Beginner's Guide to Frontend", status: "Complete" },
      { title: "Advanced CSS", status: "Complete" },
      { title: "Intro to JavaScript", status: "In Progress" }
    ],
    certificates: [
      { title: "Introduction To HTML", imgUrl: "images/Rectangle 192.png" },
      { title: "Introduction To CSS", imgUrl: "images/Rectangle 193.png" },
      { title: "Introduction To Science", imgUrl: "images/Rectangle 194.png" }
    ]
  };

  // ===================================================================
  // 2. DOM ELEMENT SELECTORS: Get references to all interactive parts
  // ===================================================================
  const profileCard = document.querySelector('.profile-card');
  const editButton = document.querySelector('.edit-button');
  const badgeContainer = document.querySelector('.badge-container');
  const dailyStreakTracker = document.querySelector('.daily-streak-tracker');
  const currentStreakValue = document.querySelector('.streak-stats-container .stat-box:nth-child(1) .stat-value');
  const longestStreakValue = document.querySelector('.streak-stats-container .stat-box:nth-child(2) .stat-value');
  const streakSaverBox = document.querySelector('.stat-box.buy-saver');
  const courseList = document.querySelector('.course-progress-card .item-list');
  const certificateList = document.querySelector('.certificates-card .item-list');

  let isEditing = false; // State to track if we are in "edit mode"

  // ===================================================================
  // 3. RENDER FUNCTIONS: Functions that update the HTML
  // ===================================================================

  /** Renders the user's name and grade, or input fields if editing */
  function renderProfileInfo() {
    // Clear existing content
    profileCard.querySelector('.profile-name').remove();
    profileCard.querySelector('.profile-grade').remove();
    
    if (isEditing) {
      // Create input fields for editing
      const nameInput = document.createElement('input');
      nameInput.type = 'text';
      nameInput.className = 'profile-name-input';
      nameInput.value = userProfile.name;
      
      const gradeInput = document.createElement('input');
      gradeInput.type = 'text';
      gradeInput.className = 'profile-grade-input';
      gradeInput.value = userProfile.grade;

      // Add inputs after the avatar
      profileCard.querySelector('.profile-avatar').after(gradeInput);
      profileCard.querySelector('.profile-avatar').after(nameInput);
      
      editButton.textContent = 'Save';
    } else {
      // Create static elements for viewing
      const nameEl = document.createElement('h2');
      nameEl.className = 'profile-name';
      nameEl.textContent = userProfile.name;

      const gradeEl = document.createElement('p');
      gradeEl.className = 'profile-grade';
      gradeEl.textContent = userProfile.grade;

      // Add elements after the avatar
      profileCard.querySelector('.profile-avatar').after(gradeEl);
      profileCard.querySelector('.profile-avatar').after(nameEl);
      
      editButton.textContent = 'Edit';
    }
  }

  /** Renders the achievement badges */
  function renderAchievements() {
    badgeContainer.innerHTML = ''; // Clear old badges
    userProfile.achievements.forEach(badge => {
      const img = document.createElement('img');
      img.src = badge.imgUrl;
      img.alt = badge.name;
      img.className = 'badge-image';
      badgeContainer.appendChild(img);
    });
  }
  
  /** Renders the daily streak icons and stat boxes */
  function renderStreak() {
    // Daily icons
    const dayItems = dailyStreakTracker.querySelectorAll('.day-item i');
    userProfile.streak.days.forEach((isActive, index) => {
      dayItems[index].classList.toggle('active', isActive);
      dayItems[index].classList.toggle('inactive', !isActive);
    });
    
    // Stat boxes
    currentStreakValue.innerHTML = `<i class="fa-solid fa-fire active"></i> ${userProfile.streak.current} Days`;
    longestStreakValue.innerHTML = `<i class="fa-solid fa-fire active"></i> ${userProfile.streak.longest} Days`;
    
    // Streak saver
    const saverValue = streakSaverBox.querySelector('.stat-value');
    if (userProfile.streak.hasSaver) {
      saverValue.innerHTML = `<i class="fa-solid fa-shield-halved"></i> Active`;
      streakSaverBox.style.cursor = 'default';
    } else {
      saverValue.innerHTML = `<i class="fa-solid fa-shield-halved"></i> Buy`;
      streakSaverBox.style.cursor = 'pointer';
    }
  }
  
  /** Renders the list of courses and their progress */
  function renderCourses() {
    courseList.innerHTML = ''; // Clear old list
    userProfile.courses.forEach(course => {
      const statusColor = course.status === 'Complete' ? 'green' : 'red';
      const li = document.createElement('li');
      li.className = 'course-item';
      li.innerHTML = `
        <div class="status-circle color-${statusColor}"></div>
        <div class="course-details">
          <p class="item-title">${course.title}</p>
          <p class="item-status">${course.status}</p>
        </div>
      `;
      courseList.appendChild(li);
    });
  }
  
  /** Renders the list of earned certificates */
  function renderCertificates() {
    certificateList.innerHTML = ''; // Clear old list
    userProfile.certificates.forEach(cert => {
      const li = document.createElement('li');
      li.className = 'certificate-item';
      li.innerHTML = `
        <img src="${cert.imgUrl}" alt="${cert.title} Certificate" class="certificate-img"/>
        <p class="item-title">${cert.title}</p>
      `;
      certificateList.appendChild(li);
    });
  }


  // ===================================================================
  // 4. EVENT HANDLERS: Functions that respond to user actions
  // ===================================================================
  
  function handleEditClick() {
    if (isEditing) {
      // If we were editing, now we save the data
      const nameInput = profileCard.querySelector('.profile-name-input');
      const gradeInput = profileCard.querySelector('.profile-grade-input');
      
      // Update the data object
      userProfile.name = nameInput.value;
      userProfile.grade = gradeInput.value;
    }
    
    // Toggle the editing state
    isEditing = !isEditing;
    
    // Re-render the profile section to show the changes
    renderProfileInfo();
  }
  
  function handleBuySaverClick() {
    if (userProfile.streak.hasSaver) {
      alert("You already have a Streak Saver!");
      return;
    }
    
    if (confirm("Would you like to buy a Streak Saver?")) {
      userProfile.streak.hasSaver = true;
      alert("Streak Saver purchased!");
      // Re-render the streak section to show the new state
      renderStreak();
    }
  }


  // ===================================================================
  // 5. INITIALIZATION: Set up event listeners and render the page
  // ===================================================================
  
  editButton.addEventListener('click', handleEditClick);
  streakSaverBox.addEventListener('click', handleBuySaverClick);
  
  // A function to render everything on the page from our data object
  function renderAll() {
    renderProfileInfo();
    renderAchievements();
    renderStreak();
    renderCourses();
    renderCertificates();
  }
  
  // Initial render when the page loads
  renderAll();
  
});