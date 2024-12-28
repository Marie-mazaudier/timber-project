/** @type {import('tailwindcss').Config} */
/** @type {import('tailwindcss').Config} */
const safelist = require("./safelist.json");
module.exports = {
  content: [
    "./templates/**/*.twig",
    "./**/*.php",
    "!./node_modules/**/*",
    "!./vendor/**/*",
  ],
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
        lightBg: "#F2F3F5",
        white: "#FFFFFF",
      },
      safelist: safelist,
    },
  },
  variants: {
    extend: {
      backgroundColor: ["hover", "focus"],
    },
  },
  plugins: [require("tailwindcss"), require("autoprefixer")],
};
