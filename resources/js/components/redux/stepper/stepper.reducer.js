import { StepperActionTypes } from './stepper.types';

const INITIAL_STATE = {
    chapitre_id: 1,
};



function stepperReducer(chapitre_id = INITIAL_STATE, action) {
    
    switch (action.type) {
        case StepperActionTypes.INC_CHAPITRE_ID:
            return { ...chapitre_id, chapitre_id: action.chapitre_id + 1 }
        case StepperActionTypes.DEC_CHAPITRE_ID:
            return { ...chapitre_id, chapitre_id: action.chapitre_id - 1 }
        case StepperActionTypes.RESET_CHAPITRE_ID:
            return { ...chapitre_id, chapitre_id: 1 }
        default:
            return chapitre_id
    }  
}

export default stepperReducer;