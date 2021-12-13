<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script>
      function computeLoan()
        {
        var amount = document.getElementById('amount').value;
        var interest_rate = document.getElementById('interest_rate').value;
        var months = document.getElementById('months').value;
        var interest = (amount * (interest_rate * .01))/months;
        var payment = ((amount/months)+interest).toFixed(2);
        payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
        document.getElementById('payment').innerHTML = "Monthly Payment  = N$ " + payment;
        
        }
    </script>
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
          <!-- <a href="Register.php" class="btn">Register</a> -->
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
        pay monthly if you sign contract with us</h2><br>
        <p>Debt amount: <input id="amount" type="number" min="1" max="100000" onchange="computeLoan()"> N$ </p>
<p>Interest rate: <input id="interest_rate" type="number" min="0" max="10" value="15" step=".1" onchange="computeLoan()" disabled> % </p>
<p>Months: <input id="months" type="number" min="1" max="12" value="12" step="1" disabled onchange="computeLoan()"> </p>
<h2 id="payment"></h2>
        <br>
     
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