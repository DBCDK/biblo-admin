import React, {Component} from "react";
import {getQuizEntries, getQuizEntriesCount} from "./quizClient";
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
  console.log(selected);
  return (
    <select
      name="quizzes"
      id="quizSelector"
      defaultValue
      value={selected.id}
      onChange={onChange}
    >
      <option value disabled>
        -- Vælg en quiz --
      </option>
      {quizzes.map(quiz => (
        <option key={quiz._id} name={quiz.title} value={quiz._id}>
          {quiz.title} {quiz.count}
        </option>
      ))}
    </select>
  );
};

const LibrarySelector = ({libraries = {}}) => {
  const options = Object.entries(libraries).map(([libraryName, branches]) => {
    return <option disabled>{libraryName}</option>;
  });

  return (
    <select name="library-selector" id="libSelect">
      {options}
    </select>
  );
};

class QuizEntries extends Component {
  constructor() {
    super();
    this.state = {
      entries: [],
      limit: 1,
      loading: true
    };
  }
  getQuizEntriesForId = () => {
    this.setState(() => ({loading: true}));
    getQuizEntries(
      this.props.quiz._id,
      this.state.limit,
      this.state.entries.length
    ).then(entries =>
      this.setState(state => ({
        entries: [...state.entries, ...entries],
        loading: false
      }))
    );
  };

  componentDidUpdate(prevProps) {
    if (prevProps.quiz._id !== this.props.quiz._id) {
      this.getQuizEntriesForId();
      this.setState(() => ({entries: []}));
    }
  }

  hasMoreEntries = () =>
    !this.props.loading &&
    this.props.quiz &&
    this.props.quiz.count > this.state.entries.length;

  render() {
    return (
      <div className="quiz-entries">
        <table>
          <tbody>{this.state.entries.map(QuizEntry)}</tbody>
        </table>
        <Spinner loading={this.state.loading} />
        {(this.hasMoreEntries() && (
          <button onClick={this.getQuizEntriesForId}>Indlæs flere</button>
        )) ||
          null}
      </div>
    );
  }
}

const Spinner = ({loading = true}) =>
  loading ? (
    <div className="spinner__wrapper">
      <span className="spinner" />
    </div>
  ) : (
    ""
  );

class Quiz extends Component {
  constructor(props) {
    super(props);
    this.state = {
      entries: [],
      next: [],
      quizzes: [],
      selectedQuiz: false
    };

    getAllQuizzes().then(async quizData => {
      const quizzes = await Promise.all(
        quizData.map(async q => {
          // Add count to quiz objects
          return {...q, ...(await getQuizEntriesCount(q._id))};
        })
      );
      this.setState(() => ({quizzes}));
    });
  }

  onSelect = event => {
    const selectedQuizId = event.target.value;
    this.setState(() => ({
      selectedQuiz: this.state.quizzes.find(q => q._id === selectedQuizId)
    }));
  };

  render() {
    const {quizzes} = this.state;
    return (
      <div className="QuizEntries">
        <QuizSelector
          quizzes={quizzes}
          onChange={this.onSelect}
          selected={this.state.selectedQuiz}
        />
        <LibrarySelector libraries={window.drupalSettings.branches} />
        <QuizEntries quiz={this.state.selectedQuiz} />
      </div>
    );
  }
}

export default Quiz;
