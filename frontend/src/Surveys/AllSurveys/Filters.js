/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 23/10/2017.
 */
import React from "react";
import {ControlLabel, FormControl, FormGroup, HelpBlock} from "react-bootstrap";

class Filters extends React.Component {

    constructor(props) {
        super(props);
        this.handleChange = this.handleChange.bind(this);
        this.state = {
            filterText: props.filterText,
        }
    }

    handleChange(e) {
        this.setState({filterText: e.target.value});
        this.props.onFilter({
            [e.target.name]: e.target.value
        });
    }

    render() {
        return (
            <form>
                <FormGroup controlId="fitlerList">
                    <ControlLabel>What should we search ?</ControlLabel>
                    <FormControl
                        type="text"
                        value={this.state.filterText}
                        placeholder="Search..."
                        onChange={this.handleChange}
                    />
                    <FormControl.Feedback/>
                    <HelpBlock>Filter is CaseSensitive.</HelpBlock>
                </FormGroup>
            </form>
        );
    }
}

export default Filters;