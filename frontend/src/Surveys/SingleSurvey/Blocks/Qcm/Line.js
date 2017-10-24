/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 23/10/2017.
 */
import React from "react";
import FontAwesome from "react-fontawesome";

class Line extends React.Component
{
    constructor(props) {
        super(props);
        this.displayAlert = this.displayAlert.bind(this);
    }

    displayAlert() {
        let display = false;
        if ( this.props.inStockIn < this.props.numberOfStores ) {
            display = true;
        }
        return display;
    }

    render(){
        let display = this.displayAlert();
        return (
            <tr>
                <td>
                    {display ? <FontAwesome name="exclamation-triangle" className="red" tag="i" /> : ''}
                </td>
                <td>
                    {this.props.product}
                </td>
                <td>{this.props.inStockIn}</td>
            </tr>
        );
    }
}

export default Line;