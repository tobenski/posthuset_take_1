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
            zIndex: {
                '1000': '1000',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
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
                }
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
