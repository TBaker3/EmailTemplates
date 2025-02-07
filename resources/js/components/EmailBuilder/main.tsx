import React, { useEffect } from 'react';
import ReactDOM from 'react-dom/client';

import { CssBaseline, ThemeProvider } from '@mui/material';

import App from './App';
import theme from './theme';

function Main({name, type, value}) {
  return (
    <React.StrictMode>
      <ThemeProvider theme={theme}>
        <CssBaseline />
        <App name={name ?? ''} type={type} value={value} />
      </ThemeProvider>
    </React.StrictMode>
  );
}
// get the name 
const name = document.getElementById('email-builder-react')?.getAttribute('name') ?? 'email-builder-react';
const type = document.getElementById('email-builder-react')?.getAttribute('type') ?? 'json';
const value = document.getElementById('email-builder-react')?.getAttribute('value') ?? '';
ReactDOM.createRoot(document.getElementById('email-builder-react')!).render(<Main name={name} type={type} value={value} />);
document.getElementById('email-builder-react')?.removeAttribute('name');
