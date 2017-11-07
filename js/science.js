(function() {
    
    var ScienceAndTech=[
             
        {
            question:"Which of the following is a non metal that remains liquid at room temperature?",
            choices:["Phosphorous","Bromine","Chlorine","Helium"],
            correctAnswer:2
        },
        {
        question:"Chlorophyll is a naturally occurring chelate compound in which central metal is",
        choices:["copper","magnesium","iron","calcium"],
        correctAnswer:2	
        },
        {
            question:"Which of the following is used in pencils?",
            choices:["Graphite","Silicon","Charcoal","Phosphorous"],
            correctAnswer:1	
            
        },
        {
            question:"Which of the following metals forms an amalgam with other metals?",
            choices:["Tin","Mercury","Lead","Zinc"],
            correctAnswer:2		
        },
        {
            question:"Chemical formula for water is",
            choices:["NaAlO2","H2O","Al2O3","CaSiO3"],
            correctAnswer:2
        },
        {
            question:"The gas usually filled in the electric bulb is",
            choices:["nitrogen","hydrogen","carbon dioxide","oxygen"],
            correctAnswer:1
        },
        {
        question:"Washing soda is the common name for",
        choices:["Sodium carbonate","Calcium bicarbonate","Sodium bicarbonate","Calcium carbonate"],
        correctAnswer:1	
            
        },
        {
            question:"Quartz crystals normally used in quartz clocks etc. is chemically",
            choices:["silicon dioxide","germanium oxide","a mixture of germanium oxide and silicon dioxide","sodium silicate"],
            correctAnswer:1		
        
            },
            {
                question:"Which of the gas is not known as green house gas?",
                choices:["Methane","Nitrous Oxide","Carbon dioxide","Hydrogen"],
                correctAnswer:4
            },
            {
                question:"Bromine is a",
                choices:["black solid","red liquid","colourless gas","highly inflammable gas"],
                correctAnswer:2
            
                
        
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
        
        $('#prev').on('click', function (e) {
          e.preventDefault();
       
          choose();
          questionCounter--;
          displayNext();
        });
        
        $('#start').on('click', function (e) {
          e.preventDefault();
         
          questionCounter = 0;
          selections = [];
          displayNext();
          $('#start').hide();
        });
        
    
        function createQuestionElement(index) {
          var qElement = $('<div>', {
            id: 'question'
          });
          
          var header = $('<h2>Question ' + (index + 1) + ':</h2>');
          qElement.append(header);
          
          var question = $('<p>').append(ScienceAndTech[index].question);
          qElement.append(question);
          
          var radioButtons = createRadios(index);
          qElement.append(radioButtons);
          
          return qElement;
        }
        
        function createRadios(index) {
          var radioList = $('<ul>');
          var item;
          var input = '';
          for (var i = 0; i < ScienceAndTech[index].choices.length; i++) {
            item = $('<li>');
            input = '<input type="radio" name="answer" value=' + i + ' />';
            input += ScienceAndTech[index].choices[i];
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
              if (selections[i] === ScienceAndTech[i].correctAnswer) {
                numCorrect++;
              }
            }
            $('#score_box').val(numCorrect*20);
                
            if(questionCounter < ScienceAndTech.length){
              var nextQuestion = createQuestionElement(questionCounter);
              quiz.append(nextQuestion).fadeIn();
              if (!(isNaN(selections[questionCounter]))) {
                $('input[value='+selections[questionCounter]+']').prop('checked', true);
              }
              
              if(questionCounter === 1){
                $('#prev').show();
              } else if(questionCounter === 0){
                
                $('#prev').hide();
                $('#next').show();
              }
            }else {
              var scoreElem = displayScore();
              quiz.append(scoreElem).fadeIn();
              $('#next').hide();
              $('#prev').hide();
              $('#start').show();
            }
          });
        }
        
        function displayScore() {
          var score = $('<p>',{id: 'question'});
          
          var numCorrect = 0;
          for (var i = 0; i < selections.length; i++) {
            if (selections[i] === ScienceAndTech[i].correctAnswer) {
              numCorrect++;
            }
          }
          
          score.append('You got ' + numCorrect + ' questions out of ' +
                       ScienceAndTech.length + ' right!!!');
          return score;
        }
      })();