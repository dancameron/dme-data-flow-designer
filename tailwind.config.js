const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: ['index.html', './src/**/*.{js,jsx,ts,tsx,vue,html}'],
    theme: {
        fontFamily: {
            'sans': ['Work Sans', ...defaultTheme.fontFamily.sans],
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            green: colors.green,
            red: colors.red,
            indigo: colors.indigo,
            brand: {
                DEFAULT: '#05a2a0',
                'light': '#06bbb8',
                'dark': '#048a87'
            }
        },
        extend: {},
    },
    plugins: [],
}
