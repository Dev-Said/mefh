import { combineReducers } from "redux";
import videoReducer from "./video/video.reducer";
import moduleReducer from "./module/module.reducer";
import titreChapitreReducer from "./titreChapitre/titreChapitre.reducer";
import chapitreReducer from "./chapitre/chapitre.reducer";
import activeStepReducer from "./activeStep/activeStep.reducer";

export default combineReducers({
  videos: videoReducer,
  modules: moduleReducer,
  chapitreTitre: titreChapitreReducer,
  chapitreData: chapitreReducer,
  activeStep: activeStepReducer,
});