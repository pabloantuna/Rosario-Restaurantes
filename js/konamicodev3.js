// Cheat Codes
neededkeys = [38,38,40,40,37,39,37,39,66,65], started = false, count = 0;
neededkeys2 = [87,72,65,84], started2 = false, count2 = 0;
var raptorImageMarkup = '<img id="elRaptor" style="display: none" src="./images/raptor.png" />'
var raptorAudioMarkup = '<audio id="elRaptorShriek" preload="auto"><source src="./sound/raptor-sound.mp3" /><source src="./sound/raptor-sound.ogg" /></audio>';	
$('body').append(raptorAudioMarkup);
$('body').append(raptorImageMarkup);
            var raptor = $('#elRaptor').css({
				"position":"fixed",
				"bottom": "-700px",
				"right" : "0",
				"display" : "block"
			})
$(document).keydown(function(e) {
    key = e.keyCode;
    if (!started) {
        if (key == 38) {
            started = true;
        }
        else if(key == 87){
            started2 = true;
        }
    }
    if (started) {
        if (neededkeys[count] == key) {
            count++;
        } else {
            reset();
        }
        if (count == 10) {
            reset();
            // Do your stuff here
            //$('body').css('background-color', '#FFA8A8');
            // Turn down for what
            //var s=document.createElement('script');
            //s.setAttribute('src','https://nthitz.github.io/turndownforwhatjs/tdfw.js');
            //document.body.appendChild(s);
            function playSound() {
                document.getElementById('elRaptorShriek').play();
            }
            playSound();
            // $(document).ready(function(){
            //     var div = $("#elRaptor");
            //     div.animate({bottom: '0px', opacity: '1'}, "slow");
            //     div.animate({bottom: '-130px', opacity: '1'}, "slow");
            // });
             $(document).ready(function(){
                var div = $("#elRaptor") ;
                div.animate({
                 "bottom" : "0"
             }, function() { 			
                 $(this).animate({
                     "bottom" : "-130px"
                 }, 100, function() {
                     var offset = (($(this).position().left)+400);
                     $(this).delay(300).animate({
                         "right" : offset
                     }, 2200, function() {
                         raptor = $('#elRaptor').css({
                             "bottom": "-700px",
                             "right" : "0"
                         })
                     })
                 });
             });
            });
            
        }
    } else {
        if(started2){
            if (neededkeys2[count2] == key) {
                count2++;
            } else {
                reset();
            }
            if (count2 == 4) {
                reset();
                // Do your stuff here
                //$('body').css('background-color', '#FFA8A8');
                // Turn down for what
                var s=document.createElement('script');
                s.setAttribute('src','./js/turndownforwhat.js');
                document.body.appendChild(s);
                
                
            }
        } else {
            reset();
        }
    }
        
});
function reset() {
    started = false;
    count = 0;
}