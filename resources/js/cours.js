import React from 'react';
import ReactDOM from 'react-dom';
import Video from './components/videos/Video';
import ListeChapitres from './components/ListeChapitres/ListeChapitres';
import { Provider } from 'react-redux';
import store from './components/redux/store';
import Stepper from './components/stepper/stepper';
import ChapitreDescription from './components/stepper/chapitreDescription';
import ContainedButtons from './components/coursCompleted/coursCompleted';

ReactDOM.render(
  <Provider store={store}>
    {/* <React.StrictMode> */}
    <div className="contenaireModules">
      <Stepper />
      <Video />
      <ListeChapitres />
      <ChapitreDescription />
      <ContainedButtons />
    </div>
    {/* </React.StrictMode> */}
  </Provider>,
  document.getElementById('cours')
);
