
<head>
	<style>body { font-family: arial; color:darkgray;}</style>
	<meta id="meta" name="viewport" content="width=device-width; initial-scale=1.0" />
</head>

<?
	include "_misc.php";
?>

<!--		<CENTER>-->
			<TABLE BORDER=0 WIDTH=320>
				<TR>
					<TD>
						<CENTER>

							<TABLE BORDER=0 WIDTH=280>
								<TR><TD><CENTER><IMG SRC="nglogo.png" WIDTH=270></TD></TR>
								<TR><TD>&nbsp;</TD></TR>
								<TR HEIGHT=5><TD></TR></TD>
								<TR><TD>
									Eligible Products:<BR>
									<BR>
									<?
										if ($results = mysql_query($strSQL)) {
											while ($row = mysql_fetch_array($results)) {
												//pr($row);
												$dateandtime = $row[dateandtime];
												$quantity = $row[quantity];
												$label = $row[label];
												$amount = $row[amount];
												echo "$"."$amount  $label<BR>
												&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;
												&nbsp;&nbsp;&nbsp;&nbsp;
												$dateandtime<BR>";
											}
										}
	$strSQL = "SELECT * FROM eligible_skus ORDER BY id";
	if ($results = mysql_query($strSQL)) {
		while ($row = mysql_fetch_array($results)) {
			//pr($row);
			$label = $row[label];
			echo "$label<BR>";
		}
	}
									?>
								</TD></TR>
							</TABLE>

						</CENTER>
					</TD>
				</TR>
			</TABLE>
<!--		<CENTER>-->

<?
?>
