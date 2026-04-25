<h1> Teszt oldal! </h1>
<hr/>
<h2> Kért adatok: </h2>
<h4> <?php echo $viewData['title']; ?> </h4>
<?php
if (is_array($viewData['content']))
{
    echo "<ul>";
    foreach($viewData['content'] as $par)
        echo '<li><a href="'.SITE_ROOT.'teszt/'.$par.'">'.$par.'</a></li><br>';
    echo "</ul>";
}
else
{
    echo "<p>".$viewData['content']."</p>";
}
?>
