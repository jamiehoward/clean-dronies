const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
        extend: {
            fontFamily: {
                sans: ['IBM Plex Sans', ...defaultTheme.fontFamily.sans],
                serif: ['VT323', ...defaultTheme.fontFamily.serif],
                mono: ['IBM Plex Mono', ...defaultTheme.fontFamily.serif],
            },
            keyframes: {
                'fade-in-down': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                }
            },
            animation: {
                'fade-in-down': 'fade-in-down 1s ease-out',
                'bounce-in-right': 'bounce-in-right 1s ease-out',
            }
        },
    },
    variants: {},
    plugins: [],
}