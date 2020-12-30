import React from 'react';
import ReactPlayer from 'react-player';



const Video = () => {

    return (
        <ReactPlayer
            pip={false}
            config={{ file: { attributes: { controlsList: 'nodownload' } } }}
            // Disable right click
            onContextMenu={e => e.preventDefault()}
            className="player-wrapper"
            url="./storage/videos/learn.mp4"
            controls={true}
            playbackRate={1}
            width="1200px"
            height="700px"
        />
    )



};


export default Video;



