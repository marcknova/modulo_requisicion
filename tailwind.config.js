module.exports = {
  content: ["./src/**/*.{html,js,php}","./public/**/*.{html,js,php}", './public/index.html', './src/auxiliar.php', './src/idRecivido.php' ],
  theme: {
    extend: {
      width: {
        '53': '14rem',
        '3/11': '35%',
        '4/11':'40%',
        '5/11': '45%',
      },
      height: {
        '13': '4rem',
      },
      borderWidth: {
        '1': '1px',
      },
      backgroundImage: {
        'logo': "url('./public/img/logo.png')"
      },
      margin: {
        '0.9':'0.20',
      },
    },
  },
  plugins: [],
}