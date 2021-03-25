import { DejaSuiviActionTypes } from './dejaSuivi.types';

const INITIAL_STATE = {
    dejaSuivi: [],
};

function dejaSuiviReducer(dejaSuivi = INITIAL_STATE, action) {
    
    switch (action.type) {
        case DejaSuiviActionTypes.DEJA_SUIVI:
            return { ...dejaSuivi, dejaSuivi: action.dejaSuivi }
        default:
            return dejaSuivi
    }  
}

export default dejaSuiviReducer;