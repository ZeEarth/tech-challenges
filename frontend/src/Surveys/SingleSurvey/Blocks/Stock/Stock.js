/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 23/10/2017.
 */
import React from "react";
import {Panel} from "react-bootstrap";

class Stock extends React.Component {
    render() {
        return (
            <Panel header="Products' Average">
            <p>
                The {this.props.stores} sales outlets have an average of <strong>{this.props.average}</strong> goods in stock.
            </p>
            </Panel>
        );
    }
}

export default Stock;