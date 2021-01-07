import { combineReducers } from "redux";
import modulesReducer from "./module/module.reducer";

export default combineReducers({
  modules: modulesReducer,

});