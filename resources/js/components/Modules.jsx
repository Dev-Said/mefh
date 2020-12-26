import React from 'react';
import ReactDOM from 'react-dom';
import ControlledAccordions from './Accordeon';
import Video from './Video';
// import './modules.css'

ReactDOM.render(
  <React.StrictMode>
    <div className="contenaireModules">
      <ControlledAccordions />
      <Video />
    </div>
  </React.StrictMode>,
  document.getElementById('modules')
);
