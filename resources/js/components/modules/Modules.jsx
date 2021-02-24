import React from 'react';
import ReactDOM from 'react-dom';
import Video from '../videos/Video';
import ListeChapitres from '../ListeChapitres/ListeChapitres';
import { Provider } from 'react-redux';
import store from '../redux/store';
import Stepper from '../stepper/stepper';

ReactDOM.render(
  <Provider store={store}>
    {/* <React.StrictMode> */}
    <div className="contenaireModules">
      <Stepper />
      <Video />
      <ListeChapitres />
    </div>
    {/* </React.StrictMode> */}
  </Provider>,
  document.getElementById('modules')
);
