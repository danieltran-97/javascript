import React, { useState } from 'react';

export default function QuizNavBar({ questions }) {
  const [questionIndex, setQuestionIndex] = useState(0);

  // define event handlers 
const goBack = () => setQuestionIndex(prevQuestionIndex => prevQuestionIndex - 1); //goes to previous question
  // determine if on the first question or not 
const goToNext = () => setQuestionIndex(prevQuestionIndex => prevQuestionIndex + 1); //goes to next question
const onFirstQuestion = true;
  const onLastQuestion = questionIndex === questions.length - 1;

  return (
    <nav>
      <span>Question #{questionIndex + 1}</span>
      <div>
        <button onClick={goBack} disabled={onFirstQuestion}> {/*button will be disabled if on first question*/}
          Go Back
        </button>
        <button disabled={onLastQuestion} onClick={goToNext}> {/*button will be disabled if on last question*/}
          Next Question
        </button>
      </div>
    </nav>
  );
}
