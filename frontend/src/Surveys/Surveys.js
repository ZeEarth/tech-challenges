/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from 'react';
import {Switch, Route} from "react-router-dom";
import AllSurveys from "./AllSurveys/AllSurveys";
import SingleSurvey from "./SingleSurvey/SingleSurvey";

class Surveys extends React.Component {
    render(){
        return (
            <Switch>
                <Route exact path='/surveys' component={AllSurveys}/>
                <Route path='/surveys/:code' component={SingleSurvey}/>
            </Switch>
        );
    }
}

export default Surveys;