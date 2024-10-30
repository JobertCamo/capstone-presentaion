/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/wireui/wireui/src/*.php",
    "./vendor/wireui/wireui/ts/**/*.ts",
    "./vendor/wireui/wireui/src/WireUi/**/*.php",
    "./vendor/wireui/wireui/src/Components/**/*.php",
        ],
    theme: {
    extend: {
        fontFamily: {
        'roboto-slab': ['"Roboto Slab"', 'serif'],
        'roboto': ['"Roboto"', 'sans-serif'],
        },
        colors:{
        'navcolor':'#161925',
        'lb':'#235789',
        'db':'#161925',
        'cb':'#CBCBCB',
        },
        backgroundImage: {
            'custom-gradient': 'linear-gradient(to right, #FF6B6D, #FF9A6B, #FFFA5F, #74FF5C)',
        },
    },
    },

    presets: [
    require("./vendor/wireui/wireui/tailwind.config.js")
    ],

    plugins: [],
}
