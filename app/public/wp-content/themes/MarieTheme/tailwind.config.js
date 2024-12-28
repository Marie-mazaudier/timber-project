/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./templates/**/*.twig", // Tous les fichiers Twig dans templates
    "./**/*.php", // Tous les fichiers PHP dans ton thème
    "./*.php", // Fichiers PHP dans le dossier racine (comme functions.php)
  ],
  safelist: ["top-0", "bg-black"], // Ajoute les classes nécessaires ici

  theme: {
    extend: {
      fontFamily: {
        oswald: ["Oswald", "sans-serif"],
        poppins: ["Poppins", "sans-serif"],
      },
      screens: {
        mobile: "640px",
        tablet: "1024px",
        laptop: "1280px",
        desktop: "1536px",
      },
      colors: {
        primary: "#1F487C",
        secondary: "#FF0000",
        base: "#0A003F",
        lightBg: "#F2F3F5", // Nom utilisé : lightBg
        white: "#FFFFFF",
      },
      safelist: [
        {
          pattern: /bg-\[url\(.*\)\]/,
        },
      ],
    },
  },
  plugins: [require("tailwindcss"), require("autoprefixer")],
};
