import React, {Component} from 'react';
import logo from './logo.svg';
import logoIwd from './mainLogoTitle.svg';
import './App.css';
import Surveys from "./Surveys/Surveys";
import {BrowserRouter, Route, Switch} from "react-router-dom";
import Home from "./Home/Home";


class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <div className="App">
                    <header className="App-header">
                        <img src={logo} className="App-logo" alt="logo"/>
                        <h1 className="App-title">Welcome to React {this.props.name}</h1>
                    </header>
                    <Switch>
                        <Route exact path='/' component={Home}/>
                        <Route path='/surveys' component={Surveys}/>
                    </Switch>
                    <footer>
                        <img src={logoIwd} className="App-iwd-logo" alt="IWD Logo"/>
                    </footer>
                </div>
            </BrowserRouter>
        );
    }
}

export default App;
