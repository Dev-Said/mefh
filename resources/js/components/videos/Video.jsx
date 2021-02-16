import React, { Component } from 'react';
import ReactPlayer from 'react-player';
import { connect } from 'react-redux';


class Video extends Component {
    render() {
        const { url_video } = this.props;

        return (
            <ReactPlayer className="player-wrapper"
                pip={false}
                config={{ file: { attributes: { controlsList: 'nodownload' } } }}
                onContextMenu={e => e.preventDefault()}
                url={"./storage/" + url_video}
                controls={true}
                playbackRate={1}
                width="1200px"
                height="700px"
            />
        )
    }
}

const mapStateToProps = ({ modules }) => {
    return {
        url_video: modules.url_video
    };
};

export default connect(mapStateToProps)(Video);



