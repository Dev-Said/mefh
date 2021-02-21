import { ModulesActionTypes } from './module.types';

export const getVideo = (url) => ({

    type: ModulesActionTypes.GET_VIDEO,

    url_video: url,

}
);