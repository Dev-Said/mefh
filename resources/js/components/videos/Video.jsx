import React from 'react';
import ReactPlayer from 'react-player';
import { connect } from 'react-redux';


const Video = (props) => {

    return (
        <ReactPlayer className="player-wrapper"
            pip={false}
            config={{ file: { attributes: { controlsList: 'nodownload' } } }}
            onContextMenu={e => e.preventDefault()}
            url={"./storage/" + props.url_video}
            controls={true}
            playbackRate={1}
            width="70%"
            height="auto"
        />
    )
}

const mapStateToProps = ({ videos }) => {
    return {
        url_video: videos.url_video
    }
}

export default connect(mapStateToProps)(Video);




