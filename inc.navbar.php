<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="http://www.cjrtec.com/dist/img/cjrlogo.png" class="img-responsive" alt="cjrtec logo"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="clicker-press.php">Presses</a></li>
            <li><a href="clicker-press-parts.php">Parts</a></li>
            <li><a href="clicker-press-videos.php">Videos</a></li>
            <li><a href="customers.php">Customers</a></li>
            <?php 

                if (isset($_SESSION['email']) || isset($_SESSION['id'])) {
                    # code...
                    ?>

                    <li><a href="logout.php">Logout</a></li>

                    <?php
                }else{
                    ?>

                    <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Register</a></li>
                  </ul>
                </li>

                    <?php
                }


             ?>

                <?php
//SHOWS AND PLAYS MP3 OF ANY PAGE
                $mp3_file = basename($_SERVER["SCRIPT_FILENAME"], 'php') . 'mp3';
                $mp3_file = $mp3_file == 'index.mp3' ? 'about.mp3' : $mp3_file;
                if (file_exists('../cjrdistributing/audio/' . $mp3_file)) {
                    ?>
                    <script type="text/javascript">
                        localStorage.setItem("mp3", "<?php echo $mp3_file; ?>");
                    </script>
                    <li>
                        <audio id="music" preload="true" volume="0.5">
                            <source src="http://www.cjrtec.com/audio/<?php echo $mp3_file ?>" type="audio/mpeg">
                        </audio>

                        <script type="text/javascript">
                            var audio = document.createElement("music");
                            //

                            if (localStorage.getItem("mp3") == null) {
  music.autoplay = true;
    }

                            
                        
                        </script>

                        <div id="audioplayer">
                            <button id="pButton" class="play" onclick="play()"></button>
                            <div id="timeline">    
                                <div id="playhead"></div>
                            </div>
                        </div>
                        <script>

                            var music = document.currentScript.parentElement;
                            var music = document.getElementById('music'); // id for audio element
                            var duration; // Duration of audio clip
                            var pButton = document.getElementById('pButton'); // play button

                            var playhead = document.getElementById('playhead'); // playhead

                            var timeline = document.getElementById('timeline'); // timeline
                            // timeline width adjusted for playhead
                            var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;

                            // timeupdate event listener
                            music.addEventListener("timeupdate", timeUpdate, false);

                            //Makes timeline clickable
                            timeline.addEventListener("click", function (event) {
                                moveplayhead(event);
                                music.currentTime = duration * clickPercent(event);
                            }, false);

                            // returns click as decimal (.77) of the total timelineWidth
                            function clickPercent(e) {
                                return (e.pageX - timeline.offsetLeft) / timelineWidth;
                            }

                            // Makes playhead draggable 
                            playhead.addEventListener('mousedown', mouseDown, false);
                            window.addEventListener('mouseup', mouseUp, false);

                            // Boolean value so that mouse is moved on mouseUp only when the playhead is released 
                            var onplayhead = false;
                            // mouseDown EventListener
                            function mouseDown() {
                                onplayhead = true;
                                window.addEventListener('mousemove', moveplayhead, true);
                                music.removeEventListener('timeupdate', timeUpdate, false);
                            }
                            // mouseUp EventListener
                            // getting input from all mouse clicks
                            function mouseUp(e) {
                                if (onplayhead == true) {
                                    moveplayhead(e);
                                    window.removeEventListener('mousemove', moveplayhead, true);
                                    // change current time
                                    music.currentTime = duration * clickPercent(e);
                                    music.addEventListener('timeupdate', timeUpdate, false);
                                }
                                onplayhead = false;
                            }
                            // mousemove EventListener
                            // Moves playhead as user drags
                            function moveplayhead(e) {
                                var newMargLeft = e.pageX - timeline.offsetLeft;
                                if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
                                    playhead.style.marginLeft = newMargLeft + "px";
                                }
                                if (newMargLeft < 0) {
                                    playhead.style.marginLeft = "0px";
                                }
                                if (newMargLeft > timelineWidth) {
                                    playhead.style.marginLeft = timelineWidth + "px";
                                }
                            }

                            // timeUpdate 
                            // Synchronizes playhead position with current point in audio 
                            function timeUpdate() {
                                var playPercent = timelineWidth * (music.currentTime / duration);
                                playhead.style.marginLeft = playPercent + "px";
                                if (music.currentTime == duration) {
                                    pButton.className = "";
                                    pButton.className = "play";
                                }
                            }

                            //Play and Pause
                            function play() {
                                // start music
                                if (music.paused) {
                                    music.play();
                                    // remove play, add pause
                                    pButton.className = "";
                                    pButton.className = "pause";
                                } else { // pause music
                                    music.pause();
                                    // remove pause, add play
                                    pButton.className = "";
                                    pButton.className = "play";
                                }
                            }

                            // Gets audio file duration
                            music.addEventListener("canplaythrough", function () {
                                duration = music.duration;
                            }, false);
                            if (/(^|;)\s*<?php echo $mp3_file ?>=/.test(document.cookie)) {
                            } else {
                                document.cookie = "<?php echo $mp3_file ?>=true; max-age=" + 60 * 60 * 24 * 10; // 60 seconds to a minute, 60 minutes to an hour, 24 hours to a day, and 10 days.
                                music.volume = 0.5;
                                music.play();
                            }
                        </script> 
                    </li>
                <?php }
                ?>              
                
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> support@cjrtec.com</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> (800)-733-2302</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>