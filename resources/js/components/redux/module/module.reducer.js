import { ModulesActionTypes } from './module.types';

const INITIAL_STATE = {
    url_video: 'react1.mp4',
};

const modulesReducer = (url_video = INITIAL_STATE, action) => {
    // console.log(action);
    switch (action.type) {
        case ModulesActionTypes.GET_VIDEO:

            return { ...url_video, url_video: action.url_video };

        default:

            return url_video;
    }
};

export default modulesReducer;
