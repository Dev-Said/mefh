import React from "react";
import { connect } from 'react-redux';
import ReactPlayer from "react-player";
import './video.scss';


function Video(props) {

    var sousTitre = props.info_chapitre.sous_titres;

    if(props.info_chapitre.fichier_video != ''){
        return (
            <div className="react_player">
                <ReactPlayer
                    url={"./storage/" + props.info_chapitre.fichier_video}
                    playing={false}
                    controls={true}
                    onContextMenu={e => e.preventDefault()}
                    playbackRate={1}
                    width="100%"
                    height="auto"
                    config={{
                        file: {
                            attributes: {
                                crossOrigin: "anonymous",
                                controlsList: 'nodownload',
                            },
                            tracks: [
                                { kind: 'subtitles', src: "./storage/" + sousTitre, srcLang: 'fr', default: true, mode: 'hidden' }
                            ]
                        },
                    }}
                />
            </div>
        );
    } else {
        return (
            <div className="react_player">
            </div>
        );
    }


    
}

const mapStateToProps = ({ chapitreData }) => {
    return {
        info_chapitre: chapitreData.chapitreData,
    }
}

export default connect(mapStateToProps)(Video);
