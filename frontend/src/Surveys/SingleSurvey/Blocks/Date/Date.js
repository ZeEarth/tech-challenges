/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 23/10/2017.
 */
import React from "react";
import {Panel, Table} from "react-bootstrap";
import LineDate from "./LineDate";

class Date extends React.Component {
    guid() {
        function _p8(s) {
            var p = (Math.random().toString(16)+"000000000").substr(2,8);
            return s ? "-" + p.substr(0,4) + "-" + p.substr(4,4) : p ;
        }
        return _p8() + _p8(true) + _p8(true) + _p8();
    }
    extractDatas(){
        let lines = [];
        this.props.dates.forEach(date => {
            lines.push(<LineDate date={date} key={this.guid()}/>)
        })
        return lines;
    }
    render() {
        return (
            <Panel header="Dates of answer">
                <Table responsive striped>
                    <thead>
                    <tr>
                        <th>List of answering dates</th>
                    </tr>
                    </thead>
                    <tbody>
                    {this.extractDatas()}
                    </tbody>
                </Table>
            </Panel>
        )
    }
}

export default Date;