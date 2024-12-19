import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'radial-erin': 'radial-gradient(circle 220px at center, #eea8e2, #FFFFFF)',
              },
        },
    },
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["[data-theme=light]"], // Ensure the theme key is correct
                    "base-100": "#E3E9F1", // Custom primary color
                },
            },
            "dark", // Ensure this is consistent with the default theme structure
        ],
        darkTheme: "dark", // Use "dark" as the included theme for dark mode
        base: true,
        styled: true,
        utils: true,
        prefix: "",
        logs: true,
        themeRoot: ":root",
    },

    plugins: [forms, require('daisyui')],
};
