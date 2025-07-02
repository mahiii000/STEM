document.addEventListener("DOMContentLoaded", () => {
  // Smooth scrolling for nav links
  const navLinks = document.querySelectorAll(".help-nav a");

  navLinks.forEach(link => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const targetId = link.getAttribute("href").substring(1);
      const target = document.getElementById(targetId);

      window.scrollTo({
        top: target.offsetTop - 20,
        behavior: "smooth"
      });
    });
  });

  // Fade-in sections when scrolling
  const sections = document.querySelectorAll("section");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      }
    });
  }, {
    threshold: 0.1
  });

  sections.forEach(section => {
    observer.observe(section);
  });

  // Highlight nav button for active section
  window.addEventListener("scroll", () => {
    let scrollPos = window.scrollY + 100;

    sections.forEach(section => {
      if (scrollPos >= section.offsetTop &&
          scrollPos < section.offsetTop + section.offsetHeight) {
        navLinks.forEach(link => {
          link.classList.remove("active");
          if (link.getAttribute("href").substring(1) === section.id) {
            link.classList.add("active");
          }
        });
      }
    });
  });
});
