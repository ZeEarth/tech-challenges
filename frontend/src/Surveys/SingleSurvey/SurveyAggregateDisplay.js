/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 23/10/2017.
 */
import React from "react";
import {Alert, Col, Row} from "react-bootstrap";
import Qcm from "./Blocks/Qcm/Qcm";
import Stock from "./Blocks/Stock/Stock";
import Date from "./Blocks/Date/Date";

class SurveyAggregateDisplay extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            code: props.code,
            survey: {
                date: [],
                qcm: [],
            }
        }
    }

    componentWillMount() {
        fetch("http://localhost:8080/surveys/aggregate?code=" + this.state.code)
            .then(result => result.json())
            .then(survey => this.setState({survey}))
    }

    render() {
        return (
            <div>
                <Row>
                    <Col md={12}>
                        <Alert bsStyle="info">
                            We got answers from {this.state.survey.date.length} of our sales outlets to this
                            survey.
                        </Alert>
                    </Col>
                </Row>
                <Row>
                    <Col md={4}>
                        <Qcm qcm={this.state.survey.qcm} numberOfStores={this.state.survey.date.length}/>
                    </Col>
                    <Col md={4}>
                        <Stock stores={this.state.survey.date.length} average={this.state.survey.number}/>
                    </Col>
                    <Col md={4}>
                        <Date dates={this.state.survey.date}/>
                    </Col>
                </Row>
            </div>
        );
    }
}

export default SurveyAggregateDisplay;