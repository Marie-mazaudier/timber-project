gsap.registerPlugin(ScrollTrigger);

const fadeInElements = document.querySelectorAll(".fade-in");

window.addEventListener("load", () => {
  console.log("GSAP chargé");

  const fadeInElements = document.querySelectorAll(".fade-in");
  fadeInElements.forEach((el) => {
    gsap.to(el, {
      opacity: 1,
      y: 0,
      duration: 1.3,
      ease: "power2.out",
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
        toggleActions: "play none none none",
      },
      onStart: () => el.classList.remove("fade-in"), // Enlève la classe après déclenchement
    });
  });
});
