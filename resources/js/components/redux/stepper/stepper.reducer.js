import { StepperActionTypes } from './stepper.types';

const INITIAL_STATE = {
    module_id: 1,
};



function stepperReducer(module_id = INITIAL_STATE, action) {
    
    switch (action.type) {
        case StepperActionTypes.INC_MODULE_ID:
            return { ...module_id, module_id: action.module_id + 1 }
        case StepperActionTypes.DEC_MODULE_ID:
            return { ...module_id, module_id: action.module_id - 1 }
        default:
            return module_id
    }  
}

export default stepperReducer;