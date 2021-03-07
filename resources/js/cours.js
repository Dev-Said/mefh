import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import store from './components/redux/store';
import Wrapper from './components/wrapper/wrapper';


ReactDOM.render(
  <Provider store={store}>
      <Wrapper />
  </Provider>,
  document.getElementById('cours')
);
