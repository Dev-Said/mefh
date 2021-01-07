import React from 'react';
import ReactDOM from 'react-dom';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';
import { Provider } from 'react-redux';
import store from '../redux/store';


ReactDOM.render(
  <Provider store={store}>
    {/* <React.StrictMode> */}
      <div className="contenaireModules">
        <ListeChapitres />
        <Video />
      </div>
    {/* </React.StrictMode> */}
  </Provider>,
  document.getElementById('modules')
);
