import React, { useState, useEffect } from "react";
import axios from 'axios';


function InitialData () {

    const [modules, setModules] = useState([]);


useEffect(() => {
    axios.get(`http://localhost:8000/modulesApi`).then((res) => {
        const modulesData = Object.entries(res.data);
        setModules(modulesData);
    });
}, []);


return (
    
    modules
);

}

export default InitialData;