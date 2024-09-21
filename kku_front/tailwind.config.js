/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                Kanit: "Kanit",
            },
            screens: {
                ss: "360px",
                se: "375px",
                es: "412px",
                bm: "429px",
                xs: "480px",
                ex: "540px",
                xx: "820px",
                dm: "912px",
                yu: "1025px",
                uy: "1400px",
                yy: "1600px",
                uu: "1921px",
            },
        },
    },
    plugins: [],
};
