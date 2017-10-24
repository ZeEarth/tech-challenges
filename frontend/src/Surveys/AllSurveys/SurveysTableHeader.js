/**
 *      ____    ___          _   _
 *     |_  /___| __|__ _ _ _| |_| |_
 *      / // -_) _|/ _` | '_|  _| ' \
 *     /___\___|___\__,_|_|  \__|_||_|
 *
 *  Created by jndesjardins on 22/10/2017.
 */
import React from "react";

class SurveysTableHeader extends React.Component{
    render() {
        return (
          <tr>
              <th>#</th>
              <th>Code</th>
              <th>Name</th>
              <th>Action</th>
          </tr>
        );
    }
}

export default SurveysTableHeader;