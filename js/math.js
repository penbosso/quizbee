(function() {
    var mathematics = [{
      question: "What is 2*5?",
      choices: [2, 5, 10, 15, 20],
      correctAnswer: 2
    }, {
      question: "What is 3*6?",
      choices: [3, 6, 9, 12, 18],
      correctAnswer: 4
    }, {
      question: "What is 8*9?",
      choices: [72, 99, 108, 134, 156],
      correctAnswer: 0
    }, {
      question: "What is 1*7?",
      choices: [4, 5, 6, 7, 8],
      correctAnswer: 3
    }, {
      question: "What is 8*8?",
      choices: [20, 30, 40, 50, 64],
      correctAnswer: 4
    }];
    
    
    var questionCounter = 0; 
    var selections = []; 
    var quiz = $('#quiz');
    
    
    displayNext();
    
        $('#next').on('click', function (e) {
          e.preventDefault();
          
          choose();
          
         
          if (isNaN(selections[questionCounter])) {
            alert('Please make a selection!');
          } else {
            questionCounter++;
            displayNext();
          }
        });
    
        function createQuestionElement(index) {
          var qElement = $('<div>', {
            id: 'question'
          });
          
          var header = $('<h2>Question ' + (index + 1) + ':</h2>');
          qElement.append(header);
          
          var question = $('<p>').append(mathematics[index].question);
          qElement.append(question);
          
          var radioButtons = createRadios(index);
          qElement.append(radioButtons);
          
          return qElement;
        }
        
        function createRadios(index) {
          var radioList = $('<ul>');
          var item;
          var input = '';
          for (var i = 0; i < mathematics[index].choices.length; i++) {
            item = $('<li>');
            input = '<input type="radio" name="answer" value=' + i + ' />';
            input += mathematics[index].choices[i];
            item.append(input);
            radioList.append(item);
          }
          return radioList;
        }
        
        function choose() {
          selections[questionCounter] = +$('input[name="answer"]:checked').val();
        }
     
        function displayNext() {
          quiz.fadeOut(function() {
            $('#question').remove();
            
            var numCorrect = 0;
            for (var i = 0; i < selections.length; i++) {
              if (selections[i] === mathematics[i].correctAnswer) {
                numCorrect++;
              }
            }
            $('#score_box').val(numCorrect*20);
                
            if(questionCounter < mathematics.length){
              var nextQuestion = createQuestionElement(questionCounter);
              quiz.append(nextQuestion).fadeIn();
              if (!(isNaN(selections[questionCounter]))) {
                $('input[value='+selections[questionCounter]+']').prop('checked', true);
              }
              
              if(questionCounter === 1){
        
              } else if(questionCounter === 0){
                
        
                $('#next').show();
              }
            }else {
              var scoreElem = displayScore();
              quiz.append(scoreElem).fadeIn();
              
              $('#next').hide();
              $('#start').show();
              $('#submitScore').show();
            }
          });
        }
        
        function displayScore() {
          var score = $('<p>',{id: 'question'});
          
          var numCorrect = 0;
          for (var i = 0; i < selections.length; i++) {
            if (selections[i] === mathematics[i].correctAnswer) {
              numCorrect++;
            }
          }
          
          score.append('You got ' + numCorrect + ' questions out of ' +
                       mathematics.length + ' right!!!');
          return score;
        }
      })();