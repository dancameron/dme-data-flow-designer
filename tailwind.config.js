const colors = require('tailwindcss/colors')
module.exports = {
    content: ['index.html', './src/**/*.{js,jsx,ts,tsx,vue,html}'],
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            green: colors.green,
            red: colors.red,
            brand: {
                DEFAULT: '#06bbb8',
                'light': '#07d0cc',
                'dark': '#0b585e'
            },
        },
        extend: {},
    },
    plugins: [],
}
