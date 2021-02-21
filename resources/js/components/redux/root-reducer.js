import { combineReducers } from "redux";
import modulesReducer from "./module/module.reducer";
import stepperReducer from "./stepper/stepper.reducer";

export default combineReducers({
  modules: modulesReducer,
  stepper: stepperReducer,

});