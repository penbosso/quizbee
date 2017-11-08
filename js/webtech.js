(function() {

        
        var Web_Tech=[
            {
                question:"Which of the following options is correct with regard to HTML? It is..",
                choices:[" a modelling language","a DTP language"," a partial programming language","  used to structure documents"],
                answer:3
            },
            {
                question:"What would be the colours of the RGB where the hexadecimal values are #FF0000, #00FF00 and  #0000FF respectively?",
            
                choices:["Blue, Green, Red","Green, Blue, Red"," Green, Red, Blue",") Red, Green, Blue"],
                answer:3
            },
            {
                question:"Which property does one use to align text to the right side of a block-level element in Cascading Style Sheets?",
                choices:["text-align","justify","block-align","align"],
                answer:0
            },
            {
                question:"What method is used to specify a container's layout in JSP?",
                choices:["setLayout()"," Layout()","setContainerLayout()"," ContainerLayout()"],
                answer:0
            },
            {
                question:"What value does readLine() return when it has reached the end of a file in JSP?",
                choices:[" Last character in the file","False","Null","True"],
                answer:2
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
          
          var question = $('<p>').append(Web_Tech[index].question);
          qElement.append(question);
          
          var radioButtons = createRadios(index);
          qElement.append(radioButtons);
          
          return qElement;
        }
        
        function createRadios(index) {
          var radioList = $('<ul>');
          var item;
          var input = '';
          for (var i = 0; i < Web_Tech[index].choices.length; i++) {
            item = $('<li>');
            input = '<input type="radio" name="answer" value=' + i + ' />';
            input += Web_Tech[index].choices[i];
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
              if (selections[i] === Web_Tech[i].correctAnswer) {
                numCorrect++;
              }
            }
            $('#score_box').val(numCorrect*20);
                
            if(questionCounter < Web_Tech.length){
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
            if (selections[i] === Web_Tech[i].correctAnswer) {
              numCorrect++;
            }
          }
          
          score.append('You got ' + numCorrect + ' questions out of ' +
                       Web_Tech.length + ' right!!!');
          return score;
        }
      })();