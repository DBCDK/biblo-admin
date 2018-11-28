import React, {Component} from "react";
import "./App.css";
import {getQuizEntries} from "./quizClient";
import {getAllQuizzes} from "./openplatform.client";

const QuizEntry = entry => {
  console.log(entry);
  return (
    <tr key={entry.id}>
      <td>{entry.id}</td>
      <td>{entry.profiles.displayName}</td>
      <td>{entry.result.score}</td>
    </tr>
  );
};

const QuizSelector = ({quizzes = [], onChange = () => {}, value}) => {
  return (
    <select
      name="quizzes"
      id="quizSelector"
      defaultValue
      value
      onChange={onChange}
    >
      <option value disabled>
        -- Vælg en quiz --
      </option>
      {quizzes.map(quiz => (
        <option key={quiz._id} name={quiz.title} value={quiz._id}>
          {quiz._id}
        </option>
      ))}
    </select>
  );
};

class App extends Component {
  constructor() {
    super();
    this.state = {
      entries: [],
      next: [],
      quizzes: [],
      selectedQuiz: false
    };
    getAllQuizzes().then(quizzes => this.setState(() => ({quizzes})));
  }

  getQuizEntriesForId = id => {
    getQuizEntries(id).then(entries => this.setState(() => ({entries})));
  };

  onSelect = event => {
    const selectedQuizId = event.target.value;
    this.setState(() => ({
      selectedQuizId,
      entries: [],
      nextEntries: [],
      offset: 0
    }));
    this.getQuizEntriesForId(event.target.value);
  };

  render() {
    const {quizzes, entries} = this.state;
    return (
      <div className="App">
        <QuizSelector quizzes={quizzes} onChange={this.onSelect} />
        <table>
          <tbody>{entries.map(QuizEntry)}</tbody>
        </table>
      </div>
    );
  }
}

export default App;
