/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from 'react';
import {Jumbotron} from 'react-bootstrap';

class MyJumbotron extends React.Component {
    render(){
        return (
            <Jumbotron>
                <h1>IWD Frontend Challenge</h1>
                <p>This evaluation application will consume an api created during IWD Backend Challenge. It will show a surveys' list and by clicking on one of them, will display aggregate data for the selected one.</p>
                <p>
                    The api endpoint to get the surveys' list is http://localhost:8080/surveys
                </p>
            </Jumbotron>
        );
    }
}

export default MyJumbotron;