<?php

/*
This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see <https://www.gnu.org/licenses/>.

Copyright 2020, John Mayson <john@mayson.us>
*/

$url = 'https://www.livejournal.com/stats/latest-img.bml';
$n = 500;
$data = '';

$fp = fopen("$url", "r");

while(!feof($fp)) {
	$data .= fgets($fp);
}

preg_match_all("<recent-image img=\'([^\']+)\' url=\'([^\']+)\' />", $data, $out);

echo "<HTML>\n";
echo "<HEAD>\n";
echo "<TITLE>LiveJournal Images</title>\r\n\n";
echo "<head>\n";
echo "<BODY>\n";
echo "<TABLE align='center'>\n";
for ($i = 0; $i < $n; $i++) {
	if ($i % 5 == 0) { echo "<TR>\n"; }
	echo '<TD width="17%"><a href="' . $out[2][$i] . '"><img border="0" width="85%" src="' . $out[1][$i] . '" alt="" /></a><br /><br />' . "</td>";
	if ($i % 5 == 4) { echo "</tr>\n"; }
}
echo "</table>\n";
echo "</body>\n";
echo '</html>';
?>
