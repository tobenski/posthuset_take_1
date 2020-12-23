const colors = require('@tailwindcss/ui/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/custom-forms'),
        ],
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            inset: {
                'screen-1/3': '33vh',
            },
            height: {
                'screen-1/3': '33vh',
                'screen-1/5': '20vh',
                'screen-1/10': '10vh',
                'screen-3/10': '30vh',
                'screen-7/10': '70vh',
                'screen-9/10': '90vh',
                'screen-2/12': '16.66666667vh',
                'screen-8/12': '66.66666667vh',
                'screen-10/12': '83.33333333vh',
            },
            maxWidth: {
                '1/4': '25%',
                '1/3': '33%',
                '1/2': '50%',
                '2/3': '66%',
                '3/4': '75%',
            },
            minHeight: {
                '1/4': '25%',
                '1/3': '33%',
                '1/2': '50%',
                '2/3': '66%',
                '3/4': '75%',
                '1/4-screen': '25vh',
                '1/3-screen': '33vh',
                '1/2-screen': '50vh',
                '2/3-screen': '66vh',
                '3/4-screen': '75vh',
                '7/10-screen': '70vh',
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
                'primary': {
                    'hover': colors.blue[700],
                    'default': colors.blue[500],
                },
                'menu': {
                    'hover': colors.green[700],
                    'default': '#3CB371',
                },
                'secondary': colors.gray,
                'danger': colors.red,
                'text': colors.white,
                'paper': colors.yellow[50],

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


};
