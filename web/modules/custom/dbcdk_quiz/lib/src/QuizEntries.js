import React, {Component} from "react";
import {getQuizEntries, count} from "./quizClient";
import {getAllQuizzes} from "./openplatform.client";

const QuizEntry = entry => {
  return (
    <tr key={entry.id}>
      <td>{entry.id}</td>
      <td>{entry.profiles.displayName}</td>
      <td>{entry.result.score}</td>
    </tr>
  );
};

const QuizSelector = ({quizzes = [], onChange = () => {}, selected}) => {
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
        <option
          selected={selected === quiz}
          key={quiz._id}
          name={quiz.title}
          value={quiz}
        >
          {quiz.title} {quiz.count}
        </option>
      ))}
    </select>
  );
};

class Quiz extends Component {
  constructor() {
    super();
    this.state = {
      entries: [],
      offset: 0,
      limit: 1
    };
  }
}

class QuizEntries extends Component {
  constructor() {
    super();
    this.state = {
      entries: [],
      next: [],
      quizzes: [],
      selectedQuiz: false
    };
    getAllQuizzes().then(async quizData => {
      const quizzes = await Promise.all(
        quizData.map(async q => {
          return {...q, ...(await count(q._id))};
        })
      );
      this.setState(() => ({quizzes}));
    });
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
      <div className="QuizEntries">
        <QuizSelector quizzes={quizzes} onChange={this.onSelect} />
        <table>
          <tbody>{entries.map(QuizEntry)}</tbody>
        </table>
      </div>
    );
  }
}

export default QuizEntries;
