/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 24/10/2017.
 */
import React from "react";
import ReactDOM from "react-dom";
import TestUtils from "react-addons-test-utils";
import MyJumbotron from "./MyJumbotron";

it('MyJumbotrom display IWD titel', () => {
    // Render Jumbotron
    const myJumbo = TestUtils.renderIntoDocument(<MyJumbotron/>);

    const domPart = ReactDOM.findDOMNode(myJumbo);

    expect(domPart.textContent).toContain("IWD Frontend Challeng");
});
