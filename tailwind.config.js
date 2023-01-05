const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            "slg-blue": "#003876",
            "slg-red": "#c12e1a",
            "bg-transparent": "#transparent",
            white: "#ffffff",
            black: "#000000",
            card: "#00244d",
            shadow: "#000c1a",
            button: "#b42b18",
            positive: "#0077ff",
            "b-positive": "#006be6",
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
