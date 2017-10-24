/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from "react";
import SurveysTable from './SurveysTable';
import {Breadcrumb} from "react-bootstrap";
import FontAwesome from "react-fontawesome";
import Filters from "./Filters";

class AllSurveys extends React.Component
{
    constructor(props) {
        super(props);
        this.handleFilter = this.handleFilter.bind(this);
        this.state = {
            surveys: [],
            filterText: "",
        };
    }

    handleFilter(filterInput) {
        this.setState({filterText: Object.values(filterInput)[0]});
    }

    componentDidMount() {
        fetch("http://localhost:8080/surveys")
            .then(result => result.json())
            .then(surveys => this.setState({surveys}))
    }

    render() {
        return (
            <div className="container">
                <Breadcrumb>
                    <Breadcrumb.Item href="/"><FontAwesome name="home" /> Home</Breadcrumb.Item>
                    <Breadcrumb.Item active>All Surveys</Breadcrumb.Item>
                </Breadcrumb>
                <Filters filterText={this.state.filterText} onFilter={this.handleFilter}/>
                <SurveysTable surveys={this.state.surveys}  filterText={this.state.filterText} />
            </div>
        );
    }
}

export default AllSurveys;