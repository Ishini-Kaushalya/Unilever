const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                unilever: {
                    light: "#f3f0fb", // background
                    purple: "#4B0082", // brand purple
                    button: "#4B0082",
                    buttonHover: "#360061",
                },
            },
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
                brand: ["Poppins", "sans-serif"], // heading style
            },
            borderRadius: {
                "2xl": "1rem",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
