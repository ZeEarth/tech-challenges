/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from "react";
import MyJumbotron from "./MyJumbotron";
import {Link} from "react-router-dom";
import {Button, Col, Panel, Row} from "react-bootstrap";
import SurveyImages from '../main-ui-my-surveys.svg';
import FontAwesome from "react-fontawesome";

class Home extends React.Component {
    render() {
        return (
            <div className="container">
                <MyJumbotron/>
                <Row className="show-grid">
                    <Col sm={6} md={3}>
                        <Panel header="Surveys">
                            <p>
                                <img src={SurveyImages} height={100} alt="-"/>
                            </p>
                            <p>
                                Here you can find all available surveys.
                            </p>
                            <p>
                                <Link to="/surveys">
                                    <Button bsStyle="primary">
                                        <FontAwesome
                                            name="eye"
                                            size="lg"
                                            tag="i"
                                        />
                                        &nbsp;All Surveys
                                    </Button>
                                </Link>
                            </p>
                        </Panel>
                    </Col>
                </Row>
            </div>
        );
    }
}

export default Home;