<?php /* Assumption isset($right_title) implies isset($left_title) */

/* Optionally shows a panel title and text */
function show_panel(&$title, &$text, $extraclass='') {
    if (!isset($title))
        return;

    echo "  <div class=\"card mb-3\">\n";
    echo "    <h5 class=\"card-header bg-primary text-light\">$title</h5>\n";
    echo "    <div class=\"card-body $extraclass\">$text</div>\n";
    echo "  </div>\n";
}

/* Shows a panel title and optionally a text */
function show_panel2(&$title, &$text) {
    echo "<div class=\"card mb-3\">\n";
    echo "  <h5 class=\"card-header bg-primary text-light\">$title</h5>\n";
    if (isset($text))
        echo "  <div class=\"card-body\">$text</div>\n";
    echo "</div>\n";
}

/* Shows logos */
function logos() {
    echo "  <div class=\"row logointro\">";
    echo "    <h2>Partners behind BibleOL</h2>";
    echo "  </div>";
    echo "  <div class=\"row logopanel\">";
    echo "    <div class=\"col-md-3\">";
    echo "      <a class=\"navbar-link\" href=\"http://www.ezer.dk\" target=\"_blank\"><img class=\"logo\" src=\"images/logos/ezer_web_trans_lille.png\" style=\"width: 140px; text-align: center;\"></a></div>";
    echo "    <div class=\"col-md-3\">";
    echo "      <a class=\"navbar-link\" href=\"http://vu.nl\" target=\"_blank\"><img class=\"logo\" src=\"images/logos/vu.png\" style=\"width: 260px\"></a></div>";
    echo "    <div class=\"col-md-3\">";
    echo "      <a class=\"navbar-link\" href=\"http://pthu.nl\" target=\"_blank\"><img class=\"logo\"  src=\"images/logos/pthu.png\" style=\"width: 260px\"></a></div>";
    echo "    <div class=\"col-md-3\">";
    echo "      <a class=\"navbar-link\"  href=\"http://3bmoodle.dk\" target=\"_blank\"><img class=\"logo\" src=\"images/logos/3bm_logo.png\" style=\"width: 150px\"></a></div>";
    echo "  </div>";
}

?>


<?php if (isset($landingpage)): ?>
    <div class="row" id="landing-row">
        <div class="col-md-8" id="landingpanel">
            <img class="graphic-element" src="/images/dadel/DaDEL_ID_graphic_element_RGB.png">
            <div id="landingtext">
                <?= $center ?>
            </div>
        </div>
        <div class="col-md-4" id="loginpanel">

            <?php if (!isset($logged_in_name)): ?>
                <h1><?= $this->lang->line('press_login_button') ?></h1>
                <form action="/login">
                    <button class="btn btn-primary"><?= $this->lang->line('login') ?></button>
                </form>
                <h1><?= $this->lang->line('no_login') ?></h1>
                <form action="/users/sign_up">
                    <button class="btn btn-outline-dark"><?= $this->lang->line('sign_up') ?></button>
                </form>
            <?php else: ?>
                <h1><?= sprintf($this->lang->line('welcome2'),$logged_in_name) ?></h1>
            <?php endif; ?>

            <form action="/text/select_text">
                <button class="btn btn-outline-dark"><?= $this->lang->line('start_text_reading') ?></button>
            </form>
            <form action="/text/select_quiz">
                <button class="btn btn-outline-dark"><?= $this->lang->line('try_an_exercise') ?></button>
            </form>

            <?php if (isset($logged_in_name)): ?>
                <form action="/login">
                    <button class="btn btn-primary"><?= $this->lang->line('logout') ?></button>
                </form>
            <?php endif; ?>

        </div>
    </div>
<?php else: ?>
    <div class="row">
<?php endif; ?>


<?php
      if (isset($left_title)) {
          echo "<div class=\"col-md-3 sidepanel\" id=\"leftpanel\">";
          show_panel2($left_title, $left);

          show_panel($extraleft_title, $extraleft, 'student-legend');

          echo "</div>";
      }
  ?>


<?php if (!isset($landingpage)): ?>
<div class="<?= isset($right_title) ? 'col-md-6' : 'col-md-9' ?> centerpanel" id="centerpanel">
  <div class="centerblock">
    <?= $center ?>
  </div>
</div>
<?php endif; ?>


<?php if (isset($right_title)): ?>
  <div class="col-md-3 sidepanel" id="rightpanel">
    <?php show_panel($right_title, $right) ?>
  </div>
<?php endif; ?>

<?php
  if (isset($logos))
    logos();
?>

<?php if (!isset($landingpage)): ?>
  </div>
<?php endif; ?>
