import React, { useMemo } from 'react';

import { Stack, useTheme } from '@mui/material';

import { useInspectorDrawerOpen, useSamplesDrawerOpen } from '../documents/editor/EditorContext';

import InspectorDrawer, { INSPECTOR_DRAWER_WIDTH } from './InspectorDrawer';
import SamplesDrawer, { SAMPLES_DRAWER_WIDTH } from './SamplesDrawer';
import TemplatePanel from './TemplatePanel';

import { renderToStaticMarkup } from '@usewaypoint/email-builder';
import { useDocument } from '../documents/editor/EditorContext';

import { resetDocument } from '../documents/editor/EditorContext';
import validateJsonStringValue from './TemplatePanel/ImportJson/validateJsonStringValue';



function useDrawerTransition(cssProperty: 'margin-left' | 'margin-right', open: boolean) {
  const { transitions } = useTheme();
  return transitions.create(cssProperty, {
    easing: !open ? transitions.easing.sharp : transitions.easing.easeOut,
    duration: !open ? transitions.duration.leavingScreen : transitions.duration.enteringScreen,
  });
}


export default function App({name,type,value}) {
  const inspectorDrawerOpen = useInspectorDrawerOpen();
  const samplesDrawerOpen = useSamplesDrawerOpen();

  const marginLeftTransition = useDrawerTransition('margin-left', samplesDrawerOpen);
  const marginRightTransition = useDrawerTransition('margin-right', inspectorDrawerOpen);

  const document = useDocument();
  const code = renderToStaticMarkup(document, { rootBlockId: 'root' });
  const json = useMemo(() => JSON.stringify(document, null, '  '), [document]);

  useMemo(() => {
    if (value) {
      const { error, data } = validateJsonStringValue(value);
      if (error) {
        return;
      }
      if(data){
        resetDocument(data);

      }
    }
  }, []);

  return (
    <>
      <Stack direction="row">
       <Stack sx={{ flexGrow: 1 }}>
          <TemplatePanel />
        </Stack>
        <Stack>
          <InspectorDrawer />
          {type === 'html' && <input type="hidden" value={code} name={name ?? ''} />}
          {type === 'json' && <input type="hidden" value={json} name={name ?? ''} />}
          {type === 'both' && (
            <>
              <input type="hidden" value={code} name={`${name ?? ''}_html`} />
              <input type="hidden" value={json} name={`${name ?? ''}_json`} />
            </>
          )}
        </Stack>
      </Stack>
    </>
  );
}
