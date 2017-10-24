/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 23/10/2017.
 */
import React from "react";
import Moment from "react-moment";

class LineDate extends React.Component {
    render() {
        return (
            <tr>
                <td>
                    <Moment format="DD/MM/YYYY HH:mm">
                        {this.props.date}
                    </Moment>
                </td>
            </tr>
        );
    }
}

export default LineDate;