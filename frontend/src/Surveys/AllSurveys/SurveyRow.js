/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from "react";
import FontAwesome from "react-fontawesome";
import {Button} from "react-bootstrap";
import {Link} from "react-router-dom";
import '../../FontAwesome/css/font-awesome.css';

class SurveyRow extends React.Component {
    render() {
        return (
            <tr>
                <td>{this.props.num}</td>
                <td>{this.props.survey.code}</td>
                <td>{this.props.survey.name}</td>
                <td>
                    <Link to={`/surveys/${this.props.survey.code}`}>
                        <Button className="btn btn-success">
                            <FontAwesome
                                name="eye"
                                size="lg"
                                tag="i"
                            />
                            &nbsp;view aggregate datas
                        </Button>
                    </Link>
                </td>
            </tr>
        );
    }
}

export default SurveyRow;