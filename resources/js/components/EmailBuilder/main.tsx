import React, { useEffect } from 'react';
import ReactDOM from 'react-dom/client';

import { CssBaseline, ThemeProvider } from '@mui/material';

import App from './App';
import theme from './theme';

import { renderToStaticMarkup } from '@usewaypoint/email-builder';
import { useDocument } from './documents/editor/EditorContext';

function Main() {
  const document = useDocument();

  useEffect(() => {
    const logCode = () => {
      const code = renderToStaticMarkup(document, { rootBlockId: 'root' });
      console.log(code);
    };

    logCode(); // Log immediately
    const interval = setInterval(logCode, 5000);

    return () => clearInterval(interval);
  }, [document]);

  return (
    <React.StrictMode>
      <ThemeProvider theme={theme}>
        <CssBaseline />
        <App />
      </ThemeProvider>
    </React.StrictMode>
  );
}

ReactDOM.createRoot(document.getElementById('email-builder-react')!).render(<Main />);