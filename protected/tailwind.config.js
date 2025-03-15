/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./views/**/*.{html,js,php}", "./components/**/*.php"],
    darkMode: 'selector',
    theme: {
      extend: {
        transitionDuration: {
          0: "0ms",
          2000: "2000ms",
          4000: "4000ms",
        },
      },
    },
    plugins: [],
  }