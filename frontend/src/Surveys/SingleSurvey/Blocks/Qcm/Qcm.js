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
import FontAwesome from "react-fontawesome";
import Line from "./Line";

class Qcm extends React.Component {

    constructor(props) {
        super(props);
        this.extractData = this.extractData.bind(this);
    }

    extractData() {
        let lines = [];
        this.props.qcm.forEach(data => {
            let responses = data.split(" ")
            let tmp = {
                product: responses[1] + ' ' + responses[2],
                inStockIn: responses[0],
            }
            lines.push(<Line product={tmp.product} inStockIn={tmp.inStockIn} numberOfStores={this.props.numberOfStores} key={tmp.product}/>);
        })
        return lines;
    }

    render() {
        return (
            <Panel header="Stock Status">
                Number of sales outlets which have the reference in there stock.
                <Table responsive striped condensed>
                    <thead>
                    <tr>
                        <th colSpan={2}>Best Seller</th>
                        <th>In stock in</th>
                    </tr>
                    </thead>
                    <tbody>
                    {this.extractData()}
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colSpan={3} align="center"><FontAwesome name="exclamation-triangle" className="red" tag="i" /> Low stock in some locations</th>
                    </tr>
                    </tfoot>
                </Table>
            </Panel>
        )
    }
}

export default Qcm;