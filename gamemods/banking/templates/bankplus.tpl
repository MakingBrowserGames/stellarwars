{include file="overall_header.tpl"}
{include file="left_menu.tpl"}
{include file="overall_topnav.tpl"}
<html>
<head>
  <input>
</head>
<body>
<div id="content" class="content">
<form action="game.php?page=einzahlen" method="post"><input
 name="mode" value="wplac" type="hidden">
  <table style="width: 351px;">
    <tbody>
      <tr>
        <th>
        <center>Materiaal Opslaan</center>
        </th>
      </tr>
	  <tr>
	      <td>
	            <center>Voor je opgeslagen goederen worden als kosten bij je {$dm} DM in gehouden!
	      </td>
	  </tr>
      <tr>
        <th>Metal<center><input name="metal" value="0" type="text"></center></th>
      </tr>
      <tr>
        <th>Kristall<center><input name="kryst" value="0" type="text"></center></th>
      </tr>
      <tr>
        <th>Deuterium<center><input name="deuta" value="0" type="text"></center></th>
      </tr>
      <tr>
      </tr>
      <tr>
        <td class="c" colspan="6">
        <center><input value="Opslaan" type="submit"></center>
        </td>
      </tr>
    </tbody>
  </table>
</form>
</div>
</body>
</html>

{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}