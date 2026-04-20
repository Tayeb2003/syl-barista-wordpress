(function () {
  "use strict";

  var sections = document.querySelectorAll(".reveal-on-scroll");
  if (!sections.length) {
    return;
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2, rootMargin: "0px 0px -10% 0px" }
  );

  sections.forEach(function (section) {
    observer.observe(section);
  });
})();
