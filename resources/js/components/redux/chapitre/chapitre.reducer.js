import { ChapitreActionTypes } from './chapitre.types';

const INITIAL_STATE = {
    titre: 'titreInitial',
};



function chapitreReducer(titre = INITIAL_STATE, action) {
    
    switch (action.type) {
        case ChapitreActionTypes.GET_CHAPITRE:
            return { ...titre, titre: action.titre }
        default:
            return titre
    }  
}

export default chapitreReducer;