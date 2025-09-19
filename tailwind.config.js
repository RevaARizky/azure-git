/**
 * Container Plugin - modifies Tailwind’s default container.
 */
const containerStyles = ({ addComponents }) => {
  const containerBase = {
    maxWidth: '100%',
    marginLeft: 'auto',
    marginRight: 'auto',
    paddingLeft: '30px',
    paddingRight: '30px',
    '@screen lg': {
      paddingLeft: '40px',
      paddingRight: '40px'
    },
    '@screen 2xl': {
      paddingLeft: '75px',
      paddingRight: '75px'
    }
  };

  addComponents({
    '.container': {
      ...containerBase,
      '@screen xl': {
        width: '100%',
        maxWidth: '1400px',
        paddingLeft: '3.75rem',
        paddingRight: '3.75rem',
      }
    },
    '.container-fluid': {
      ...containerBase,
      '@screen lg': {
        paddingLeft: '45px',
        paddingRight: '45px'
      }
    },
  });
}

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './footer.php',
    './header.php',
    './index.php',
    './single.php',
    './single-post.php',
    './parts/**/*.php',
    './parts/*.php',
    './blocks/**/*.php',
    './src/scss/**/*.scss',
    './src/js/**/*.js',
    './template-parts/*.php'
    // './src/js/*.js',
  ],
  safelist: [
    'text-center',
    {
      pattern: /^text-theme-(yellow|navy|blue|white|beach|light-(gray|grey)|gray|grey|green|orange|red|soft-(grey|gray))$/,
    },
    {
      pattern: /^text-(headline|h1|h2|h3|body|small|button|quote)$/,
    },
    {
      pattern: /col-start-./,
      variants: ['md']
    }
  ],
  theme: {
    container: {
      center: true,
    },
    // fontSize: {
    //   '5xl': '2.75rem'
    // },
    fontFamily: {
      sans: ['"Aspekta"', 'sans-serif'],
    },
    extend: {
      inset: {
        'unset': 'unset'
      },
      screens: {
        lg: "1025px",
        mobile: {max: '768px'}
      },
      zIndex: {
        header: 999
      },
      colors: {
        'theme-yellow': '#FFBE0B',
        'theme-navy': '#0F1C2E',
        'theme-blue': '#164371',
        'theme-white': '#F8F9FA',
        'theme-beach': '#F5F3EE',
        'theme-light-gray': '#D6DBDF',
        'theme-light-grey': '#D6DBDF',
        'theme-gray': '#7B8A8B',
        'theme-grey': '#7B8A8B',
        'theme-green': '#16A085',
        'theme-orange': '#FDAF35',
        'theme-red': '#C0392B',
        'theme-soft-grey': '#4A4A4A',
        'theme-soft-gray': '#4A4A4A',
        'theme-soft-black': '#2E2E2E',
        'theme-soft-dark-grey': 'rgba(74,74,74,.4)',
        'theme-soft-dark-gray': 'rgba(74,74,74,.4)'
      },
      fontSize: {
        'extra-headline': '68px',
        'headline': '56px',
        'h1': '40px',
        'h2': '32px',
        'h3': '24px',
        'body': '16px',
        'small': '14px',
        'button': '18px',
        'quote': '20px',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    containerStyles,
  ],
  corePlugins: {
    // preflight: false
  }
  // important: true,
}