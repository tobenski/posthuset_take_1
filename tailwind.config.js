const colors = require('@tailwindcss/ui/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            maxWidth: {
                '1/4': '25%',
                '1/3': '33%',
                '1/2': '50%',
                '2/3': '66%',
                '3/4': '75%',
            },
            zIndex: {
                '1000': '1000',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                sche: ['Scheherazade', 'Roboto']
            },
            colors: {
                'navigation-bg': {
                    'light': colors.gray[100],
                    'default': colors.gray[400],
                    'dark': colors.gray[800],
                },
                'navigation-text': {
                    'light': colors.gray[900],
                    'default': colors.black,
                    'dark': colors.gray[100],
                },
                'home-box-text': {
                    'light': colors.white,
                    'default': colors.gray[200],
                    'dark': colors.gray[800],
                },
                'primary': colors.blue,
                'text': colors.white,

            },
            transitionDuration: {
                '0': '0ms',
                '400': '400ms',
                '600': '600ms',
                '800': '800ms',
                '900': '900ms',
                '1200': '1200ms',
                '1300': '1300ms',
                '1400': '1400ms',
                '1500': '1500ms',
                '1600': '1600ms',
                '1700': '1700ms',
                '1800': '1800ms',
                '1900': '1900ms',
                '2000': '2000ms',
                '2500': '2500ms',
                '3000': '3000ms',
                '3500': '3500ms',
                '4000': '4000ms',
                '4500': '4500ms',
                '5000': '5000ms',
                '7500': '7500ms',
                '10000': '10000ms',
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/forms'),
        ],
};
