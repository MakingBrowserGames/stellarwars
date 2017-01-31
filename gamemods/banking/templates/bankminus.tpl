{include file="overall_header.tpl"}
{include file="left_menu.tpl"}
{include file="overall_topnav.tpl"}
<html>
<body>
<form action="game.php?page=auszahlen" method="post">
<input type="hidden" name="mode" value="wyplac">
<table style="width: 351px; height: 148px;">
<tbody>
<tr><td class="c" colspan="6"><center>Grondstoffen uitbetalen</center></td></tr>
<tr>	
<th>Metal</th><th><input name="metal" type="text" value="0" /></tr><tr></th>
<th>Kristal</th><th><input name="kryst" type="text" value="0" /></tr><tr></th>
<th>Deuterium</th><th><input name="deuta" type="text" value="0" /></tr><tr></th>
</tr><tr>
<td class="b" colspan="6"><center>Grondstoffen in de bank</center></td></tr>
<th>Metal</th><th>{$met}</tr><tr></th>
<th>Kristall</th><th>{$cry}</tr><tr></th>
<th>Deuterium</th><th>{$deu}</tr><tr></th>
	<td class="c" colspan="6"><center><input type="Submit" value="Uitbetalen" /></center></td>
</tbody>
</tr>
</table>
</form>
</body>
</html>
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}