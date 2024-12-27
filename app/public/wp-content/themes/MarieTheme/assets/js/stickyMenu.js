window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const offset = 100; // Décalage avant activation du sticky
  if (window.scrollY > offset) {
    header.classList.add("shadow-lg", "sticky-on");
  } else {
    header.classList.remove("shadow-lg", "sticky-on");
  }
});
