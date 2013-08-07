<?php

include("bzion-load.php");

$header = new Header();


if (isset($_GET['alias'])) {
    $team = Team::getFromAlias($_GET['alias']);
} else if (isset($_GET['id'])) {
    $team = new Team($_GET['id']);
}

if (isset($team)) {
    $header->draw("Teams :: " . $team->getName());
    
    echo "<div class='team_name'>" . $team->getName() . "</div> <br />";
    echo "<div class='team_rating'> ELO: " . $team->getElo() . "</div><br />";
    $leader = $team->getLeader();
    echo "<div class='team_leader'>Leader: " . $leader['username'] . "</div><br />";
    echo "Matches: <a href='" . $team->getMatchesURL() . "'>" . $team->getNumTotalMatches() . "</a><br />";
    echo "Members: " . $team->getNumMembers() . "<br />";
    echo "Activity: " . $team->getActivity() . "<br />";
    echo "Created: " . $team->getCreationDate() . "<br />";
    echo "<br />";

} else {

    $header->draw("Teams");

    $teams = Team::getTeams();
?>
<table class="teams_table">
<tr class="teams_tr">
<th style="width:30%"> Name </th>
<th> Rating </th>
<th> Leader </th>
<th> Members </th>
<th> Matches </th>
<th> Activity </th>
</tr>
<?php
    foreach ($teams as $key => $id) {
        $team = new Team($id);
	echo "<tr id=\"teams_tr\">\n";
        echo "<td><a href='" . $team->getURL() . "'>" . $team->getName() . "</td>\n";
        echo "<td>" . $team->getElo() . "</td>\n";
        $leader = $team->getLeader();
        echo "<td>" . $leader['username'] . "</td>\n";
        echo "<td> " . $team->getNumMembers() . "</td>\n";
        echo "<td><a href='" . $team->getMatchesURL() . "'>" . $team->getNumTotalMatches() . "</a></td>\n";
        echo "<td>" . $team->getActivity() . "</td>\n";
    	echo "</tr>\n";
    }

}
?>

</table>
<?php
$footer = new Footer();
$footer->draw();

?>
