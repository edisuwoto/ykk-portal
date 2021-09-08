const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            backgroundColor: ['odd', 'even', 'active'],
            borderWidth: ['first', 'last', 'odd', 'even'],
            opacity: ['disabled'],
        },
        scrollbar: ['dark', 'rounded', 'hover'],
    },

    plugins: [
        require('tailwind-scrollbar'),
        require('@tailwindcss/forms'),
    ],
};
