import React from 'react';
import ReactDOM from 'react-dom';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';

ReactDOM.render(
  <React.StrictMode>
    <div className="contenaireModules">
      <ListeChapitres />
      <Video />
    </div>
  </React.StrictMode>,
  document.getElementById('modules')
);
