import React from "react";
import ReactDOM from "react-dom";
import QuizEntries from "./Quiz.component.js";
import "./App.css";

const {branches = {}, token = null} = window.drupalSettings || {};
console.log(branches);
ReactDOM.render(
  <QuizEntries branches={branches} token={token} />,
  document.getElementById("quiz-entries")
);

if (module.hot) {
  module.hot.accept();
}
