import { StepperActionTypes } from './stepper.types';

export const getModuleId = (moduleId) => ({

    type: StepperActionTypes.GET_MODULE_ID,

    module_id: moduleId,

}
);