/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from "react";
import {Breadcrumb} from "react-bootstrap";
import FontAwesome from "react-fontawesome";
import SurveyAggregateDisplay from "./SurveyAggregateDisplay";

class SingleSurvey extends React.Component
{
    constructor(props) {
        super(props);
        this.state = {
            code: props.match.params.code,
        }
    }

    render() {
        return (
            <div className="container">
                <Breadcrumb>
                    <Breadcrumb.Item href="/"><FontAwesome name="home" /> Home</Breadcrumb.Item>
                    <Breadcrumb.Item href="/surveys"><FontAwesome name="list" /> All Surveys</Breadcrumb.Item>
                    <Breadcrumb.Item active>Survey {this.state.code}</Breadcrumb.Item>
                </Breadcrumb>
                <SurveyAggregateDisplay code={this.state.code}/>
            </div>
        );
    }
}

export default SingleSurvey;