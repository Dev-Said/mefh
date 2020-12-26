import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';


//conposant pour afficher une video
const Video = (props) => {

    return <>

     <div className="vid">
        <video width="400" height="222" controls="controls">
            <source src="./storage/videos/learn.mp4" type="video/mp4" />
            {/* <source src="learn.webm" type="video/webm" />
            <source src="learn.ogv" type="video/ogg" /> */}
            Ici l'alternative à la vidéo : un lien de téléchargement, un message, etc.
        </video>
     </div>

</>
}

export default Video;



