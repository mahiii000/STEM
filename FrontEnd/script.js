document.addEventListener('DOMContentLoaded', () => {
  // 🔗 Header Navigation — highlights current page, clicking icons transitions smoothly
  const curr = location.pathname.split('/').pop().replace('.html', '') || 'index';
  document.querySelectorAll('.icon-item').forEach(icon => {
    const page = icon.dataset.page;
    if (page === curr) icon.classList.add('active');
    icon.addEventListener('click', () => {
      if (page !== curr) window.location.href = `${page}.html`;
    });
  });

  // 📚 Learning cards link to Course Overview
  document.querySelectorAll('.learning-card').forEach(card => {
    card.style.cursor = 'pointer';
    card.addEventListener('click', () => window.location.href = 'course.html');
  });

  // 📰 Blog Page: "Start learning now" scrolls down
  const learnBtn = document.getElementById('learnBtn');
  learnBtn?.addEventListener('click', () => {
    document.getElementById('categories')?.scrollIntoView({ behavior: 'smooth' });
  });

  // 📖 Read more toggles in related blog cards
  document.querySelectorAll('.related-card a').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const ex = link.closest('.related-card').querySelector('.excerpt');
      ex.classList.toggle('expanded');
      link.textContent = ex.classList.contains('expanded') ? 'Read less' : 'Read more';
    });
  });

  // 📋 Teachers Table: live search & sort
  const tbody = document.querySelector('.teachers-table tbody');
  if (tbody) {
    const allRows = Array.from(tbody.rows);
    const searchInput = document.querySelector('.teachers-controls input');
    const sortSelect = document.querySelector('.teachers-controls select');

    const rerender = rows => {
      tbody.innerHTML = '';
      rows.forEach(r => tbody.appendChild(r));
    };

    searchInput?.addEventListener('input', () => {
      const q = searchInput.value.toLowerCase();
      rerender(
        allRows.filter(r => Array.from(r.cells).some(c => c.textContent.toLowerCase().includes(q)))
      );
    });

    sortSelect?.addEventListener('change', () => {
      const cols = ['name','subject','phone number','email','country','ratings'];
      const idx = cols.indexOf(sortSelect.value.toLowerCase());
      if (idx > -1) {
        rerender([...allRows].sort((a, b) =>
          a.cells[idx].textContent.localeCompare(b.cells[idx].textContent)
        ));
      }
    });
  }

  // 🎥 Course Page: load chosen lesson video
  window.loadLesson = function(lessonNum) {
    const vid = document.getElementById('mainVideo');
    const src = vid?.querySelector('source');
    document.querySelectorAll('.lesson-btn').forEach(btn => btn.classList.remove('selected'));
    document.querySelectorAll('.lesson-btn')[lessonNum - 1]?.classList.add('selected');
    if (vid && src) {
      src.src = `videos/lesson${lessonNum}.mp4`;
      vid.load();
      vid.play();
    }
  };

  // 🧱 Blog category filter placeholder
  window.filterBlogs = cat => {
    alert(`Filtering blogs for: ${cat}`);
    // Future: implement actual filtering
  };

  // 🧠 CONTINUE LEARNING Feature
  const continueSection = document.querySelector(".continue-learning");
  const continueGrid = document.getElementById("continue-grid");
  const lessonCards = document.querySelectorAll(".lessons .learning-card");

window.addToContinue = function (elem, event) {
  event?.stopPropagation(); // prevents the click from bubbling up to the card

  const card = elem.closest(".learning-card");
  const cardId = card.getAttribute("id");

  if (document.querySelector(`#continue-grid #${cardId}`)) return;

  const cloned = card.cloneNode(true);
  cloned.querySelector(".favorite").classList.add("liked");
  cloned.setAttribute("id", cardId);

  // Inject a progress bar (optional or default to 0%)
  const progress = document.createElement("div");
  progress.className = "progress-bar";
  progress.innerHTML = `<div class="progress" style="width: 0%;"></div>`;
  cloned.insertBefore(progress, cloned.querySelector(".card-footer"));

  document.getElementById("continue-grid").appendChild(cloned);
};

  // 🔽 LESSON SORTING BY TOPIC
  document.getElementById("lessons-sort-select")?.addEventListener("change", function (e) {
    const value = e.target.value;
    lessonCards.forEach(card => {
      const topic = card.getAttribute("data-topic");
      if (value === "ALL" || value === topic) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  });

});
