import { combineReducers } from "redux";
import modulesReducer from "./module/module.reducer";
import stepperReducer from "./stepper/stepper.reducer";
import titreChapitreReducer from "./titreChapitre/titreChapitre.reducer";

export default combineReducers({
  modules: modulesReducer,
  stepper: stepperReducer,
  chapitreTitre: titreChapitreReducer,
});