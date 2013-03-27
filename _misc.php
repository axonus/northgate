<?
	$m = mysql_connect("localhost", "thomas", "vps99");
	//echo "m = .$m.<BR>";
	$db = mysql_select_db("thomas_grocery");


	function pr($array) {
		?><PRE><?
		print_r($array);
		?></PRE><?
	}
////
////
	function showHeader() {

		?>

			<head>
				<style>body { font-family: arial; color:darkgray;}</style>
				<meta id="meta" name="viewport" content="width=device-width; initial-scale=1.0" />
			</head>

<!--		<CENTER>-->
			<TABLE BORDER=0 WIDTH=320>
				<TR>
					<TD>
						<CENTER>

							<TABLE BORDER=0 WIDTH=280>
								<TR><TD><CENTER><IMG SRC="nglogo.png" WIDTH=270></TD></TR>
								<TR><TD>&nbsp;</TD></TR>

		<?

	}
////
////
	function showFooter() {

		?>

							</TABLE>

							<BR>
							<BR>
							<BR>
							<BR>
							<BR>
							<BR>

						</CENTER>
					</TD>
				</TR>
			</TABLE>
<!--		<CENTER>-->

		<?

	}
////
////
?>