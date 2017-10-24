/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from "react";
import {Table} from "react-bootstrap";
import SurveysTableHeader from "./SurveysTableHeader";
import SurveyRow from "./SurveyRow";

class SurveysTable extends React.Component
{
    render(){
        let rows = [];
        let counter = 0;
        this.props.surveys.forEach((survey) => {
            counter++;
            if (survey.name.includes(this.props.filterText) || survey.code.includes(this.props.filterText)) {
                rows.push(<SurveyRow survey={survey} key={survey.code} num={counter}/>)
            }
        });
        return (
            <Table responsive bordered hover striped>
                <thead>
                    <SurveysTableHeader/>
                </thead>
                <tbody>
                {rows}
                </tbody>
            </Table>
        );
    }
}

export default SurveysTable;