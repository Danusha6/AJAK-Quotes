<html>
  <head>
    <title>AJAK Quotes</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Tulpen+One&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@700&display=swap');

      /* CSS to hide the quote container initially and apply fade-in animation */
        #quoteContainer {
          display: none;
          font-size:xx-large;
          text-shadow: 4px 4px 4px #aaa;
        }

        /* CSS for the fade-in animation */
        .fade-in {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    </style>
  </head>
  <body>
    <h1>AJAK Quotes</h1>
    <!-- <p>Click below to return a random quote</p> -->
    <div id="quoteContainer">Quotes Goes Here</div>
    <script>

      //helps us loop the array of fonts
      var counter = 0
      function getRandomQuote() {
        var fonts = ["Shadows Into Light", "Tulpen One", "Qwitcher Grypen"];
        //create ajak object
        var xhr = new XMLHttpRequest();

        //target the server page
        xhr.open('GET','random_quotes.php?',true);

        //if data comes back show it here  
        xhr.onload = function(){
          if(xhr.status >= 200 && xhr.status < 300){//all ok, show data
            // document.querySelector("#quoteContainer").innerText = xhr.responseText;
            var quoteContainer = document.querySelector("#quoteContainer");

            //retrieve text from php page
            quoteContainer.innerText = xhr.responseText;

            //add font family
            quoteContainer.style.fontFamily = fonts[counter];
            counter++;
            if(counter>= fonts.length){
              counter = 0;
            }
            
            //make element visible
            quoteContainer.style.display = "block";

            //add fade in class
            quoteContainer.classList.add("fade-in");

            setTimeout(function(){
              quoteContainer.classList.remove("fade-in");

            },1000);
          }
          else{//show error
            document.querySelector("#quoteContainer").innerText = "Failed to fetch quote: " + xhr.status;
          }
        };

        //if trouble investigate here
        xhr.onerror = function(){
          alert("OH");
        };

        //send data to server
        xhr.send();
      }
      function displayRandomQuote(){
        //retrieve quote
        getRandomQuote();
        //run every five second
        setInterval(getRandomQuote,5000);
      }
      //run on page load
      displayRandomQuote();
    </script>
  <p>This web page, titled "AJAK Quotes," is a fun place to discover random quotes that can inspire or make you think. The cool part is that each quote you see might appear in a different style of writing because the page uses something called "Google Fonts." This just means that the words look unique and interesting. Also, when a new quote appears, it doesn't just pop up suddenly. It fades into view slowly, which looks really nice and smooth. It's like watching a quote come to life on the screen! And guess what? You don't need to keep clicking the button over and over. After you see one quote, the page will automatically show you a new one every 5 seconds. So you can just sit back and enjoy the inspiring quotes as they show up one after another. </p>
  </body>
</html>
