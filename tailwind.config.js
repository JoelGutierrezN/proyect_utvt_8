const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                Montserrat: ["Montserrat", "sans-serif"],
            },
            backgroundImage: {
                sanFrancisco: "url('~/img/sanFrancisco.jpg')",
                sanFranciscoDesktop: "url('~/img/sanFranciscoDesktop.jpg')",
                yosemite: "url('~/img/yosemite.jpg')",
                LA: "url('~/img/LA.jpg')",
                seattle: "url('~/img/seattle.jpg')",
                new_york: "url('~/img/new_york.jpg')",
                norway: "url('~/img/norway.jpg')",
                sydney: "url('~/img/sydney.jpg')",
                miami: "url('~/img/miami.jpg')",
                switzerland: "url('~/img/switzerland.jpg')",
                bali: "url('~/img/bali.jpg')",
                chicago: "url('~/img/chicago.jpg')",
                europe: "url('~/img/europe.jpg')",
                iceland: "url('~/img/iceland.jpg')",
            },
            backgroundColor: (theme) => ({
                ...theme("colors"),
                primary: "#CC2D4A",
                secondary: "#8Fa206",
                terciary: "#61AEC9",
            }),
            textColor: {
                primary: "#CC2D4A",
                secondary: "#8Fa206",
                terciary: "#61AEC9",
            },
        },
    },

    variants: {
        extend: {
            width: ["responsive", "hover", "focus"],
        },
    },

    plugins: [require("@tailwindcss/forms")({
        strategy: 'class',
      })],
};
