import { StepperActionTypes } from './stepper.types';

const INITIAL_STATE = {
    module_id: 1,
};

const stepperReducer = (module_id = INITIAL_STATE, action) => {
    // console.log(action);
    switch (action.type) {
        case StepperActionTypes.GET_MODULE_ID:

            return { ...module_id, module_id: action.module_id };

        default:

            return module_id;
    }
};

export default stepperReducer;
