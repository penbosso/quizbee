(function() {
    
               var English =
               [
                
                    {
                    question:"	I ..... tennis every Sunday morning.",
                    choices:["playing","play","am playing","am play"],
                    
                   answer:1
                },	
                {
                    question:"Don't make so much noise. Noriko ..... to study for her ESL test!",
                    choices:["try","tries","tried","is trying"],
                    answer:3
                },
                {
                    question:"Jun-Sik ..... his teeth before breakfast every morning.",
                    choices:["will cleaned","is cleaning","cleans","clean"],
                    answer:2
                },
                {
                    question:"Sorry, she can't come to the phone. She ..... a bath!",
                    choices:["is having","having","have","has"],
                    answer:0
                },
                {
                        question:"..... many times every winter in Frankfurt.",
                        choices:["It snows","It snowed","It is snowing","It is snow"],
                        answer:0
                }        
                ]
            
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
              
              var question = $('<p>').append(English[index].question);
              qElement.append(question);
              
              var radioButtons = createRadios(index);
              qElement.append(radioButtons);
              
              return qElement;
            }
            
            function createRadios(index) {
              var radioList = $('<ul>');
              var item;
              var input = '';
              for (var i = 0; i < English[index].choices.length; i++) {
                item = $('<li>');
                input = '<input type="radio" name="answer" value=' + i + ' />';
                input += English[index].choices[i];
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
                  if (selections[i] === English[i].correctAnswer) {
                    numCorrect++;
                  }
                }
                $('#score_box').val(numCorrect*20);
                    
                if(questionCounter < English.length){
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
                  $('#submitScore').show();
                  $('#next').hide();
                  $('#start').show();
                }
              });
            }
            
            function displayScore() {
              var score = $('<p>',{id: 'question'});
              
              var numCorrect = 0;
              for (var i = 0; i < selections.length; i++) {
                if (selections[i] === English[i].correctAnswer) {
                  numCorrect++;
                }
              }
              
              score.append('You got ' + numCorrect + ' questions out of ' +
                           English.length + ' right!!!');
              return score;
            }
          })();