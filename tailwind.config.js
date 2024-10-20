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
                sans: ['Noto Sans JP', ...defaultTheme.fontFamily.sans],
            },
            width: {
                '128': '32rem',
                '144': '36rem',
                '160': '40rem',
                '176': '44rem',
                '192': '48rem',
                '208': '52rem',
            },
            borderWidth: {
                '12': '12px',
                '16': '16px',
                '24': '24px',
                '32': '32px',
                '40': '40px',
                '48': '48px',
                '56': '56px',
                '64': '64px',
                '72': '72px',
                '80': '80px',
                '88': '88px',
                '96': '96px',
            },
            colors: {
                'custom-blue': '#dbeefd',
                'custom-blue2': '#ACDFFF',
                'custom-yellow': '#FFD690',
            },
            backgroundImage: {
                'custom-gradient': 'linear-gradient(transparent 70%, #fff77c 30%)',
                'custom-gradient2': 'linear-gradient(transparent 70%, #ACDFFF 30%)',
            },
            transitionDuration: {
                '2000': '2000ms',
                '3000': '3000ms',
            },
            gridTemplateColumns: {
                '18': 'repeat(18, minmax(0, 1fr))', // grid-cols-18
            }
        },
    },

    plugins: [forms],
};
