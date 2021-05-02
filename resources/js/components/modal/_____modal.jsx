import React from "react";
import CloseIcon from '@material-ui/icons/Close';

const Modal = (props) => {

    return (
        <div id="myModal" class="modal">

            <div class="modal-content">

                <div class="headerModal"><button class="close">
                <CloseIcon /></button></div>

                <p> {props.message} </p>

                <div class="footerModal"></div>

            </div>

        </div>
    )
}

export default Modal;