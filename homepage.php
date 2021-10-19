<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
</head>
<body>
    <section class="showcase">
        <div class="video-container">
          <video src="https://traversymedia.com/downloads/video.mov" autoplay muted loop></video>
        </div>
        <div class="content">
          <h1>Onambambi Effective <br>
        Debt Collectors</h1>
          <h3>Making your debts lighter to deal with</h3>
          <a href="login.php" class="btn">Login</a>
          <a href="Register.php" class="btn">Register</a>
        </div>
      </section>
  
      <section id="about">
        <h1>About</h1>
        <p>
            Debt collectors are monitored by the Federal Trade Commission (FTC), 
            which enforces the Fair Debt Collection Practices Act (FDCPA). The 
            FDCPA prohibits debt collectors from using abusive, unfair, or
            deceptive practices during the debt collection process.
        </p>
  
        <h2>Find out how much you would <br>
        pay monthly if you sign contract with us</h2>
        <br>
        <div class="numcontainer">
        <div class="w3-third">
            <input class="w3-input w3-border" type="text" name="offRequest" id="offRequest" placeholder="Enter the amount you owe IUM">
          </div>
        </div>
        <br>
        <button type="submit" class="button5" onclick="heq()">Calculate</button>
  <script>
      let num = document.getElementById('offRequest').value;
function heq() {
    let tot=(num/12*.12).toFixed(2);
   return window.alert("You would Pay N$"+ "200" + " Per Month For a Period of One Year")
}
  </script>
        <div class="social">
        <a href="https://twitter.com/traversymedia" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
          <a href="https://facebook.com/traversymedia" target="_blank"><i class="fab fa-facebook fa-3x"></i></a>
          <a href="https://github.com/bradtraversy" target="_blank"><i class="fab fa-github fa-3x"></i></a>
          <a href="https://www.linkedin.com/in/bradtraversy" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
      </section>
      <script src="app.js"></script>
</body>
</html>