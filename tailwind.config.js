import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                principal: ['"Be Vietnam Pro"', "sans-serif"],
            },
            colors: {
                "azul" : "#384985",
                "bright-red": "hsl(12, 88%, 59%)",
                "dark-blue": "hsl(228, 39%, 23%)",
                "dark-grayish-blue": "hsl(227, 12%, 61%)",
                "very-dark-blue": "hsl(233, 12%, 13%)",
                "very-pale-red": "hsl(13, 100%, 96%)",
                "vary-light-gray": "hsl(0, 0%, 98%)",
            },

            backgroundImage: {
                "close-menu": "url('/images/icon-close.svg')",
                "open-menu": "url('/images/icon-hamburger.svg')",
            },
        },
    },

    plugins: [forms],
};
