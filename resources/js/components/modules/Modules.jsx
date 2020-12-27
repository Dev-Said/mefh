import React from 'react';
import ReactDOM from 'react-dom';
import ControlledAccordions from '../accordeon/Accordeon';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';

ReactDOM.render(
  <React.StrictMode>
    <div className="contenaireModules">
      <ControlledAccordions />
      <Video />
      <ListeChapitres />
    </div>
  </React.StrictMode>,
  document.getElementById('modules')
);
