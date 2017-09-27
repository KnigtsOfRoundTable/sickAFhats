<?php
require_once('variable.php');

$dbconnect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('connection failed');

$query = "SELECT * FROM member";

$result = mysqli_query($dbconnect, $query) or die('run query failed');

include 'head.php'; 
 
?>

<div class="row">
    <div class="col-xs-12 text-center">
        <h1>Welcome to Sick AF Hats</h1>
        <p class="centerText">Alcatra turkey salami chicken biltong short loin cupim frankfurter ham andouille, shankle sirloin. T-bone ball tip prosciutto meatball, tri-tip shankle beef ribs tail. Turkey rump short ribs, shank bresaola pork chop leberkas short loin ball tip. Ground round sirloin frankfurter pastrami. Boudin shankle pastrami doner ground round burgdoggen. Pancetta chuck beef ribs drumstick meatball. Swine alcatra spare ribs shankle landjaeger.</p>
    </div>
</div>

<div class="row">
    <article class="col-xs-6">
        <figure><img src="img/hatperson1.jpg" alt="fish"/></figure>
    </article>

    <article class="col-xs-6">
        <blockquote>"Alcatra turkey salami chicken biltong short loin cupim frankfurter ham andouille, shankle sirloin. Boudin shankle pastrami doner ground round burgdoggen. Pancetta chuck beef ribs drumstick meatball. Swine alcatra spare ribs shankle landjaeger."<br>-The Chef</blockquote> 
    </article>
</div><!--end row-->

<div class="row">
    <article class="col-xs-6">
        <blockquote>"Ground round sirloin frankfurter pastrami. Boudin shankle pastrami doner ground round burgdoggen. Pancetta chuck beef ribs drumstick meatball. Boudin shankle pastrami doner ground round burgdoggen. Pancetta chuck beef ribs drumstick meatball. Swine alcatra spare ribs shankle landjaeger. Boudin shankle pastrami doner ground round burgdoggen. Pancetta chuck beef ribs drumstick meatball. Swine alcatra spare ribs shankle landjaeger."<br>-Food Review</blockquote> 
    </article>

    <article class="col-xs-6">
        <figure class="right w50"><img src="img/hatperson2.jpg" alt="fish"/></figure>
    </article>
</div><!--end row--> 

<div class="row">
    <article class="col-xs-6">
        <figure><img src="img/hatperson4.jpg" alt="fish"/></figure>
    </article>

    <article class="col-xs-6">
        <blockquote>"Alcatra turkey salami chicken biltong short loin cupim frankfurter ham andouille. Boudin shankle pastrami doner ground round burgdoggen. Pancetta chuck beef ribs drumstick meatball. Swine alcatra spare ribs shankle landjaeger."<br> -Review</blockquote> 
    </article>
</div><!--end row-->

<div class="row">
    <article class="col-xs-6">
        <blockquote>"Ground round sirloin frankfurter pastrami. Boudin shankle pastrami doner ground round burgdoggen. Pancetta chuck beef ribs drumstick meatball. Swine alcatra spare ribs shankle landjaeger. "<br>-Famous</blockquote> 
    </article>

    <article class="col-xs-6">
        <figure class="right w50"><img src="img/hatperson3.jpg" alt="fish"/></figure>
    </article>
</div><!--end row-->

<?php include 'footer.php'; ?>
