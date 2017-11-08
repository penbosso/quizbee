(function() {
    
           var General_Knowledge=
           [
           {
           	question:" Who was Stan Laurels partner ?",
           	choices:["Oliver Hardy","Sean Morley","Matt Morgan","Bruno Augustus"],
           	correctAnswer:0
           },
           {
           	question:" What animal would you find in a form ?",
           	choices:["Hare","Goat","Pig","Tiger"],
           	correctAnswer:0
           },
           {
           	question:" What plant does the Colorado beetle attack ?",
           	choices:["beans","orange","potato","banana"],
           	correctAnswer:2
           },
           {
           	question:" La Giaconda is better known as what ?",
           	choices:["Mona Lisa","Vladmir Putin","Afonisa","Pamela"],
           	correctAnswer:2
           },
            {
           	question:"  What kind of food is Cullan Skink  ?",
           	choices:["corn","beef","pork","fish"],
           	correctAnswer:3
           }
           
		];
        
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
          
          var question = $('<p>').append(General_Knowledge[index].question);
          qElement.append(question);
          
          var radioButtons = createRadios(index);
          qElement.append(radioButtons);
          
          return qElement;
        }
        
        function createRadios(index) {
          var radioList = $('<ul>');
          var item;
          var input = '';
          for (var i = 0; i < General_Knowledge[index].choices.length; i++) {
            item = $('<li>');
            input = '<input type="radio" name="answer" value=' + i + ' />';
            input += General_Knowledge[index].choices[i];
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
              if (selections[i] === General_Knowledge[i].correctAnswer) {
                numCorrect++;
              }
            }
            $('#score_box').val(numCorrect*20);
                
            if(questionCounter < General_Knowledge.length){
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
            if (selections[i] === General_Knowledge[i].correctAnswer) {
              numCorrect++;
            }
          }
          
          score.append('You got ' + numCorrect + ' questions out of ' +
                       General_Knowledge.length + ' right!!!');
          return score;
        }
      })();